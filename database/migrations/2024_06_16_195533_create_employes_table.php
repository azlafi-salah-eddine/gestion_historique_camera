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
        Schema::create('employes', function (Blueprint $table) {
            $table->id('Id_emp');
            $table->integer('PPR');
            $table->string('Nom_emp', 50);
            $table->string('Prenom_emp', 50);
            $table->unsignedBigInteger('Id_aff');
            $table->timestamps();

            $table->foreign('Id_aff')->references('Id_aff')->on('entite_affectations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
