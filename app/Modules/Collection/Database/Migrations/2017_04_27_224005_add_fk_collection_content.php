<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCollectionContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collection_content', function(Blueprint $table) {
            $table->foreign('collection_id', 'collection_content_collection_id_foreign')
                ->references('id')
                ->on('collection')
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
        Schema::table('collection_content', function(Blueprint $table) {
            $table->dropForeign('collection_content_collection_id_foreign');
        });
    }
}
