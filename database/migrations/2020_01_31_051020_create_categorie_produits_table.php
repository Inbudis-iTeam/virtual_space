<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_produit', function (Blueprint $table) {
            $table->bigIncrements('id_catpro');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_subcatpro');
            $table->string('titre_catpro',254);
            $table->boolean('statut_catpro');
            $table->timestamps();
        });
        Schema::table('categorie_produit', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_subcatpro')->references('id_catpro')->on('categorie_produit')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_produit');
    }
}
