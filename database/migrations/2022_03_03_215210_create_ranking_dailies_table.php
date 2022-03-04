<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingDailiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking_dailies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user')->unsigned()->index();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->string('difficulty');
            $table->integer('nGames');
            $table->integer('avgScore');
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
        Schema::dropIfExists('ranking_dailies');
    }
}
