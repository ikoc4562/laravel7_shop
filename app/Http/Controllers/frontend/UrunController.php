<?php

namespace App\Http\Controllers\frontend;

use App\category;
use App\Http\Controllers\Controller;
use App\product;
use App\sub_category;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    public function index($slug){
        $product=product::whereSlug($slug)->firstOrFail();
        $sc=sub_category::where('id',$product->sub_category_id)->firstOrFail();
        $category=category::where('id',$sc->category_id)->get();
        return view('frontend.product', compact('product','category'));
    }
}
