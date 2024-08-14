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
            $table->string('type_personne', 50);
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('sexe', 50);
            $table->string('contact', 50);
            $table->string('contact2', 50)->nullable();
            $table->date('date_naissance');
            $table->string('lieu_naissance', 50);
            $table->string('type_piece', 50);
            $table->string('reference_piece', 50);
            $table->date('date_delivrance');
            $table->string('situation_matrimoniale', 50);
            $table->string('residence', 50);
            $table->string('nationalite', 50);
            $table->string('profession', 50);
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
