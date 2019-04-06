<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeAttrInFacebookAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facebook_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->change();
            $table->string('provider')->nullable()->change();
            $table->string('provider_user_id')->unique()->nullable()->change();
            $table->renameColumn('provider_user_id', 'provider_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facebook_accounts', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->integer('user_id')->change();
            $table->string('provider')->nullable(false)->change();
            $table->string('provider_user_id')->unique(false)->nullable(false)->change();
            $table->renameColumn('provider_id', 'provider_user_id');
        });
    }
}
