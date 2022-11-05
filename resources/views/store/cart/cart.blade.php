@extends('store.master.master')
@section('title','Clothing Store - Cart ')
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
                    <div class="process text-center">
                        <p><span>02</span></p>
                        <h3>{{ __('Payment') }}</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>{{ __('Complete') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        @if (Cart::count() <= config('app.zero')) 
            <div class="row row-pb-md">
                <div class="col-md-12 col-md-offset-1">
                    <div class="alert alert-primary">
                        <span>{{ __('cart_check') }}</span>
                    </div>
                </div>
            </div>
        @else
            @if ($message = Session::get('messages'))
                <div class="alert alert-warning">
                    <p>{{ __($message) }}</p>
                </div>
            @endif
            <div class="row row-pb-md">
                <div class="col-md-12 col-md-offset-1">
                    <div class="product-name">
                        <div class="one-forth text-center">
                            <span>{{ __('Product') }}</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>{{ __('Size') }}</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>{{ __('Price') }}</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>{{ __('Quantity') }}</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>{{ __('Total') }}</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>{{ __('Delete') }}</span>
                        </div>
                    </div>
                    @foreach ($cart as $item)
                        <div class="product-cart">
                            <div class="one-forth">
                                <div class="product-img">
                                    <img class="img-thumbnail cart-img" src="../uploads/{{$item->options->image}}">
                                </div>
                                <div class="detail-buy">
                                    <h4>{{ __('Code') }}: {{ $item->options->code }}</h4>
                                    <h5>{{$item->name}}</h5>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="size">{{ strtoupper($item->options->size) }}</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">{{ number_format($item->price) }}</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <input onchange="updateCart('{{$item->rowId}}', this.value);" type="number" id="quantity-update" name="quantity" min="1" max="100" class="form-control input-number text-center" value="{{$item->qty}}">
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span id="total-price-item" class="price">{{ number_format($item->price*$item->qty) }}</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <!-- Button trigger modal -->
                                    <a type="button" class="closed" data-toggle="modal" data-target="#exampleModal"> </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" style="margin-top: 10%;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ __('are_you_sure') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                                    <a href="/cart/delete/{{$item->rowId}}" class="btn btn-primary"> {{ __('Save changes') }} </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-7">
                            </div>
                            <div class="col-5 col-md-push-1 text-center">
                                <div class="total">
                                    <div class="grand-total">
                                        <p><strong>{{ __('Total') }}:</strong><span>{{ $priceTotal }} VND</span></p>
                                        <a href="{{ route('cart.checkout')}}" class="btn btn-primary">{{ __('Payment') }} <i class="icon-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<script src="{{ asset('js/cart.js')}}"></script>
@endsection
