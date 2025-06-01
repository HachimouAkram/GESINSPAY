<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mensualites', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // ou timestamp('date') si tu veux inclure l'heure
            $table->decimal('montant');
            $table->boolean('payer')->default(false);
            $table->foreignId('inscription_id')->constrained('inscriptions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensualites');
    }
};
