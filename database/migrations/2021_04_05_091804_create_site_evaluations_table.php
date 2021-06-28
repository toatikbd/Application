<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('task_title');
            $table->string('slug');
            $table->string('task_description');
            $table->integer('task_progress');
            $table->string('file');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('site_evaluations');
    }
}
