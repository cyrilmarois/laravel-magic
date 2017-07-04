<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mana_cost')
                ->nullable();
            $table->string('power', 2)
                ->nullable();
            $table->string('toughness', 2)
                ->nullable();
            $table->string('number', 5)
                ->nullable();
            $table->integer('set_id')
                ->unsigned()
                ->nullable();
            $table->integer('color_id')
                ->unsigned()
                ->nullable();
            $table->integer('type_id')
                ->unsigned()
                ->nullable();
            $table->integer('rarity_id')
                ->unsigned()
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
        Schema::dropIfExists('card');
    }
}
