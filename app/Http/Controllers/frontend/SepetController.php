<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;
use Cart;
class SepetController extends Controller
{
    public function index(){

        return view('frontend.cart');
    }

    public function ekle($pid){


        $product=product::find($pid);
        Cart::add($product->id, $product->name,1, $product->price);

        session()->flash('success','Urun sepete eklendi');
        return redirect(route('sepet'));

    }

    public function sepet_bosalt(){

        Cart::destroy();
        session()->flash('success','Sepetinizdeki urunler silindi.');
        return redirect(route('sepet'));
    }

    public function urun_sil($rowId){

        Cart::remove($rowId);
        session()->flash('success','Secilen urun silindi.');
        return redirect(route('sepet'));
    }

    public function sepet_guncelle(Request $request){

        Cart::update($request->rowId, $request->quantity);
        session()->flash('success','Secilen urun adedi guncellendi..');
        return redirect(route('sepet'));
    }
}
