<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id_pago');
            $table->unsignedBigInteger('id_pedido');
            $table->decimal('monto', 10, 2);
            $table->string('metodo_pago');
            $table->timestamp('fecha_pago')->useCurrent();
            $table->timestamps();

            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
