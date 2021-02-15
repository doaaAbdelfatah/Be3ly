<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("expense_id")->constrained("expenses");
            $table->foreignId("branch_id")->nullable()->constrained("branches");
            $table->foreignId("store_id")->nullable()->constrained("stores");
            $table->string("url")->nullable();
            $table->decimal("amount");
            $table->string("comment" ,2000)->nullable();
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
        Schema::dropIfExists('store_expenses');
    }
}
