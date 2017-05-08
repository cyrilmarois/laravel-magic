<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardDeckForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_deck', function(Blueprint $table) {
            $table->foreign('card_id', 'card_deck_card_id_foreign')
                ->references('id')
                ->on('card')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('deck_id', 'card_deck_deck_id_foreign')
                ->references('id')
                ->on('deck')
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
        Schema::table('card_deck', function(Blueprint $table) {
            $table->dropForeign('card_deck_card_id_foreign');
            $table->dropForeign('card_deck_deck_id_foreign');
        });
    }
}
