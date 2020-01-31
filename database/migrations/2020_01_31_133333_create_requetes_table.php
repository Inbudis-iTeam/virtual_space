<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requete', function (Blueprint $table) {
            $table->bigIncrements('id_req');
            $table->unsignedBigInteger('id_dist');
            $table->string('titre_req',254);
            $table->text('description_req');
            $table->boolean('statut_req');
            $table->timestamps();
        });
        Schema::table('requete', function (Blueprint $table) {
            $table->foreign('id_dist')->references('id_dist')->on('distributeur')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requete');
    }
}
