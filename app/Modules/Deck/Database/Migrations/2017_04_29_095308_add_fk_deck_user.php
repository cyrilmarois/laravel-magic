<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkDeckUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deck_user', function(Blueprint $table) {
            $table->foreign('deck_id', 'deck_user_deck_id_foreign')
                ->references('id')
                ->on('deck')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('user_id', 'deck_user_user_id_foreign')
                ->references('id')
                ->on('user')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deck_user', function(Blueprint $table) {
            $table->dropForeign('deck_user_deck_id_foreign');
            $table->dropForeign('deck_user_user_id_foreign');
        });
    }
}
