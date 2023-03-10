<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

    public function storeNewBrands(Request $request)
    {

        // $image = $request->file('brand_image');
        // create unique id with its own image extension(jpeg,png)
        // $image_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // resize image by calling image intervention
        // Image::make($image)->resize(300,300)->save('upload/brand/'.$image_generated);
        // $brand_image = 'upload/brand/'.$image_generated;

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        // brand_slug to lowercase and replace with -
        $brand->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
        // $brand->brand_image = $brand_image;
        $brand->brand_image = $request->brand_image;
        $brand->save();

        // session flash
        session()->flash('success', 'Brands added!');

        return back();
        // return redirect()->route('admin.brand.index');
    }

    
}
