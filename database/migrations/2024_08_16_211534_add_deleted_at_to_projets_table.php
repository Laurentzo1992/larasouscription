<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToProjetsTable extends Migration
{
    public function up()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->softDeletes(); // Ajoute la colonne `deleted_at`
        });
    }

    public function down()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Supprime la colonne `deleted_at` si on fait un rollback
        });
    }
}

