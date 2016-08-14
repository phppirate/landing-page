<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignUpTrackableLinkPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_up_trackable_link', function (Blueprint $table) {
            $table->integer('sign_up_id')->unsigned()->index();
            $table->foreign('sign_up_id')->references('id')->on('sign_ups')->onDelete('cascade');
            $table->integer('trackable_link_id')->unsigned()->index();
            $table->foreign('trackable_link_id')->references('id')->on('trackable_links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sign_up_trackable_link');
    }
}
