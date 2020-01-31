<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBureausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureau', function (Blueprint $table) {
            $table->bigIncrements('id_bureau');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_typbur');
            $table->unsignedBigInteger('id_quart');
            $table->string('titre_bureau',254);
            $table->boolean('statut_bureau');
            $table->timestamps();
        });
        Schema::table('bureau', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_typbur')->references('id_typbur')->on('type_bureau')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_quart')->references('id_quart')->on('quartier')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bureau');
    }
}
