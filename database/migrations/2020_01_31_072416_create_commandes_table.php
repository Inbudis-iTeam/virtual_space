<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande', function (Blueprint $table) {
            $table->bigIncrements('id_command');
            $table->unsignedBigInteger('id_dist');
            $table->unsignedBigInteger('id_modpay');
            $table->dateTime('date_command');
            $table->integer('numero_command');
            $table->integer('quantite_command');
            $table->float('montant_command');
            $table->string('etat_command',254);
            $table->float('totalttc_command');
            $table->boolean('statut_command');
            $table->timestamps();
        });
        Schema::table('commande', function (Blueprint $table) {
            $table->foreign('id_dist')->references('id_dist')->on('distributeur')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_modpay')->references('id_modpay')->on('mode_payement')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande');
    }
}
