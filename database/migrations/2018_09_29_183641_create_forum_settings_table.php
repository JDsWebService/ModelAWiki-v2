<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading')->default('Welcome to the Forums!');
            $table->string('motd')->default('We strive on community driven input!');
            $table->string('image')->default('/images/forum/placeholder.png');
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
        Schema::dropIfExists('forum_settings');
    }
}
