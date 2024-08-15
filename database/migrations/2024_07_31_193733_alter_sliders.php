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
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('country_id')->change();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->string('country_id')->change();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->boolean('is_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            //
        });
    }
};
