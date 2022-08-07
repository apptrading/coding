<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderByCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_by_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_userid');
            $table->integer('cust_customerid');
            $table->integer('cust_approve');
            $table->integer('cust_whoid');
            $table->integer('cust_count')->nullable();
            $table->integer('cust_payment');
            $table->string('cust_barcode');
            $table->string('cust_picturepayment')->nullable();;
            $table->integer('cust_status');
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
        Schema::dropIfExists('order_by_customers');
    }
}
