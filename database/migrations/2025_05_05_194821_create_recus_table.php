<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recus', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2); // pour stocker des montants financiers avec 2 décimales
            $table->timestamp('date_emmission')->useCurrent(); // pour la date d'émission, utilise l'heure actuelle par défaut
            $table->string('fichier_pdf', 255); // pour stocker le chemin du fichier PDF
            $table->string('numero'); // pour le numéro du reçu
            $table->foreignId('payement_id')->constrained('payements')->onDelete('cascade'); // clé étrangère vers la table 'payements'

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recus');
    }
};
