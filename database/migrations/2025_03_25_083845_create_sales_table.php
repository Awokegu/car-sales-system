<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('car_id')->constrained(); // Foreign key to cars table
            $table->foreignId('customer_id')->constrained(); // Foreign key to customers table (or users)
            $table->decimal('price', 10, 2); // Sale price
            $table->timestamp('sale_date')->useCurrent(); // Date and time of sale
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
