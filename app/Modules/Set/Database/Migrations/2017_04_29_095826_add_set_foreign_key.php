<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSetForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set', function(Blueprint $table) {
            $table->foreign('collection_id', 'set_collection_id_foreign')
                ->references('id')
                ->on('collection')
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
            $table->dropForeign('set_collection_id_foreign');
        });
    }
}
