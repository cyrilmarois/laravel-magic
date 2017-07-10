<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeckForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deck', function(Blueprint $table) {
            $table->foreign('color_id', 'deck_color_id_foreign')
                ->references('id')
                ->on('color')
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
        Schema::table('deck', function(Blueprint $table) {
            $table->dropForeign('deck_color_id_foreign');
        });
    }
}
