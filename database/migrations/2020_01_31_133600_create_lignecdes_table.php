<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignecdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignecde', function (Blueprint $table) {
            $table->bigIncrements('id_lcde');
            $table->unsignedBigInteger('id_command');
            $table->integer('qte_lcde');
            $table->float('pu_lcde');
            $table->float('montant_lcde');
            $table->string('reference_lcde',254);
            $table->boolean('statut_lcde');
            $table->timestamps();
        });
        Schema::table('lignecde', function (Blueprint $table) {
            $table->foreign('id_command')->references('id_command')->on('commande')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lignecde');
    }
}
