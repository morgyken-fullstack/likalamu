<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->text('body');
            $table->string('studentId');
            $table->string('questionId')->unique();
            $table->string('header');
            $table->text('summary');
            $table->string('pages');
            $table->string('level');
            $table->string('paperType');
            $table->string('studentprice');
            $table->string('tutorprice');
            $table->string('format');
            $table->string('deadline');
            $table->rememberToken();
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
}