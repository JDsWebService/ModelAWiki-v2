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
    }
}
