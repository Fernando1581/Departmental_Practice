<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rice_item_id')->constrained('rice_items')->onDelete('cascade');
            $table->decimal('quantity', 8, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_status', ['Unpaid', 'Paid'])->default('Unpaid');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};