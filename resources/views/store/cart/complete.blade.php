@extends('store.master.master')
@section('title','Clothing Store - Complete ')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-12 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>{{ __('Cart') }}</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>02</span></p>
                        <h3>{{ __('Payment') }}</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>03</span></p>
                        <h3>{{ __('Complete') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <span class="icon"><i class="icon-shopping-cart"></i></span>
            <h2>{{ __('order_success') }}</h2>
            <p>
                <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Home') }}</a>
                <a href="{{ route('product.shop') }}" class="btn btn-primary btn-outline">{{ __('Shopping') }}</a>
            </p>
        </div>
    </div>
    <div class="row mt-50 ml-5">
        <div class="col-md-6">
            <h3 class="billing-title mt-20 pl-15">{{ __('Information Order') }}</h3>
            <table class="order-rable">
                <tbody>
                    <tr>
                        <td>{{ __('Time') }}</td>
                        <td>: {{ $order->created_at }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Total') }}</td>
                        <td>: ₫ {{ number_format($order->total_price) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3 class="billing-title mt-20 pl-15 mr-5">{{ __('Address') }}</h3>
            <table class="order-rable">
                <tbody>
                    <tr>
                        <td>{{ __('Fullname') }}</td>
                        <td>: {{ $order->user->fullname }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Phone') }}</td>
                        <td>: {{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Address') }}</td>
                        <td>: {{ $order->address }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="billing-form">
        <div class="row">
            <div class="col-12">
                <div class="order-wrapper mt-50">
                    <h3 class="billing-title mb-10">{{ __('Bill') }}</h3>
                    <div class="order-list">
                        <div class="list-row d-flex justify-content-between">
                            <div class="col-md-6">{{ __('Product') }}</div>
                            <div class="col-md-1">{{ __('Quantity') }}</div>
                            <div class="col-md-2">{{ __('Price') }}</div>
                            <div class="col-md-3" align='right'>{{ __('Total') }}</div>
                        </div>
                        @foreach ($order_products as $key => $item)
                            <div class="list-row d-flex justify-content-between">
                                <div class="col-md-6">
                                    {{ __('Product') }} {{ $key + 1 }} : {{$products[$key]->name}},
                                    {{ __('Size') }}: {{ strtoupper($item->size) }}
                                </div>
                                <div class="col-md-1">x {{ $item->quantity}}</div>
                                <div class="col-md-2">₫ {{ number_format($products[$key]->price) }}</div>
                                <div class="col-md-3" align='right'>₫ {{ number_format($item->quantity * $products[$key]->price) }}</div>
                            </div>
                        @endforeach
                        <div class="list-row border-bottom-0 d-flex justify-content-between">
                            <div class="col-md-4">
                                <h6>{{ __('Total') }}</h6>
                            </div>
                            <div class="col-md-4 offset-md-4" align='right'>₫ {{ number_format($order->total_price) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
