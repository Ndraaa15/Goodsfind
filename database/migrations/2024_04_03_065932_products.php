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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price');
            $table->text('image');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('condition');
            $table->integer('stock');
            $table->decimal('discount');
            $table->integer('time_usage');
            $table->boolean('is_promotion');
            $table->integer('rating')->default(0);
            $table->unsignedInteger('total_review')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('set null');
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
