<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignedprojects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('status');
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('projectstatus_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('projectstatus_id')->references('id')->on('projectstatuses');
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
        Schema::dropIfExists('assignedprojects');
    }
}
