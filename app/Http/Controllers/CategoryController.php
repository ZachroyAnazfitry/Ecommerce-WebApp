<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    //

    public function showCategory()
    {

        $categories = Category::all();
        return view('admin.category.category',compact('categories'));
    }

    public function addCategory()
    {
        $categories = Category::all();
        return view('admin.category.add-category',compact('categories')); 
    }

    public function storeCategory(Request $request)
    {
        $image = $request->file('category_image');
        // create unique id with its own image extension(jpeg,png)
        $image_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // resize image by calling image intervention package
        Image::make($image)->resize(300,300)->save('upload/category/'.$image_generated);
        $category_image_url = 'upload/category/'.$image_generated;

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $category_image_url,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // session flash
        session()->flash('success', 'Brands added!');

        return redirect('category');
    }
}
