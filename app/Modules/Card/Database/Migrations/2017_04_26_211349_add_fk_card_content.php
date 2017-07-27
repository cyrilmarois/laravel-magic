<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCardContent extends Migration
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
        });
    }
}
