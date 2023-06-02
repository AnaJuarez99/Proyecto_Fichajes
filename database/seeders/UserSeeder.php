<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    protected $priority = 2;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();

        $user = new User();

        $user->nombre = 'Admin';
        $user->apellidos = 'EasyClock';
        $user->dni = '12345678L';
        $user->telefono = 123456789;
        $user->puesto = 'Admin';
        $user->email = 'proyecto.easyclock@gmail.com';
        $user->type = 1;
        $user->password = Hash::make('proyecto_fichajes');

        $user->save();
    }
}
