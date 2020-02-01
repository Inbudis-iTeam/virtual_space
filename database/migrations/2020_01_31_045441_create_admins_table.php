<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id_admin');
            $table->unsignedBigInteger('creator');
            $table->string('username_admin',254);
            $table->string('password_admin',254);
            $table->boolean('islogin_admin');
            $table->text('info_admin',254);
            $table->timestamps();
        });
        Schema::table('admin', function (Blueprint $table) {
            $table->foreign('creator')->references('id_admin')->on('admin')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
