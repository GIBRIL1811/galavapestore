<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    public function up()
{
    Schema::create('product_category', function (Blueprint $table) {
        $table->id();

        // Ubah dari unsignedInteger ke unsignedBigInteger
        $table->unsignedBigInteger('product_id');
        $table->unsignedBigInteger('category_id');

        $table->timestamps();

        // Foreign key sesuaikan dengan tipe kolom target (bigint)
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
