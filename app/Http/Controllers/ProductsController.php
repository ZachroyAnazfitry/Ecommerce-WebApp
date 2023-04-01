<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductsImages;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function storeProducts(Request $request)
    {

        $products_picture = $request->file('picture');
        // create unique id with its own products_picture extension(jpeg,png)
        $products_picture_generated = hexdec(uniqid()).'.'.$products_picture->getClientOriginalExtension();
        // resize products_picture by calling products_picture intervention package
        Image::make($products_picture)->resize(600,800)->save('upload/products/picture'.$products_picture_generated);
        $picture = 'upload/products/picture'.$products_picture_generated; 

        
        

        // insert data into 2 different tables
        // first table - Products
        $products = Products::insertGetID([
            'brands_id' =>$request->brands_id,
            'category_id' =>$request->category_id,
            'sub_category_id' =>$request->sub_category_id,
            'vendor_id' =>$request->vendor_id,
            'products_name' =>$request->products_name,
            'products_slug' =>strtolower(str_replace(' ','-', $request->products_name)) ,
            'code' =>$request->code,
            'quantity' =>$request->quantity,
            'tags' =>$request->tags,
            'size' =>$request->size,
            'color' =>$request->color,
            'description' =>$request->description,
            'specification' =>$request->specification,
            'price' =>$request->price,
            'discount_price' =>$request->discount_price,
            'picture' => $picture,
            // 'thumbnails' => $thumbnails,
            'hot_deals' =>$request->hot_deals,
            'special_offer' =>$request->special_offer,
            'status' => 1,
            // load time
            'created_at' => Carbon::now(),
        ]);

        // second table - store thumbnails(multiple images)
        $product = $products->first();
        $product_id = $product->id;

        $thumbnails = $request->file('thumbnails');
        foreach ($thumbnails as $thumbnail) {
            // create unique id with its own image extension(jpeg,png)
            $thumbnail_generated = hexdec(uniqid()).'.'.$thumbnail->getClientOriginalExtension();
            // resize thumbnail by calling image intervention package
            Image::make($thumbnail)->resize(900,900)->save('upload/products/thumbnails'.$thumbnail_generated);
            $upload_thumbnails = 'upload/products/thumbnails'.$thumbnail_generated; 

            // insert data
            ProductsImages::insert([
                // save product_id variable above
                'products_id' => $product_id,
                'products_photo' => $upload_thumbnails,
                'created_at' => Carbon::now(),
            ]);
        }

        // session
        session()->flash('success', 'Products details added!');

        return redirect()->route('products.manage');

    }
}
