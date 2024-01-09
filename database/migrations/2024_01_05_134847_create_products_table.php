<?php

use App\Enums\ProductConditionEnum;
use App\Enums\ProductStatusEnum;
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
            $table->json('description');
            $table->integer('quantity');
            $table->decimal('price');
            $table->decimal('discount')->nullable();
            $table->enum('status', ['active', 'desactive'])->default(ProductStatusEnum::ACTIVE->value);
            $table->enum('condition',['default','new','hot'])->default(ProductConditionEnum::DEFAULT->value);
            $table->integer('sales_count')->default(0);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
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
