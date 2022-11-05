@extends('store.master.master')
@section('title','Clothing Store - Category')
@section('content')
<!-- main -->
<div id="colorlib-featured-product">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('product.category', 'nam') }}" class="f-product-1">
                    <p class="btn btn-primary"> {{ __('For man')}}</p>
                </a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('product.category', 'nu') }}" class="f-product-2 fd-2">
                            <p class="btn btn-primary"> {{ __('For Woman')}}</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('product.category', 'ao-nu') }}" class="f-product-2 fd-3">
                            <p class="btn btn-primary"> {{ __('Women\'s Shirt')}}</p>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('product.category', 'quan-nam') }}" class="f-product-2 fd-4">
                            <p class="btn btn-primary"> {{ __('Man\'s Trousers')}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('Category')}} : {{$category->name}}</span></h2>
                <p> {{ __('featured_prd_description') }}</p>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-3 text-center">
                    <div class="product-entry">
                        <div class="product-img" style="background-image: url(../../uploads/{{$item->images->first()['name']}});">
                            <div class="cart">
                                <p>
                                    <span><a href="{{ route('product.detail', $item->slug) }}"><i class="icon-eye"></i></a></span>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3>{{ $item['name'] }}</h3>
                            <p class="price"><span>{{ number_format($item['price']) }} VND</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
