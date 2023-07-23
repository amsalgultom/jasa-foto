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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code_voucher');
            $table->string('description')->nullable();
            $table->enum('type',['Percen','Fixed']);
            $table->bigInteger('value_discount');
            $table->bigInteger('max_value_price_discount');
            $table->bigInteger('min_price_order')->nullable();
            $table->bigInteger('min_product_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
