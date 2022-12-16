@extends('store.master.master')
@section('title','Clothing Store - Cart ')
@section('content')
<!-- main -->
<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
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
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
						@foreach ($cart as $item)
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">{{ __('Product') }}</th>
									<th class="column-2"></th>
									<th class="column-3" style="padding-left: 20px;">{{ __('Size') }}</th>
									<th class="column-4" style="padding-right: 30px;">{{ __('Price') }}</th>
									<th class="column-5" style="padding-right: 90px;">{{ __('Quantity') }}</th>
									<th class="column-6" style="padding-right: 50px;">{{ __('Total') }}</th>
								</tr>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img class="img-thumbnail cart-img" src="../uploads/{{$item->options->image}}">
										</div>
									</td>
									<td class="column-2">{{$item->name}}</td>
									<td class="column-3" style="padding-left: 25px;">{{ strtoupper($item->options->size) }}</td>
									<td class="column-4" style="padding-right: 20px;">{{ number_format($item->price) }}</td>
									<td class="column-5" style="padding-right: 90px;">
											<!-- <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div> -->

											<!-- <input onchange="updateCart('{{$item->rowId}}', this.value);" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$item->qty}}"> -->
											<input onchange="updateCart('{{$item->rowId}}', this.value);" type="number" id="quantity-update" name="quantity" min="1" max="100" class="form-control input-number text-center" value="{{$item->qty}}" style="width: 70px; margin-left: 30px;">


											<!-- <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div> -->
									</td>
									<td class="column-6" style="padding-right: 50px;">{{ number_format($item->price*$item->qty) }}</td>
								</tr>
							</table>
							@endforeach
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							<a href="/cart/delete/{{$item->rowId}}" style="color:black;"> {{ __('Save changes') }} </a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
								{{ __('Total') }}:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
								{{ $priceTotal }} VND
								</span>
							</div>
						</div>

						<a href="{{ route('cart.checkout')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">{{ __('Payment') }} <i class="icon-arrow-right-circle"></i></a>

						<!-- <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button> -->
					</div>
				</div>
			</div>
				@endif
			</div>
		</div>
	</form>
		
	<!-- ----------- -->
<!-- <div class="colorlib-shop">
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
                                   
                                    <a type="button" class="closed" data-toggle="modal" data-target="#exampleModal"> </a>
                                    
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
</div> -->
<script src="{{ asset('js/cart.js')}}"></script>
@endsection
