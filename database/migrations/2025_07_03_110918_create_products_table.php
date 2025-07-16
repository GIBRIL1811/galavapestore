<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('konten')->nullable();
            $table->string('gambar')->nullable();
            $table->decimal('harga', 10, 2)->default(0.00); // Harga produk
            $table->integer('kuantitas')->default(0); // Kuantitas produk
            $table->enum('status', ['PUBLISH', 'DRAFT'])->default('DRAFT');

            // Foreign key ke table users
            $table->unsignedBigInteger('create_by')->nullable();
            $table->unsignedBigInteger('update_by')->nullable();

            $table->timestamps();

            // Tambahkan foreign key constraint dengan ON DELETE SET NULL
            $table->foreign('create_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('update_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
