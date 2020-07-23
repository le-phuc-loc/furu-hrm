<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->date('from_date');
            $table->date('to_date');
            $table->unsignedBigInteger('location_check_in');
            $table->foreign('location_check_in')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('location_check_out');
            $table->foreign('location_check_out')->references('id')->on('locations')->onDelete('cascade');
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
