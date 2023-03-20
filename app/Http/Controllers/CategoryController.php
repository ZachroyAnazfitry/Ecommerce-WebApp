<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function showCategory()
    {

        $category = Category::all();
        return view('admin.category.category',compact('category'));
    }

    public function addCategory()
    {
        $category = Category::all();
        return view('admin.category.add-category',compact('category'));    }
}
