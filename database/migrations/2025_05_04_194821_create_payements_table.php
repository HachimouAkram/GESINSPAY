<?php

use App\Models\Mensualite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2); // pour stocker des montants avec 2 décimales
            $table->timestamp('date')->useCurrent(); // enregistre la date et l'heure actuelles par défaut
            $table->string('mode_paiement');
            $table->string('type_paiement');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // clé étrangère vers la table 'users'
            $table->foreignId('mensualite_id')->nullable()->constrained('mensualites')->nullOnDelete();
            $table->foreignId('inscription_id')->nullable()->constrained('inscriptions')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payements');
    }
};
