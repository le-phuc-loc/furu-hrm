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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('project_name')->nullable();
            $table->integer('number_employees')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->timestamp('time_to_checkin')->nullable();
            $table->timestamp('time_to_checkout')->nullable();
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
