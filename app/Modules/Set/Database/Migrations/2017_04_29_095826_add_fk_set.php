<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set', function(Blueprint $table) {
            $table->foreign('block_id', 'set_block_id_foreign')
                ->references('id')
                ->on('block')
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
        Schema::table('set', function(Blueprint $table) {
            $table->dropForeign('set_block_id_foreign');
        });
    }
}
