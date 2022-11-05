@extends('store.master.master')
@section('title','Clothing Store - Checkout')
@section('content')
<!-- main -->
<div class="colorlib-shop">
	<div class="container">
		<div class="row row-pb-md">
			<div class="col-md-12 col-md-offset-1">
				<div class="process-wrap">
					<div class="process text-center active">
						<p><span>01</span></p>
						<h3>{{ __('Cart')}}</h3>
					</div>
					<div class="process text-center active">
						<p><span>02</span></p>
						<h3>{{ __('Payment')}}</h3>
					</div>
					<div class="process text-center">
						<p><span>03</span></p>
						<h3>{{ __('Complete')}}</h3>
					</div>
				</div>
			</div>
		</div>
		@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger">{{ __($error) }}</div>
			@endforeach
		@endif
		<div class="row">
			<div class="col-md-7">
				<form method="POST" class="colorlib-form" action="{{ route('cart.payment') }}">
					<h2>Chi tiết thanh toán</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="fname">{{ __('Fullname')}}: {{ Auth::user()->fullname }}</label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 mb-3">
								<label for="email">{{ __('Email')}}: </label><span>{{ Auth::user()->email }}</span>
							</div>
							<div class="col-md-6">
								<label for="Phone">{{ __('Phone')}}:</label>
								<input name="phone" type="text" id="zippostalcode" class="form-control" placeholder="....." value="{{ old('phone') }}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="fname">{{ __('Address')}}</label>
								<input name="address" type="text" id="address" class="form-control" placeholder="....." value="{{ old('address') }}">
							</div>
							<div class="form-group">
								<label for="fname">{{ __('Note')}}</label>
								<input name="note" type="text" id="note" class="form-control" placeholder="....." value="{{ old('note') }}">
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-5">
				<div class="cart-detail">
					<h2>{{ __('Total')}}</h2>
					<ul>
						<li>
							<ul>
								@foreach($cart as $item)
								<li><span>{{$item->qty}} x {{$item->name}}</span> <span>₫ {{$item->qty}}*{{number_format($item->price)}}</span></li>
								@endforeach
							</ul>
						</li>
						<li><span>{{ __('Total')}} {{ __('Orders')}}</span> <span>₫ {{$priceTotal}}</span></li>
					</ul>				
					<p align="right"><button type="submit" class="btn btn-primary">{{ __('Payment')}}</button></p>
				</div>
				@csrf
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end main -->
@endsection
