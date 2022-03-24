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
            $table->double("user_id");
            $table->double("phn_no");
            $table->text("shipping_address");
            $table->string("product_id");
            $table->string("quantity");
            $table->double("total_product");
            $table->double("subtotal_price");
            $table->double("shipping_price");
            $table->double("total_price");
            $table->double("tax");
            $table->string("payment_status");
            $table->string("status")->default(0);;
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
