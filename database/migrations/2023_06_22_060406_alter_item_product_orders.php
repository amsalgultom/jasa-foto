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
        Schema::table('item_product_orders', function (Blueprint $table) {
            $table->string('name_product')->nullable();
            $table->bigInteger('price_product')->nullable();
            $table->integer('qty_product')->nullable();
            $table->bigInteger('sub_total_product')->nullable();
            $table->longText('note_product')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_product_orders', function (Blueprint $table) {
            //
        });
    }
};
