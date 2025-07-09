<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('products', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->integer('price')->nullable();
            $table->string('name')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('details')->nullable();
            $table->boolean('inStock')->default(true);
            $table->decimal('rating', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
