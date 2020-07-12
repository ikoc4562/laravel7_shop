<?php

namespace App\Http\Controllers\frontend;

use App\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index(){
        $categories=category::all();
        return view('frontend.index',compact('categories'));

    }
}
