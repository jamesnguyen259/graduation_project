<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatLngToFamousPlaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('famous_places', function (Blueprint $table) {
            $table->double('lat')->after('location')->nullable();
            $table->double('lng')->after('lat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('famous_places', function (Blueprint $table) {
            $table->dropColumn(['lat', 'lng']);
        });
    }
}
