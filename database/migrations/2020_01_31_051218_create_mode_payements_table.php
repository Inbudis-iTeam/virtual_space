<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModePayementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mode_payement', function (Blueprint $table) {
            $table->bigIncrements('id_modpay');
            $table->unsignedBigInteger('id_admin');
            $table->string('titre_modpay',254);
            $table->boolean('statut_modpay');
            $table->timestamps();
        });
        Schema::table('mode_payement', function (Blueprint $table) {
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
        Schema::dropIfExists('mode_payement');
    }
}
