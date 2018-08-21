<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefineRelationshipsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::table('parts', function (Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('part_sections')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
             $table->dropForeign('posts_category_id_foreign');
             $table->dropForeign('posts_user_id_foreign');
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign('post_tag_post_id_foreign');
            $table->dropForeign('post_tag_tag_id_foreign');
        });

        Schema::table('parts', function (Blueprint $table) {
            $table->dropForeign('parts_section_id_foreign');
        });
    }
}
