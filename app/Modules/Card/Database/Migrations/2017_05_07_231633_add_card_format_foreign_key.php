<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardFormatForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_format', function(Blueprint $table) {
            $table->foreign('card_id', 'card_format_card_id_foreign')
                ->references('id')
                ->on('card')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('format_id', 'card_format_format_id_foreign')
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
        Schema::table('card_format', function(Blueprint $table) {
            $table->dropForeign('card_format_card_id_foreign');
            $table->dropForeign('card_format_format_id_foreign');
        });
    }
}
