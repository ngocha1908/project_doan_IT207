@extends('admin.master.master')
@section('title','Order Detail')
@section('content')
<div class="col-11 col-lg-offset-2 main">
    <div class="row ml-5">
        <div class="col-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('Order Detail') }}</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="form-group">
                                <div class="row">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ __($message) }}</p>
                                        </div>
                                    @endif
                                    <div class="col-6">
                                        <div class="panel panel-blue">
                                            <div class="panel-heading dark-overlay">{{ __('Information customer') }}</div>
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
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="mt-5" align="right">
                                                <h4>{{ __('Edit Status') }}</h4>
                                                <div class="mt-3">
                                                    <select class="size-select" name="status">
                                                        <option @if ( $order->status == config('app.orderStatus.pending')) selected @endif value="1">{{ __('Pending') }}</option>
                                                        <option @if ( $order->status == config('app.orderStatus.processing')) selected @endif value="2">{{ __('Processing') }}</option>
                                                        <option @if ( $order->status == config('app.orderStatus.delivering')) selected @endif value="3">{{ __('Delivering') }}</option>
                                                        <option @if ( $order->status == config('app.orderStatus.complete')) selected @endif value="4">{{ __('Complete') }}</option>
                                                        <option @if ( $order->status == config('app.orderStatus.cancel')) selected @endif value="5">{{ __('Cancel') }}</option>
                                                        <option @if ( $order->status == config('app.orderStatus.rejected')) selected @endif value="6">{{ __('Rejected') }}</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-warning mt-3" type="submit"> {{ __('Submit') }}</button>
                                            </div>
                                        </form>
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
                                                        <p><b>{{ __('Code') }}</b>: {{ $products[$key]->code }}</p>
                                                        <p><b>{{ __('Name') }}</b>: {{ $products[$key]->name }}</p>
                                                        <p><b>{{ __('Quantity') }}</b> : {{ $item->quantity }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ strtoupper($item->size) }}</td>
                                            <td>{{ number_format($products[$key]->price) }} VND</td>
                                            <td>{{ number_format($products[$key]->price * $item->quantity) }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width='70%'>
                                            <h4 align='right'>{{ __('Total') }} : {{ number_format($order->total_price) }} VND</h4>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="alert alert-primary" role="alert" align='right'>
                                @if ( $order->status == config('app.orderStatus.pending'))
                                    <p class="btn btn-secondary"></i>{{ __('Pending') }}</p>
                                @elseif ( $order->status == config('app.orderStatus.processing'))
                                    <p class="btn btn-info"></i>{{ __('Processing') }}</p>
                                @elseif ( $order->status == config('app.orderStatus.delivering'))
                                    <p class="btn btn-primary"></i>{{ __('Delivering') }}</p>
                                @elseif ( $order->status == config('app.orderStatus.complete'))
                                    <p class="btn btn-success"></i>{{ __('Complete') }}</p>
                                @elseif ( $order->status == config('app.orderStatus.cancel'))
                                    <p class="btn btn-warning"></i>{{ __('Cancel') }}</p>
                                @else
                                    <p class="btn btn-danger"></i>{{ __('Rejected') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
