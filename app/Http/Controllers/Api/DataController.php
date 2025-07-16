<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Category;
use App\Product;

class DataController extends Controller
{
    // Tentang
    public function get_about()
    {
        $about = About::all();
        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $about,
        ], 200);
    }

    // Semua Kategori
    public function get_categories()
    {
        $categories = Category::all();
        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $categories,
        ], 200);
    }

    // Kategori berdasarkan ID
    public function get_category_by_id($id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json([
                'message' => 'Success',
                'status' => 200,
                'data' => $category,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
                'data' => [],
            ], 404);
        }
    }

    // Semua Produk
    public function get_all_products(Request $request)
    {
        $keyword = $request->get('s') ?? '';
        $category = $request->get('c') ?? '';

        $products = Product::with('categories')
            ->whereHas('categories', function ($q) use ($category) {
                $q->where('name', 'LIKE', "%$category%");
            })
            ->where('status', 'PUBLISH')
            ->where('judul', 'LIKE', "%$keyword%")
            ->paginate(10);

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $products,
        ], 200);
    }

    // Produk berdasarkan ID
    public function get_product_by_id($id)
    {
        $product = Product::with('categories')->find($id);
        if ($product) {
            return response()->json([
                'message' => 'Success',
                'status' => 200,
                'data' => $product,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
                'data' => [],
            ], 404);
        }
    }

    // Produk berdasarkan nama kategori
    public function get_product_by_category_name($category)
    {
        $products = Product::with('categories')
            ->whereHas('categories', function ($q) use ($category) {
                $q->where('name', 'LIKE', "%$category%");
            })
            ->paginate(10);

        if ($products->count()) {
            return response()->json([
                'message' => 'Success',
                'status' => 200,
                'data' => $products,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data Not Found',
                'status' => 404,
                'data' => [],
            ], 404);
        }
    }
}
