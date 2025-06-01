<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rappels', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->useCurrent(); // pour stocker la date et l'heure actuelles par défaut
            $table->text('texte'); // permet de stocker des textes plus longs
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rappels');
    }
};
