<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card', function(Blueprint $table) {
            $table->foreign('color_id', 'card_color_id_foreign')
                ->references('id')
                ->on('color')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');
            $table->foreign('type_id', 'card_type_id_foreign')
                ->references('id')
                ->on('type')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');
            $table->foreign('rarity_id','card_rarity_id_foreign')
                ->references('id')
                ->on('rarity')
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
        Schema::table('card', function(Blueprint $table) {
            $table->dropForeign('card_color_id_foreign');
            $table->dropForeign('card_type_id_foreign');
            $table->dropForeign('card_rarity_id_foreign');
        });
    }
}
