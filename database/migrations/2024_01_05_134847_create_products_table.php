<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->string('code')->unique();
            $table->json('description');
            $table->integer('quantity');
            $table->decimal('price');
            $table->unsignedTinyInteger('price_type');
            $table->decimal('discount')->nullable();
            $table->unsignedTinyInteger('discount_type')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedTinyInteger('condition')->default(1);
            $table->integer('sales_count')->default(0);
            $table->integer('shipping_time');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
