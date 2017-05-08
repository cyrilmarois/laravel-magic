<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_content', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('filename');
            $table->text('content');
            $table->unsignedInteger('card_id');
            $table->unsignedInteger('language_id')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_content');
    }
}
