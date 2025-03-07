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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id('Id_de');
            $table->string('Objet', 100);
            $table->string('Reff', 100);
            $table->boolean('Sauvegarder');
            $table->string('But', 255)->nullable()->change();
            $table->date('Date_operation');
            $table->unsignedBigInteger('id_u');
            $table->unsignedBigInteger('Id_emp');
            $table->timestamps();

            $table->foreign('id_u')->references('Id_u')->on('userrs')->onDelete('cascade');
            $table->foreign('Id_emp')->references('Id_emp')->on('employes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
