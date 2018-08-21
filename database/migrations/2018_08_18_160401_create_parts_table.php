<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->string('name');
            $table->string('slug', 100);
            $table->string('part_number')->unique();
            $table->text('description');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('body_type');
            $table->year('year');
            $table->text('reminder')->nullable();
            $table->text('tip')->nullable();
            $table->text('warning')->nullable();
            $table->text('fun_fact')->nullable();
            $table->string('featured_image')->nullable()->default('placeholder.png');
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
        Schema::dropIfExists('parts');
    }
}
