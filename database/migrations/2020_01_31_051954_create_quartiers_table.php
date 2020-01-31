<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quartier', function (Blueprint $table) {
            $table->bigIncrements('id_quart');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_ville');
            $table->string('titre_quart',254);
            $table->boolean('statut_quart');
            $table->timestamps();
        });
        Schema::table('quartier', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('quartier');
    }
}
