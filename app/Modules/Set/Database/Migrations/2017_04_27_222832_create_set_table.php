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
            $table->string('name', 100);
            $table->string('slug', 10);
            $table->string('logo_filename');
            $table->string('icon_filename');
            $table->integer('quantity')
                ->unsigned()
                ->default(0);
            $table->datetime('published_at');
            $table->unsignedInteger('collection_id')
                ->index()
                ->nullable();
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
