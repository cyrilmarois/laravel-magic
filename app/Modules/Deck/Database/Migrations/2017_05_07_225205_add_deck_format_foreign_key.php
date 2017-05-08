<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeckFormatForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deck_format', function(Blueprint $table) {
            $table->foreign('deck_id', 'deck_format_deck_id_foreign')
                ->references('id')
                ->on('deck')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('format_id', 'deck_format_format_id_foreign')
                ->references('id')
                ->on('format')
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
        Schema::table('deck_format', function(Blueprint $table) {
            $table->dropForeign('deck_format_deck_id_foreign');
            $table->dropForeign('deck_format_format_id_foreign');
        });
    }
}
