<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNjanguisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('njangui', function (Blueprint $table) {
            $table->bigIncrements('id_njang');
            $table->unsignedBigInteger('owner');
            $table->float('montant_njang');
            $table->boolean('statut_njang');
            $table->timestamps();
        });
        Schema::table('njangui', function (Blueprint $table) {
            $table->foreign('owner')->references('id_dist')->on('distributeur')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('njangui');
    }
}
