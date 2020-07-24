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
            $table->timestamp('time_checkin')->nullable();
            $table->timestamp('time_checkout')->nullable();
            $table->unsignedBigInteger('location_check_in');
            $table->foreign('location_check_in')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('location_check_out');
            $table->foreign('location_check_out')->references('id')->on('locations')->onDelete('cascade');
            $table->string('project_name');
            $table->string('content');
            $table->unsignedBigInteger('project_user_id');
            $table->foreign('project_user_id')->references('id')->on('project_user')->onDelete('cascade');
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
