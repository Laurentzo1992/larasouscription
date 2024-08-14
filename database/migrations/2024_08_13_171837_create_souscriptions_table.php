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
            $table->foreignId('id_souscripteur')->constrained('souscripteurs')->onDelete('cascade');
            $table->string('numero_souscription', 50);
            $table->foreignId('projet_a_souscrire')->constrained('projets')->onDelete('cascade');
            $table->dateTime('date_souscription');
            $table->integer('nbre_part_souscrit');
            $table->float('montant_total');
            $table->float('montant_verse');
            $table->float('montant_restant');
            $table->string('lieu_souscription', 50);
            $table->string('moyen_paiement', 50);
            $table->string('ref_paiement', 50);
            $table->string('mode_souscription', 50);
            $table->date('echeance');
            $table->string('pj1')->nullable();
            $table->string('pj2')->nullable();
            $table->string('pj3')->nullable();
            $table->string('observation', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
