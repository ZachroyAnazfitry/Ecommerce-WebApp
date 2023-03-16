<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

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

        $image = $request->file('brand_image');
        // create unique id with its own image extension(jpeg,png)
        $image_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // resize image by calling image intervention package
        Image::make($image)->resize(300,300)->save('upload/brand/'.$image_generated);
        $brand_image = 'upload/brand/'.$image_generated;

        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        // brand_slug to lowercase and replace empty space with hyphen(-)
        $brands->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
        $brands->brand_image = $brand_image;
        $brands->brand_image = $request->brand_image;
        $brands->save();

        // session flash
        session()->flash('success', 'Brands added!');

        return back();
        // return redirect()->route('admin.brand.index');
    }

    public function editNewBrands($id)
    {
        $brands = Brand::findOrFail($id);

        return view('admin.edit-brand', compact('brands'));
    }

    public function updateNewBrands(Request $request)
    {
        $brand_id = $request->id;

        Brand::findOrFail($brand_id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $request->brand_image,
        ]);

        session()->flash('success', 'Brands updated!');
        return redirect('/brands');
    }

    public function deleteNewBrands($id)
    {
    //    delete brand function
        $brands = Brand::findOrFail($id);
        $brands->delete();
        // session flash
        session()->flash('success', 'Brands deleted!');

        // use sweetalert popup box
        // Alert::success('Brands deleted!');
        // Alert::alert('Title', 'Message');

        return back();

    }

    
}
