<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('record_pessoal', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usu_id');
            $table->unsignedInteger('movimento_id');
            $table->float('valor');
            $table->dateTime('data');
            $table->timestamps();
    
            // Definindo as foreign keys
            $table->foreign('usu_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('movimento_id')->references('id')->on('movimento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_pessoal');
    }
};
