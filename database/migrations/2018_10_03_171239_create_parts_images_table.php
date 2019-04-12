<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('part_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('approved');
            $table->string('image');
            $table->string('caption');
            $table->timestamps();
        });

        Schema::table('parts_images', function (Blueprint $table) {
            $table->foreign('part_id')->references('id')->on('parts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parts_images', function (Blueprint $table) {
             $table->dropForeign('parts_images_part_id_foreign');
             $table->dropForeign('parts_images_user_id_foreign');
        });

        Schema::dropIfExists('parts_images');
    }
}
