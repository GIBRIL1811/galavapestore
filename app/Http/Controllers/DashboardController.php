<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'draft'     => Product::where('status', 'DRAFT')->count(),
            'publish'   => Product::where('status', 'PUBLISH')->count()
        ];
        return view('dashboards.index', ['data' => $data]);
    }
}
