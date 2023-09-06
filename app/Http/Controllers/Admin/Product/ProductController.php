<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add()
    {
        return view('admin.product.add');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
