<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->text('message');
            $table->timestamps();
        });

        Schema::table('support_responses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('message_id')->references('id')->on('support_messages')
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
        Schema::table('support_responses', function (Blueprint $table) {
             $table->dropForeign('support_responses_user_id_foreign');
             $table->dropForeign('support_responses_admin_id_foreign');
             $table->dropForeign('support_responses_message_id_foreign');
        });

        Schema::dropIfExists('support_responses');
    }
}
