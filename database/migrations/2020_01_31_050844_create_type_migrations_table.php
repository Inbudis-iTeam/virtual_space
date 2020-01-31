<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_migration', function (Blueprint $table) {
            $table->bigIncrements('id_typmig');
            $table->unsignedBigInteger('id_admin');
            $table->string('titre_typmig',254);
            $table->boolean('statut_typmig');
            $table->timestamps();
        });
        Schema::table('type_migration', function (Blueprint $table) {
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
        Schema::dropIfExists('type_migration');
    }
}
