<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('route', 100);
            $table->time('exit_terminal_time');
            $table->unsignedInteger('speedometer_stats_before');
            $table->time('arrive_client_time');
            $table->unsignedInteger('unloading_time_minutes');
            $table->time('exit_client_time');
            $table->time('arrive_terminal_time');
            $table->unsignedInteger('speedometer_stats_after');
            $table->unsignedInteger('distance_kms');
            $table->decimal('fuel_litres', 8, 2);

            $table->integer('vehicle_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('journeys');
    }
}
