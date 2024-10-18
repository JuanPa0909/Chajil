<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');   // Nuevo campo
            $table->string('email_cliente');    // Nuevo campo
            $table->string('telefono_cliente'); // Nuevo campo
            $table->string('tipo_evento');
            $table->date('fecha_evento');
            $table->time('hora_evento');
            $table->integer('numero_personas');
            $table->integer('opcion_alquiler');
            $table->enum('estado', ['pendiente', 'contactado'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
