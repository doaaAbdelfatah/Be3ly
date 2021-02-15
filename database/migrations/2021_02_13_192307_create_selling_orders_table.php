<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_orders', function (Blueprint $table) {

            $table->id();
            $table->foreignId("customer_id")->nullable()->constrained("users");
            $table->foreignId("created_by")->nullable()->constrained("users");
            $table->boolean("is_online")->default(false);
            $table->enum("status" , ["pending" ,"canceled","rejected" ,"accepted", "shipped" ,"delivered"  ])->default("pending");
            $table->foreignId("updated_by")->nullable()->constrained("users");
            $table->timestamp("estimated_delivery_at")->nullable();
            $table->decimal("total_invoice")->nullable();
            $table->decimal("shipping_fees")->nullable();
            $table->foreignId("shipping_company_id")->nullable()->constrained("shipping_companies");
            $table->foreignId("location_id")->nullable()->constrained("locations");
            $table->foreignId("branch_id")->constrained("branches");
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
        Schema::dropIfExists('selling_orders');
    }
}
