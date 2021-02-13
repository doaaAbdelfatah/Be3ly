<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasing_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("supplier_id")->constrained("suppliers");
            $table->foreignId("created_by")->constrained("users");
            $table->decimal("total_invoice")->nullable();
            $table->enum("status" , ["pending" ,"delivered" ,"canceled" ,"canceled from supplier"])->default("pending");
            $table->foreignId("updated_by")->nullable()->constrained("users");
            $table->timestamp("received_at")->nullable();
            $table->foreignId("branch_id")->nullable()->constrained("branches");
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
        Schema::dropIfExists('purchasing_orders');
    }
}
