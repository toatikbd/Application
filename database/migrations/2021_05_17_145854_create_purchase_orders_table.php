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
            $table->unsignedBigInteger('requisition_name');
            $table->string('unit');
            $table->integer('qty');
            $table->integer('unit_price');
            $table->integer('total_price');
            $table->date('requisition_issue_date');
            $table->integer('requisition_umber');
            $table->date('order_date');
            $table->string('requisition_type');
            $table->unsignedBigInteger('project_name');
            $table->unsignedBigInteger('supervisor_name');
            $table->text('note');
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
