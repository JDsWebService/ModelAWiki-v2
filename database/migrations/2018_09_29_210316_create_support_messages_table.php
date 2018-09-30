<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned()->nullable();
            $table->integer('reply_id')->unsigned()->nullable();
            $table->string('reason');
            $table->string('message');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('support_messages', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('post_id')->references('id')->on('forum_posts')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('reply_id')->references('id')->on('forum_replies')
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
        Schema::table('support_messages', function (Blueprint $table) {
             $table->dropForeign('support_messages_user_id_foreign');
             $table->dropForeign('support_messages_post_id_foreign');
             $table->dropForeign('support_messages_reply_id_foreign');
        });

        Schema::dropIfExists('support_messages');
    }
}
