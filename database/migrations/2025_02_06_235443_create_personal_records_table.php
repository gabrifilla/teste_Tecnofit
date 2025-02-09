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
        Schema::create('personal_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usu_id');
            $table->unsignedInteger('move_id');
            $table->float('value');
            $table->dateTime('date');
            $table->timestamps();
    
            // Definindo as foreign keys
            $table->foreign('usu_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('move_id')->references('id')->on('movements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_records');
    }
};
