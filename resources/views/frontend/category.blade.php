@section('title','Kategoriler')
@extends('frontend.master')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Anasayfa</a></li>
            <li><a href="#">{{$category->name}}</a></li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategori Adı</div>
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">
                        @forelse($sub_categories as $sub_category)
                            <a href="{{--route('kategori',$sub_category->slug)--}}" class="list-group-item"><i class="fa fa-circle"></i> {{$sub_category->name}}</a>
                         @empty
                              <p>{{'Kategori Bulunamadi'}}</p>
                         @endforelse
                        </div>
                        <h3>Fiyat Aralığı</h3>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 100-200
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 200-300
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    Sırala
                    <a href="#" class="btn btn-default">Çok Satanlar</a>
                    <a href="#" class="btn btn-default">Yeni Ürünler</a>
                    <hr>
                    <div class="row">
                        @forelse($products as $product)
                        <div class="col-md-3 product">
                            <a href="{{route('urun-detay',$product->slug)}}"><img src="http://lorempixel.com/400/400/food/1"></a>
                            <p><a href="{{route('urun-detay',$product->slug)}}">{{$product->name}}</a></p>
                            <p class="price">{{$product->price}}</p>
                            <p><a href="{{route('ekle',$product->id)}}" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        @empty
                        <p> Urun bulunamadi.</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
