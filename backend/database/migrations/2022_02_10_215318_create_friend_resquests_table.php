<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendResquestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_resquests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('requester_id')->unsigned();
            $table->bigInteger('addressee_id')->unsigned();
            $table->foreign('requester_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('addressee_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status');
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
        Schema::dropIfExists('friend_resquests');
    }
}
