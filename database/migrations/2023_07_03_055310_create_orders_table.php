<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number');
            $table->date('order_date');
            $table->double('order_value', 18, 2);
            $table->mediumInteger('quantity');
            $table->enum('status', ['0', '1', '2'])->default(0);

            $table->foreignId('client_id')->references('id')->on('clients')->onDelete("cascade")->onUpdate('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete("cascade")->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
