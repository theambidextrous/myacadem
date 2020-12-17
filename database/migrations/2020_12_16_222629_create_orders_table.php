<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderid', 55);
            $table->string('user_timezone', 55);
            $table->string('type_of_work', 55);
            $table->string('subject', 55);
            $table->string('work_level', 55);
            $table->string('work_pages', 5);
            $table->string('work_spacing', 5);
            $table->string('work_urgency', 55);
            $table->string('user_email', 55);
            $table->string('user_phone', 55);
            $table->string('order_amount', 55);
            $table->string('work_topic', 55);
            $table->text('work_instructions');
            $table->string('work_references', 5);
            $table->string('work_format', 30);
            $table->text('paylog')->nullable();
            $table->boolean('paid')->default(false);
            $table->string('pay_amount')->nullable();
            $table->text('edit_link');
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
        Schema::dropIfExists('orders');
    }
}
