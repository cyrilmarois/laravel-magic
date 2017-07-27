<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type', function(Blueprint $table) {
            $table->foreign('parent_id', 'type_parent_id_foreign')
                ->references('id')
                ->on('type')
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
        Schema::table('type', function(Blueprint $table) {
            $table->dropForeign('type_parent_id_foreign');
        });
    }
}
