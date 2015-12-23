<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->dateTime('due_date');
            $table->string('status');
            $table->foreign('parent_id')->references('id')->on('tasks');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('tasks');
    }
}
