<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'tipo_usuario' => 'admin',
                'nombres' => 'Admin',
                'apellidos' => 'Principal',
                'email' => 'admin@ejemplo.com',
                'telefono' => '123456789',
                'estado' => 'activo',
                'password' => Hash::make('Contraseña123'),
                'fechaCreacion' => Carbon::now(),
                'ultimoAcceso' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_usuario' => 'usuario',
                'nombres' => 'Usuario',
                'apellidos' => 'Ejemplo',
                'email' => 'usuario@ejemplo.com',
                'telefono' => '987654321',
                'estado' => 'activo',
                'password' => Hash::make('Contraseña123'),
                'fechaCreacion' => Carbon::now(),
                'ultimoAcceso' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_usuario' => 'cobrador',
                'nombres' => 'Cobrador',
                'apellidos' => 'Ejemplo',
                'email' => 'cobrador@ejemplo.com',
                'telefono' => '99113325',
                'estado' => 'activo',
                'password' => Hash::make('Contraseña123'),
                'fechaCreacion' => Carbon::now(),
                'ultimoAcceso' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
