@extends('admin.master.master')
@section('title','Orders')
@section('content')
<!--main-->
<div class="col-11 main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading mt-3">
                        <h2>{{ __('Orders List') }}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>{{ __('STT') }}</th>
                                            <th>{{ __('Fullname') }}</th>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __('Address') }}</th>
                                            <th>{{ __('Total') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                        <tr>
                                            <td>{{ ($orders->currentpage() - 1) * $orders->perpage() + $key + 1 }}</td>
                                            <td>{{ __($order->user->fullname) }}</td>
                                            <td>{{ __($order->phone) }}</td>
                                            <td>{{ __($order->address) }}</td>
                                            <td>{{ __(number_format($order->total_price)) }} VND</td>
                                            @if ( $order->status == config('app.orderStatus.pending'))
                                                <td><p class="btn btn-secondary"></i>{{ __('Pending') }}</p></td>
                                            @elseif ( $order->status == config('app.orderStatus.processing'))
                                                <td><p class="btn btn-info"></i>{{ __('Processing') }}</p></td>
                                            @elseif ( $order->status == config('app.orderStatus.delivering'))
                                                <td><p class="btn btn-primary"></i>{{ __('Delivering') }}</p></td>
                                            @elseif ( $order->status == config('app.orderStatus.complete'))
                                                <td><p class="btn btn-success"></i>{{ __('Complete') }}</p></td>
                                            @elseif ( $order->status == config('app.orderStatus.cancel'))
                                                <td><p class="btn btn-warning"></i>{{ __('Cancel') }}</p></td>
                                            @else
                                                <td><p class="btn btn-danger"></i>{{ __('Rejected') }}</p></td>
                                            @endif
                                            <td>
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i> {{ __('Detail') }}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div align='right'>
                            {{ $orders->links('pagination::bootstrap-4') }}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
