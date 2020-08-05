<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->time('time_checkin')->nullable();
            $table->time('time_checkout')->nullable();
            $table->unsignedBigInteger('location_check_in')->nullable();
            $table->foreign('location_check_in')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('location_check_out')->nullable();
            $table->foreign('location_check_out')->references('id')->on('locations')->onDelete('cascade');
            $table->string('content')->nullable();
            $table->integer('time_working')->nullable();
            $table->unsignedBigInteger('project_user_id');
            $table->foreign('project_user_id')->references('id')->on('project_user')->onDelete('cascade');
            $table->integer('state')->default('-2');
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
        Schema::dropIfExists('reports');
    }
}
