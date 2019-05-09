<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareables', function (Blueprint $table) {
            $table->integer('sharer_id')->unsigned();
            $table->integer('shared_id')->unsigned();
            $table->foreign('sharer_id')->references('id')->on('users');
            $table->foreign('shared_id')->references('id')->on('users');
            $table->primary(['sharer_id', 'shared_id']);

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
        Schema::dropIfExists('shareables');
    }
}
