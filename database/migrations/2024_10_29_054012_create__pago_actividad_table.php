<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoactividadTable extends Migration
{
    public function up()
    {
        Schema::create('pagoactividad', function (Blueprint $table) {
            $table->bigIncrements('id_pago_actividad');
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('id_usuario');
            $table->integer('cantidadTickets');
            $table->decimal('monto', 10, 2);
            $table->dateTime('fecha_hora');
            $table->string('estadoPago');
            $table->decimal('descuento', 10, 2)->default(0.00);
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_actividad')->references('id_actividad')->on('actividades')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagoactividad');
    }
}
