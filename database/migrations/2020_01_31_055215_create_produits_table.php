<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit', function (Blueprint $table) {
            $table->bigIncrements('id_prod');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_catpro');
            $table->string('nom_prod',254);
            $table->string('reference_prod',254);
            $table->text('description_prod');
            $table->float('prix_prod');
            $table->integer('qtestock_prod');
            $table->integer('stockalerte_prod');
            $table->integer('stockappro_prod');
            $table->boolean('statut_prod');
            $table->timestamps();
        });
        Schema::table('produit', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_catpro')->references('id_catpro')->on('categorie_produit')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit');
    }
}
