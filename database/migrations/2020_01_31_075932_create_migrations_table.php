<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migration', function (Blueprint $table) {
            $table->bigIncrements('id_migrat');
            $table->unsignedBigInteger('id_dist');
            $table->unsignedBigInteger('id_typmig');
            $table->unsignedBigInteger('id_bureau');
            $table->dateTime('date_migrat');
            $table->string('rang_migrat',254);
            $table->boolean('statut_trans');
            $table->timestamps();
        });
        Schema::table('migration', function (Blueprint $table) {
            $table->foreign('id_dist')->references('id_dist')->on('distributeur')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_typmig')->references('id_typmig')->on('type_migration')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_bureau')->references('id_bureau')->on('bureau')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('migration');
    }
}
