<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardContentForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_content', function(Blueprint $table) {
            $table->foreign('card_id', 'card_content_card_id_foreign')
                ->references('id')
                ->on('card')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('language_id', 'card_content_language_id_foreign')
                ->references('id')
                ->on('language')
                ->onDelete('SET NULL')
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
        Schema::table('card_content', function(Blueprint $table) {
            $table->dropForeign('card_content_card_id_foreign');
            $table->dropForeign('card_content_language_id_foreign');
        });
    }
}
