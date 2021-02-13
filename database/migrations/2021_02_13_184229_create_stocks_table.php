<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("branch_id")->constrained("branches");
            $table->foreignId("product_id")->constrained("products");
            $table->decimal("min_quantity_in_stock")->default(10);
            $table->decimal("quantity");
            $table->foreignId("unit_id")->constrained("units");
            $table->decimal("avg_price")->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
