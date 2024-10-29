<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id_pedido');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_mesa')->nullable();
            $table->timestamp('fecha_pedido')->useCurrent();
            $table->enum('estado_pedido', ['en_preparacion', 'entregado', 'cancelado'])->default('en_preparacion');
            $table->decimal('total', 10, 2)->default(0.00);
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_mesa')->references('id_mesa')->on('mesas')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
