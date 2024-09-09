<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario'); // PK
            $table->string('tipo_usuario'); // Tipo de usuario
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->string('password'); // Contraseña encriptada
            $table->timestamp('fechaCreacion')->useCurrent();
            $table->timestamp('ultimoAcceso')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
