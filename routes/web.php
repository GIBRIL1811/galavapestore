<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', 'UserController@home')->name('home');
Route::get('/blog', 'UserController@blog')->name('blog');
Route::get('/blog/{slug}', 'UserController@show_article')->name('blog.show');
Route::get('/contact', 'UserController@contact')->name('contact');

// ✅ Produk (frontend untuk user, bukan admin)
Route::get('/produk', 'UserController@produk')->name('produk');
Route::get('/produk/{slug}', 'UserController@show_product')->name('produk.show');

// ✅ Admin Panel Routes
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('auth/login');
    });

    // Redirect pendaftaran
    Route::match(["GET", "POST"], "/register", function () {
        return redirect("/login");
    })->name("register");

    Auth::routes();

    Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

    // Category routes
    Route::get('/categories/{category}/restore', 'CategoryController@restore')->name('categories.restore');
    Route::delete('/categories/{category}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
    Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');
    Route::resource('categories', 'CategoryController')->middleware('auth');

    // ✅ Product admin di dalam /admin prefix
    Route::post('/products/upload', 'ProductController@upload')->name('products.upload')->middleware('auth');
    Route::resource('products', 'ProductController')->middleware('auth');

    // About routes
    Route::get('/abouts', 'AboutController@index')->name('abouts.index')->middleware('auth');
    Route::get('/abouts/{about}/edit', 'AboutController@edit')->name('abouts.edit')->middleware('auth');
    Route::put('/abouts/{about}', 'AboutController@update')->name('abouts.update')->middleware('auth');
});
