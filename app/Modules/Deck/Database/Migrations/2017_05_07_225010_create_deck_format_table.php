<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeckFormatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deck_format', function(Blueprint $table) {
            $table->unsignedInteger('deck_id')
                ->index();
            $table->unsignedInteger('format_id')
                ->index();
            $table->primary(['deck_id', 'format_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deck_format');
    }
}
