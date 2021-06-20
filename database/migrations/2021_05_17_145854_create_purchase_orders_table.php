<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('po_no')->nullable();
            $table->string('requisition_no');
            $table->unsignedBigInteger('category_id');
            $table->string('requisition_type');
            $table->string('manufacturer');
            $table->unsignedBigInteger('country_id');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->unsignedBigInteger('unit_id');
            $table->date('needed_date');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('worker_id');
            $table->boolean('approved_by')->default(false);
            $table->unsignedBigInteger('requisition_id');
            $table->foreign('requisition_id')->references('id')->on("requisitions")->onDelete('CASCADE');
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
        Schema::dropIfExists('purchase_orders');
    }
}
