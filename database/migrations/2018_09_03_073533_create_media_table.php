<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
           $table->increments('id');
           $table->string('media_path');
           $table->string('url');

           $table->unsignedInteger('user_id');
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

           $table->unsignedInteger('tag_id');
           $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
