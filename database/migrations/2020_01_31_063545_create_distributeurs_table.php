<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributeur', function (Blueprint $table) {
            $table->bigIncrements('id_dist');
            $table->unsignedBigInteger('id_typuser');
            $table->unsignedBigInteger('id_catuser');
            $table->unsignedBigInteger('refinit_dist');
            $table->unsignedBigInteger('refinst_dist');
            $table->unsignedBigInteger('id_bureau');
            $table->unsignedBigInteger('id_ville');
            $table->string('nom_dist',254);
            $table->string('prenom_dist',254);
            $table->string('matricule_dist',254);
            $table->string('password_dist',254);
            $table->integer('sexe_dist');
            $table->integer('phone_dist');
            $table->string('mail_dist',254);
            $table->string('datenaiss_dist',254);
            $table->string('heritier_dist',254);
            $table->boolean('statut_dist');
            $table->timestamps();
        });
        Schema::table('distributeur', function (Blueprint $table) {
            $table->foreign('id_typuser')->references('id_typuser')->on('type_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_catuser')->references('id_catuser')->on('categorie_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('refinit_dist')->references('id_dist')->on('distributeur')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('refinst_dist')->references('id_dist')->on('distributeur')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_bureau')->references('id_bureau')->on('bureau')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ville')->references('id_ville')->on('ville')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributeur');
    }
}
