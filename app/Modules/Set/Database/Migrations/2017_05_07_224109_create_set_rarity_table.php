<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetRarityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_rarity', function(Blueprint $table) {
            $table->unsignedInteger('set_id')
                ->index();
            $table->unsignedInteger('rarity_id')
                ->index();
            $table->string('icon_filename');
            $table->primary(['set_id', 'rarity_id']);
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
        Schema::dropIfExists('set_rarity');
    }
}
