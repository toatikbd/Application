<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchitecturalDrawingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architectural_drawings', function (Blueprint $table) {
            $table->id();
            $table->string('task_title')->unique();
            $table->string('slug');
            $table->string('task_description');
            $table->integer('task_progress');
            $table->string('file');
            $table->unsignedBigInteger('project_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('worker_id');
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
        Schema::dropIfExists('architectural_drawings');
    }
}
