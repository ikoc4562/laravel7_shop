@section('title','Sepet')
@extends('frontend.master')
@section('head')
    <link rel="stylesheet" href="/css/toastr.min.css">
    <style>

        .qty {
            width: 40px;
            height: 25px;
            text-align: center;
        }
        input.qtyplus { width:25px; height:25px;}
        input.qtyminus { width:25px; height:25px;}
    </style>

@endsection
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                    <th>İşlem</th>
                </tr>
@forelse(Cart::content() as $cart)
                <tr>
                    <td> <img src="http://lorempixel.com/120/100/food/2"> {{$cart->name}}</td>
                    <td>{{$cart->price}}</td>
                    <td>
                        <form id='myform' method='POST' action='{{route('sepet-guncelle',$cart->rowId)}}' class="form-group">
                            @csrf
                            <select name="quantity">
                                @for($i=1;$i<10;$i++)
                            <option value="{{$i}}" {{$cart->qty==$i?'selected':''}}>{{$i}}</option>
                                @endfor
                            </select>
                            <input type='hidden' name='rowId' value='{{$cart->rowId}}'/>
                            <button type="submit" class="btn btn-danger"><i class="far fa-check-circle"></i></button>

                        </form>
                    </td>
                    <td>{{$cart->subtotal()}}</td>
                    <td>
                        <a href="{{route('urun-sil',$cart->rowId)}}">Sil</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">Henüz sepette ürün yok</td>
                    </tr>
                @endforelse
                @if(Cart::count())

                <tr>
                    <th></th>
                    <th></th>
                    <th>Toplam Tutar (KDV Dahil)</th>
                    <th>{{Cart::total()}}</th>
                    <th></th>
                </tr>
                @endif
            </table>
            <div>
                @if(Cart::count())
                <a href="{{route('sepet-bosalt')}}" class="btn btn-info pull-left">Sepeti Boşalt</a>
                @if(Auth::id()!=null)
                <a href="{{route('odeme')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                @endif
                @endif
            </div>
        </div>
    </div>

@endsection
@section('footer')

<script src="/js/toastr.min.js"></script>
<script>
    @if(session()->has('success'))
        toastr.success("{{session('success')}}");
    @endif
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

<script>
    jQuery(document).ready(function(){
        // This button will increment the value

        $('.qtyplus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined

            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
    });

</script>

@endsection
