<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBebidasTable extends Migration
{
    public function up()
    {
        Schema::create('bebidas', function (Blueprint $table) {
            $table->bigIncrements('id_bebida');
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('precio', 8, 2);
            $table->enum('tipo_bebida', ['caliente', 'fria']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bebidas');
    }
}
