<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function brands()
    {
        // call all data
        // $brands = Brand::all();
        $brands = Brand::latest()->get();

        return view('admin.brand', compact('brands'));
    }
}
