<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkSetContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_content', function(Blueprint $table) {
            $table->foreign('set_id', 'set_content_set_id_foreign')
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
        Schema::table('set_content', function(Blueprint $table) {
            $table->dropForeign('set_content_set_id_foreign');
        });
    }
}
