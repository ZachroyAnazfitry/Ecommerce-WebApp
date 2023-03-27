<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use App\Models\User;
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
        // call Brand data
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();

        // get active vendor information
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();

        $products = Products::latest()->get();
        return view('admin.products.new-products', compact('products','brands','categories','activeVendor'));
    }
}
