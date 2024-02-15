<?php

use App\Enums\CouponStatusEnum;
use App\Enums\CouponTypeEnum;
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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type', CouponTypeEnum::values());
            $table->decimal('value');
            $table->integer('max_usage');
            $table->integer('number_of_usage')->default(0);
            $table->decimal('min_order_value');
            $table->date('expire_date');
            $table->enum('status', CouponStatusEnum::values())->default(CouponStatusEnum::ACTIVE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
