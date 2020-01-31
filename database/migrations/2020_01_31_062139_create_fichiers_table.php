<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichier', function (Blueprint $table) {
            $table->bigIncrements('id_file');
            $table->integer('auteur');
            $table->string('referto_file',254);
            $table->string('titre_file',254);
            $table->string('chemin_file',254);
            $table->string('taille_file',254);
            $table->text('description_file');
            $table->boolean('statut_file');
            $table->timestamps();
        });
        // Schema::table('fichier', function (Blueprint $table) {
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichier');
    }
}
