<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->unsignedBigInteger('modificado_por')->nullable()->after('id_usuario');
            $table->foreign('modificado_por')->references('id_usuario')->on('usuarios')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign(['modificado_por']);
            $table->dropColumn('modificado_por');
        });
    }
    
};
