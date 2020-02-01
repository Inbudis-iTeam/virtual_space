<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance', function (Blueprint $table) {
            $table->bigIncrements('id_perf');
            $table->unsignedBigInteger('id_dist');
            $table->double('sur6mois_perf');
            $table->double('sur12mois_perf');
            $table->timestamps();
        });
        Schema::table('performance', function (Blueprint $table) {
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
        Schema::dropIfExists('performance');
    }
}
