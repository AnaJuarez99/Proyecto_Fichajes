<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Centro;
use App\Models\Fichaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    public function index()
    {
        $fechaInicioSemana = Carbon::now()->startOfWeek();
        $fechaFinSemana = Carbon::now()->endOfWeek();
        $fechaInicioMes = Carbon::now()->startOfMonth();
        $fechaFinMes = Carbon::now()->endOfMonth();

        return view("historial")->with(["usuarios" => User::where('id', '!=', Auth::id())->get(),
                                        "fichajesSemana" => Fichaje::where('id_usuario', Auth::user()->id)->whereBetween('fecha', [$fechaInicioSemana, $fechaFinSemana])->orderBy('fecha')->get(),
                                        "fichajesMes" => Fichaje::where('id_usuario', Auth::user()->id)->whereBetween('fecha', [$fechaInicioMes, $fechaFinMes])->orderBy('fecha')->get()]);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }

    public function showData(Request $request)
    {
        return view('verdetalles')->with(["usuario" => User::find($request->id), "centros" => Centro::all(), "fichajes" => Fichaje::where('id_usuario', $request->id)->get()]);
    }

    public function updateCenter(Request $request)
    {
        $usuario = User::find($request->id);
        $usuario->centro = $request->centro;
        $usuario->save();

        return redirect()->route('historial')->with('success', 'Centro seleccionado correctamente');
    }

    public function generarPDFSemanal()
    {   
        $fechaInicioSemana = Carbon::now()->startOfWeek();
        $fechaFinSemana = Carbon::now()->endOfWeek();

        $fichajesSemana = Fichaje::where('id_usuario', Auth::user()->id)->whereBetween('fecha', [$fechaInicioSemana, $fechaFinSemana])->orderBy('fecha')->get();
        // Obtén las horas semanales del usuario
        $horasSemanales = [
            "Lunes" => isset($fichajesSemana[0]->horas) ? $fichajesSemana[0]->horas : 0,
            "Martes" => isset($fichajesSemana[1]->horas) ? $fichajesSemana[1]->horas : 0,
            "Miércoles" => isset($fichajesSemana[2]->horas) ? $fichajesSemana[2]->horas : 0,
            "Jueves" => isset($fichajesSemana[3]->horas) ? $fichajesSemana[3]->horas : 0,
            "Viernes" => isset($fichajesSemana[4]->horas) ? $fichajesSemana[4]->horas : 0
        ];

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Genera el contenido HTML del PDF
        $html = '<html><body>';
        $html .= '<h1>Horas semanales de: ' . Auth::user()->nombre . ' ' . Auth::user()->apellidos . '</h1>';
        $html .= '<h2>Semana del: ' . $fechaInicioSemana->format('Y-m-d') . ' al ' . $fechaFinSemana->format('Y-m-d') . '</h2>';
        $html .= '<table style="width: 100%; border-collapse: collapse; margin-top: 20px; text-align: center">';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid #000; padding: 8px;">Día</th>';
        $html .= '<th style="border: 1px solid #000; padding: 8px;">Horas</th>';
        $html .= '</tr>';
        foreach ($horasSemanales as $dia => $horas) {
            $html .= '<tr>';
            $html .= '<td style="border: 1px solid #000; padding: 8px;">' . $dia . '</td>';
            $html .= '<td style="border: 1px solid #000; padding: 8px;">' . $horas . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        // Carga el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderiza el contenido HTML en PDF
        $dompdf->render();

        // Genera el nombre del archivo PDF
        $fileName = 'horas_semanales.pdf';

        // Descarga el PDF generado
        $dompdf->stream($fileName, ['Attachment' => true]);
    }

    public function generarPDFMensual()
{
    $fechaInicioMes = Carbon::now()->startOfMonth();
    $fechaFinMes = Carbon::now()->endOfMonth();

    $fichajesMes = Fichaje::where('id_usuario', Auth::user()->id)->whereBetween('fecha', [$fechaInicioMes, $fechaFinMes])->orderBy('fecha')->get();
    // Obtén las horas mensuales del usuario
    $horasMensuales = [];
    foreach ($fichajesMes as $index => $fichaje) {
        $horasMensuales[$index + 1] = isset($fichaje->horas) ? $fichaje->horas : 0;
    }

    // Crea una instancia de Dompdf
    $dompdf = new Dompdf();

    // Genera el contenido HTML del PDF
    $html = '<html><body>';
    $html .= '<h1>Horas mensuales de: ' . Auth::user()->nombre . ' ' . Auth::user()->apellidos . '</h1>';
    $html .= '<h2>Mes del: ' . $fechaInicioMes->format('Y-m-d') . ' al ' . $fechaFinMes->format('Y-m-d') . '</h2>';
    $html .= '<table style="width: 100%; border-collapse: collapse; margin-top: 20px; text-align: center">';
    $html .= '<tr>';
    $html .= '<th style="border: 1px solid #000; padding: 8px;">Día</th>';
    $html .= '<th style="border: 1px solid #000; padding: 8px;">Horas</th>';
    $html .= '</tr>';
    foreach ($horasMensuales as $dia => $horas) {
        $html .= '<tr>';
        $html .= '<td style="border: 1px solid #000; padding: 8px;">' . $dia . '</td>';
        $html .= '<td style="border: 1px solid #000; padding: 8px;">' . $horas . '</td>';
        $html .= '</tr>';
    }
    $html .= '</table>';
    $html .= '</body></html>';

    // Carga el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    // Renderiza el contenido HTML en PDF
    $dompdf->render();

    // Genera el nombre del archivo PDF
    $fileName = 'horas_mensuales.pdf';

    // Descarga el PDF generado
    $dompdf->stream($fileName, ['Attachment' => true]);
}
}