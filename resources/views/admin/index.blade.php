@extends('admin.master.master')
@section('title', 'Adminitrator')
@section('content')
<!--main-->
<div class="col-12 main">
	<h1 class="mt-5 mb-5">{{ __('Dashboard') }}</h1>
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget">
				<div class="row no-padding">
					<div class="col-3 widget-left">
						<i class="fa-solid fa-shirt"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $data['product'] }}</div>
						<div class="text-muted">{{ __('Products') }}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-3 widget-left">
						<i class="fa-solid fa-cart-shopping"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $data['order'] }}</div>
						<div class="text-muted">{{ __('Orders') }}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-3 widget-left">
						<i class="fa-solid fa-users"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $data['user'] }}</div>
						<div class="text-muted">{{ __('Users') }}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-3 widget-left">
						<i class="fa-solid fa-align-justify"></i>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{ $data['category'] }}</div>
						<div class="text-muted">{{ __('Categories') }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
	<!-- Chart  -->
	<h1 class="mt-5 mb-5">{{ __('Revenue statistics chart in :year', ['year' => $year]) }}</h1>

	<canvas id="barChart" chart-data="{{ $chartData }}"></canvas>
</div>
<!--end main-->
@endsection
