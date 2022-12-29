<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('videos');
            $table->unsignedBigInteger('books');
            $table->unsignedBigInteger('duration');
            $table->date('date');
            $table->decimal('price')->default('0.00');
            $table->string('image');
            $table->text('description');
            $table->string('link');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('platform_id');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');
        });

        Schema::create('course_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('series_id');
            $table->unique(['course_id', 'series_id']);

            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::create('course_topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('topic_id');
            $table->unique(['course_id', 'topic_id']);

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_topics');
        Schema::dropIfExists('course_series');
        Schema::dropIfExists('courses');
    }
};
