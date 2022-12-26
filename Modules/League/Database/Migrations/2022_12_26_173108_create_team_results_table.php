<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_team_id')->constrained('league_teams')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('matches')->default(0);
            $table->integer('won')->default(0);
            $table->integer('deal')->default(0);
            $table->integer('loss')->default(0);
            $table->string('goal')->comment('goal scored/gained')->nullable();
            $table->integer('GD')->comment('goal differences')->default(0);
            $table->integer('points')->default(0);
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_results');
    }
};
