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
        Schema::create('souscripteurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('type_personne', 50);
            $table->string('nom', 50)->nullable();
            $table->string('prenom', 50)->nullable();
            $table->string('sexe', 50)->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('contact2', 50)->nullable();
            $table->string('raison_social', 50)->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance', 50)->nullable();
            $table->string('type_piece', 50)->nullable();
            $table->string('reference_piece', 50)->nullable();
            $table->date('date_delivrance')->nullable();
            $table->string('situation_matrimoniale', 50)->nullable();
            $table->string('residence', 50)->nullable();
            $table->string('nationalite', 50)->nullable();
            $table->string('profession', 50)->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souscripteurs');
    }
};
