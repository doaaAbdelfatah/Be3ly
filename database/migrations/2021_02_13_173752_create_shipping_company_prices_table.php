<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCompanyPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_company_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("shipping_company_id")->constrained("shipping_companies");
            $table->foreignId("location_id")->constrained("locations");
            $table->decimal("amount");
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
        Schema::dropIfExists('shipping_company_prices');
    }
}
