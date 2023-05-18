<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('description');
            $table->date('deadline');
            $table->unsignedBigInteger('assignee');
            $table->foreign('assignee')->on('users')->references('id')->onDelete('cascade');
            $table->enum('status', array('To Do', 'On Hold','Canceled', 'Success'));
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
        Schema::dropIfExists('tasks');
    }
};
