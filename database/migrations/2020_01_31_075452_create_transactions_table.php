<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id_trans');
            $table->unsignedBigInteger('id_dist');
            $table->dateTime('date_trans');
            $table->string('type_trans',254);
            $table->string('matinit_trans',254);
            $table->string('matref_trans',254);
            $table->float('montant_trans');
            $table->boolean('statut_trans');
            $table->timestamps();
        });
        Schema::table('transaction', function (Blueprint $table) {
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
        Schema::dropIfExists('transaction');
    }
}
