@extends('store.master.master')
@section('title', 'Clothing Store - Order Detail')
@section('content')
<div class="colorlib-shop">
    <div class="row ml-5 mb-3">
        <div class="">
            <a href="{{ route('home') }}">
                <h5 class="font-primary"><< {{ __('Home') }} </h5>
            </a>
        </div>
    </div>
    <div class="row ml-5">
        <div class="col-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>{{ __('Order Detail') }} </h3>
                </div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="panel panel-blue">
                                            <div class="panel-heading dark-overlay">
                                                <h5>{{ __('Information customer') }} </h5>
                                            </div>
                                            <div class="panel-body">
                                                <strong><span class="fa fa-user" aria-hidden="true"></span> {{ __('Fullname') }} : {{ $order->user->fullname }}</strong> <br>
                                                <strong><span class="fa fa-phone" aria-hidden="true"></span> {{ __('Phone') }} : {{ $order->phone }}</strong>
                                                <br>
                                                <strong><span class="fa fa-home" aria-hidden="true"></span> {{ __('Address') }} : {{ $order->address }}</strong>
                                                <br>
                                                <strong><span class="fa fa-book" aria-hidden="true"></span> {{ __('Note') }} : {{ $order->note }}</strong>
                                                <br>
                                                <strong><span class="fa fa-clock" aria-hidden="true"></span> {{ __('time_order') }} : {{ $order->created_at }}</strong>
                                                <br>
                                                <strong><span class="fa fa-pencil" aria-hidden="true"></span> {{ __('time_update') }} : {{ $order->updated_at }}</strong>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="panel panel-blue">
                                            <div class="panel-body">
                                                <div>
                                                    <h5>{{ __('Status') }}: </h5>
                                                    <div class="btn btn-primary">
                                                        @switch ($order->status)
                                                            @case (config('app.orderStatus.pending'))
                                                                {{ __('Pending') }}
                                                                @break
                                                            @case (config('app.orderStatus.processing'))
                                                                {{ __('Processing') }}
                                                                @break
                                                            @case (config('app.orderStatus.delivering'))
                                                                {{ __('Delivering') }}
                                                                @break
                                                            @case (config('app.orderStatus.complete'))
                                                                {{ __('Complete') }}
                                                                @break
                                                            @case (config('app.orderStatus.cancel'))
                                                                {{ __('Cancel') }}
                                                                @break
                                                            @case (config('app.orderStatus.rejected'))
                                                                {{ __('Rejected') }}
                                                                @break
                                                        @endswitch
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="font-primary">{{ __('Total') }} : {{ number_format($order->total_price) }} VND</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered mt-5">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('STT') }}</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Size') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_products as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p><b>{{ __('Code') }}</b>: {{ $item->code }}</p>
                                                    <p><b>{{ __('Name') }}</b>: {{ $item->name }}</p>
                                                    <p><b>{{ __('Quantity') }}</b> : {{ $item->pivot->quantity }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ strtoupper($item->pivot->size) }}</td>
                                        <td>{{ number_format($item->price) }} VND</td>
                                        <td>{{ number_format($item->price * $item->pivot->quantity) }} VND</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row border-bottom">
</div>
@endsection
