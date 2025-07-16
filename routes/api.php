<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route: Tentang
Route::get('about', 'Api\DataController@get_about');

// Route: Kategori
Route::get('categories', 'Api\DataController@get_categories');
Route::get('categories/{category}', 'Api\DataController@get_category_by_id');

// Route: Produk
Route::get('products', 'Api\DataController@get_all_products');
Route::get('products/{id}', 'Api\DataController@get_product_by_id');
Route::get('products/category/{category}', 'Api\DataController@get_product_by_category_name');
