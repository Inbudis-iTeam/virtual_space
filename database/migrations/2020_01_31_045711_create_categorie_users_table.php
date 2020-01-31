<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_user', function (Blueprint $table) {
            $table->bigIncrements('id_catuser');
            $table->unsignedBigInteger('id_admin');
            $table->string('titre_catuser',254);
            $table->boolean('statut_catuser');
            $table->timestamps();
        });
        Schema::table('categorie_user', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_user');
    }
}
