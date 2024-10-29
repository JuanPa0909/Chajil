<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidoTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->bigIncrements('id_detalle');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_menu')->nullable();
            $table->unsignedBigInteger('id_bebida')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 8, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('id_menu')->references('id_menu')->on('menus')->onDelete('set null');
            $table->foreign('id_bebida')->references('id_bebida')->on('bebidas')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_pedido');
    }
}
