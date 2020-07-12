<?php

namespace App\Http\Controllers\frontend;

use App\category;
use App\Http\Controllers\Controller;
use App\product;
use App\sub_category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($slug){
        $category=category::where('slug',$slug)->firstOrFail();
        $sub_categories=sub_category::where('category_id',$category->id)->get();
        $sub_categories_id=sub_category::where('category_id',$category->id)->pluck('id');
        $products=product::where('sub_category_id',$sub_categories_id)->get();

        return view('frontend.category',compact('sub_categories', 'products', 'category'));
    }
}
