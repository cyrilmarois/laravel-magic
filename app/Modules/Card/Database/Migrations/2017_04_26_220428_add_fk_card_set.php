<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCardSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_set', function(Blueprint $table) {
            $table->foreign('card_id', 'card_set_card_id_foreign')
                ->references('id')
                ->on('card')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('set_id', 'card_set_set_id_foreign')
                ->references('id')
                ->on('set')
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
        Schema::table('card', function(Blueprint $table) {
            $table->dropForeign('card_set_card_id_foreign');
            $table->dropForeign('card_set_set_id_foreign');
        });
    }
}
