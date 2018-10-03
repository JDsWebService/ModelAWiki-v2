<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminIdFieldToForumRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forum_replies', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('admin_id')->references('id')->on('admins')
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
        Schema::table('forum_replies', function (Blueprint $table) {
            $table->dropForeign('forum_replies_admin_id_foreign');
            $table->dropColumn('admin_id');
        });
    }
}
