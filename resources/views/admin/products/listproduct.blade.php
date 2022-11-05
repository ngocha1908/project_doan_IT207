@extends('admin.master.master')
@section('title', 'List Products')
@section('content')
<!--main-->
<div class="main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body mt-3">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ __($message) }}</p>
                    </div>
                    @endif
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <a href="{{ route('admin.products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>{{ __('Add Product') }}</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('STT') }}</th>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Category')}}</th>
                                        <th width='18%'>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $products as $key => $product)
                                        <tr>
                                            <td>{{ ($products->currentpage() - 1) * $products->perpage() + $key + 1 }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"><img src="../uploads/{{$product->images->first()['name']}}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
                                                    <div class="col-md-9">
                                                        <p><strong>{{ __('Code') }}: {{ $product->code }}</strong></p>
                                                        <p>{{ __('Name') }}: {{ $product->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> {{ number_format($product->price) }} VND</td>
                                            <td>
                                                <div>
                                                    @foreach ($product->size as $key => $item)
                                                        <p class="mb-0">{{ __(strtoupper($item->size)) }}: {{ $item->quantity }}</p>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                @if ($product->status == 1)
                                                    <a class="btn btn-success" role="button">{{ __('Stocking') }}</a>
                                                @else
                                                    <a class="btn btn-danger" role="button">{{ __('Out of Stock') }}</a>
                                                @endif
                                            </td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" id="btn-delete" class="btn btn-danger mt-3"> <i class="fa fa-remove" aria-hidden="true"></i> {{__('Delete')}}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div align='right'>
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
    </div>
</div>
@endsection
