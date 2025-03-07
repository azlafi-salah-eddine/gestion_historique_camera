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
        Schema::create('userrs', function (Blueprint $table) {
            $table->id('Id_u');
            $table->integer('PPR');
            $table->string('Nom_u', 50);
            $table->string('Prenom_u', 50);
            $table->string('role', 10);
            $table->string('username', 50)->unique();
            $table->string('password', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userrs');
    }
};
