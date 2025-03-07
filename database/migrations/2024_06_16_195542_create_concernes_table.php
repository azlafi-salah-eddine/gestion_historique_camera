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
        Schema::create('concernes', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_de');
            $table->unsignedBigInteger('Id_c');
            $table->dateTime('Debut_sauv');
            $table->dateTime('Fin_sauv');
            $table->primary(['Id_de', 'Id_c']);
            $table->timestamps();

            $table->foreign('Id_de')->references('Id_de')->on('demandes')->onDelete('cascade');
            $table->foreign('Id_c')->references('Id_c')->on('cameras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concernes');
    }
};
