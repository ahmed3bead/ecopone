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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            // Assuming 'question' and 'description' are translatable
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            // Topic relationship
            $table->boolean('is_active')->default(true);
            $table->foreignId('faq_category_id')->constrained('faq_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
