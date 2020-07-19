<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('away_team')->nullable();
            $table->string('away_team_name')->nullable();
            $table->Integer('comp_id')->nullable();
            $table->string('comp_name')->nullable();
            $table->dateTime('game_date')->nullable();
            $table->Integer('home_team')->nullable();
            $table->string('home_team_name')->nullable();
            $table->string('venue')->nullable();
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
        Schema::dropIfExists('fixtures');
    }
}
