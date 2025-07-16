<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword  = $request->get('keyword') ?? '';
        $category = $request->get('c') ?? '';

        $products = Product::with('categories')
                    ->when($category, function ($query) use ($category) {
                        $query->whereHas('categories', function ($q) use ($category) {
                            $q->where('name', 'LIKE', "%$category%");
                        });
                    })
                    ->where('title', 'LIKE', "%$keyword%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:200',
            'status' => 'required|in:PUBLISH,DRAFT',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $product = new Product;
        $product->title      = $request->get('title');
        $product->slug       = Str::slug($request->get('title'), '-');
        $product->konten     = $request->get('konten');
        $product->status     = $request->get('status');
        $product->harga      = $request->get('harga');
        $product->kuantitas  = $request->get('kuantitas');
        $product->create_by  = Auth::user()->id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $product->gambar = $filename;
        }

        $product->save();

        $product->categories()->attach($request->get('categories'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->title      = $request->get('title');
        $product->slug       = Str::slug($request->get('title'), '-');
        $product->konten     = $request->get('konten');
        $product->harga      = $request->get('harga');
        $product->kuantitas  = $request->get('kuantitas');
        $product->update_by  = Auth::user()->id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $product->gambar = $filename;
        }

        $product->categories()->sync($request->get('categories'));
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->forceDelete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName   = pathinfo($originName, PATHINFO_FILENAME);
            $extension  = $request->file('upload')->getClientOriginalExtension();
            $fileName   = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
