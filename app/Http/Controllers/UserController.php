<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\About;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home', [
            'categories' => Category::all(),
            'about'      => About::all()
        ]);
    }

    public function produk(Request $request)
    {
        $keyword  = $request->get('s') ?? '';
        $category = $request->get('c') ?? '';

        $products = Product::with('categories')
                    ->when($category, function($query) use ($category) {
                        $query->whereHas('categories', function($q) use ($category) {
                            $q->where('name', 'LIKE', "%$category%");
                        });
                    })
                    ->where('status', 'PUBLISH')
                    ->where('title', 'LIKE', "%$keyword%")
                    ->orderBy('created_at','desc')
                    ->paginate(10);

        $recents = Product::select('title','slug')
                    ->where('status', 'PUBLISH')
                    ->orderBy('created_at','desc')
                    ->limit(5)->get();

        return view('user.produk', [
            'products' => $products,
            'recents'  => $recents
        ]);
    }

    public function show_product($slug)
{
    $product = Product::where('slug', $slug)->first();

    // Jika tidak ditemukan, kembalikan 404
    if (!$product) {
        abort(404);
    }

    $recents = Product::select('title','slug')
        ->where('status', 'PUBLISH')
        ->orderBy('created_at','desc')
        ->limit(5)
        ->get();

    return view('user.produk', [
        'products' => $product,
        'recents' => $recents
    ]);
}

    public function contact()
    {
        return view('user.contact');
    }
}
