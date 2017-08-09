<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set', function(Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 45);
            $table->string('icon_filename', 100);
            $table->unsignedInteger('count')
                ->default(0);
            $table->date('published_at');
            $table->unsignedInteger('block_id')
                ->index()
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
        Schema::dropIfExists('set');
    }
}
