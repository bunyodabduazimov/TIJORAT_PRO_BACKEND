<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('barcode')->nullable();
            $table->string('sku')->nullable();

            $table->foreignId('group_id')->nullable()->constrained('references')->nullOnDelete();
            $table->foreignId('unit_id')->nullable()->constrained('references')->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('references')->nullOnDelete();

            $table->integer('min_quantity')->default(0);
            $table->string('package')->nullable();
            $table->date('term')->nullable();
            $table->boolean('whole')->default(false);

            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('view')->default(0);

            $table->text('description')->nullable();
            $table->enum('type', ['product', 'service'])->default('product')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
