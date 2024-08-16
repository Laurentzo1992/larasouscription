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
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('souscripteur_id')->constrained('souscripteurs')->onDelete('cascade');
            $table->string('numero_souscription', 50);
            $table->foreignId('projet_id')->constrained('projets')->onDelete('cascade');
            $table->dateTime('date_souscription')->nullable();
            $table->integer('nbre_part_souscrit')->nullable();
            $table->float('montant_total')->nullable();
            $table->float('montant_verse')->nullable();
            $table->float('montant_restant')->nullable();
            $table->string('lieu_souscription', 50)->nullable();
            $table->string('moyen_paiement', 50)->nullable();
            $table->string('ref_paiement', 50)->nullable();
            $table->string('mode_souscription', 50)->nullable();
            $table->date('echeance')->nullable();
            $table->string('pj1')->nullable();
            $table->string('pj2')->nullable();
            $table->string('pj3')->nullable();
            $table->string('observation', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souscriptions');
    }
};
