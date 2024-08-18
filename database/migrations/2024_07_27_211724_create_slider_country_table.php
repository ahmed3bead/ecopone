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
//        Schema::create('slider_country', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('slider_id')->constrained('sliders')->onDelete('cascade');
//            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
//            $table->string('url');
//            $table->date('start_date');
//            $table->date('end_date');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_country');
    }
};
