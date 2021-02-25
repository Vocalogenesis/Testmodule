<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_answers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('questionID');
            $table->foreign('questionID')->references('id')->on('tests_questions')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('testID');
            $table->foreign('testID')->references('id')->on('tests')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('correct')->default('0');
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
        Schema::dropIfExists('tests_answers');
    }
}
