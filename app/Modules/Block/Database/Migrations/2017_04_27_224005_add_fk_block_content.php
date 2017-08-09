<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkBlockContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('block_content', function(Blueprint $table) {
            $table->foreign('block_id', 'block_content_block_id_foreign')
                ->references('id')
                ->on('block')
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
        Schema::table('block_content', function(Blueprint $table) {
            $table->dropForeign('block_content_block_id_foreign');
        });
    }
}
