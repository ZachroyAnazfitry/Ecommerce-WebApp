<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function manage()
    {

        $products = Products::latest()->get();
        return view('admin.products.manage-products', compact('products'));
    }

    public function newProducts()
    {

        $products = Products::latest()->get();
        return view('admin.products.new-products', compact('products'));
    }
}
