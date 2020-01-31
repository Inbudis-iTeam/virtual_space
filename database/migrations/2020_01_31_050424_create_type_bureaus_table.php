<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeBureausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_bureau', function (Blueprint $table) {
            $table->bigIncrements('id_typbur');
            $table->unsignedBigInteger('id_admin');
            $table->string('titre_typburr',254);
            $table->boolean('statut_typbur');
            $table->timestamps();
        });
        Schema::table('type_bureau', function (Blueprint $table) {
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
        Schema::dropIfExists('type_bureau');
    }
}
