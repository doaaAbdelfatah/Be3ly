<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasing_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("purchasing_order_id")->constrained("purchasing_orders");
            $table->foreignId("product_id")->constrained("products");
            $table->decimal("unit_price");
            $table->decimal("quantity");
            $table->foreignId("unit_id")->constrained("units");
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
        Schema::dropIfExists('purchasing_order_details');
    }
}
