<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_assessment', function (Blueprint $table) {
            $table->primary(['assessment_id', 'feedback_id']);
            $table->bigInteger('feedback_id')->unsigned();
            $table->bigInteger('assessment_id')->unsigned();
            $table->foreign('feedback_id')
                ->references('id')
                ->on('feedback');
            $table->foreign('assessment_id')
                ->references('id')
                ->on('assessments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_Assessment');
    }
}
