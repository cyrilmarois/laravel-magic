<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSetRarityForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_rarity', function(Blueprint $table) {
            $table->foreign('set_id', 'set_rarity_set_id_foreign')
                ->references('id')
                ->on('set')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('rarity_id', 'set_rarity_rarity_id_foreign')
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
        Schema::table('set_rarity', function(Blueprint $table) {
            $table->dropForeign('set_rarity_set_id_foreign');
            $table->dropForeign('set_rarity_rarity_id_foreign');
        });
    }
}
