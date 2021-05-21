<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->longText('feedback');
            $table->longText('response')->nullable();
            $table->timestamp('review_time')->nullable();
            $table->boolean('is_anonymous')->default(false);

            $table->unsignedBigInteger('accessment_id')->nullable();
            $table->foreign('accessment_id')->references('id')->on('accessments');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('users');
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
        Schema::dropIfExists('feedback');
    }
}
