<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsUseranswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_useranswers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answerID');
            $table->foreign('answerID')->references('id')->on('tests_answers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('testID');
            $table->foreign('testID')->references('id')->on('tests')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tests_useranswers');
    }
}
