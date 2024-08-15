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
//        Schema::create('coupon_country', function (Blueprint $table) {
//            $table->id();
//            $table->string('code');
//            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
//            $table->foreignId('coupon_id')->constrained('coupons')->onDelete('cascade');
//            $table->boolean('is_featured')->default(false);
//            $table->date('start_date');
//            $table->date('end_date');
//            $table->boolean('is_active')->default(true);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_country');
    }
};
