<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('attestation_bac');
            $table->string('releve_note_bac');
            $table->string('bulletin_note1');
            $table->string('bulletin_note2');
            $table->string('bulletin_note3');
            $table->string('derniere_diplome_acquis');
            $table->string('piece_identite');
            $table->string('certificat_naissance');
            $table->date('date_soumission');
            $table->enum('statut_validation', ['en_attente', 'valide', 'refuse'])->default('en_attente');

            $table->foreignId('inscription_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
