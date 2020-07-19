<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('player_id');
            $table->float('batting_average')->nullable();
            $table->float('bowling_average')->nullable();
            $table->float('economy_rate')->nullable();
            $table->integer('fifties_scored')->nullable();
            $table->integer('games')->nullable();
            $table->integer('highest_runs_scored')->nullable();
            $table->integer('hundreds_scored')->nullable();
            $table->integer('not_out')->nullable();
            $table->integer('runs_scored')->nullable();
            $table->integer('strike_rate')->nullable();
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
        Schema::dropIfExists('player_history');
    }
}
