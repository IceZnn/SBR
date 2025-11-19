<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('race_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('winner_team_id')->constrained('times')->onDelete('cascade');
            $table->foreignId('loser_team_id')->constrained('times')->onDelete('cascade');
            $table->string('winner_runner_name');
            $table->decimal('race_time', 8, 2);
            $table->string('winner_team_name');
            $table->string('loser_team_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('race_results');
    }
};