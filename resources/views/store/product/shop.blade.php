@extends('store.master.master')
@section('title','Clothing Store - Sản phẩm ')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row row-pb-lg">
                    @foreach($products as $product)
                    <div class="col-md-4 text-center">
                        <div class="product-entry">
                            <div class="product-img" style="background-image: url(../../uploads/{{$product->images->first()['name']}});">
                                <div class="cart">
                                    <p>
                                        <span><a href="{{ route('product.detail', $product->slug) }}"><i class="icon-eye"></i></a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3>{{$product['name']}}</h3>
                                <p class="price"><span>{{ number_format($product->price) }} VND</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$products->links("pagination::bootstrap-4")}}
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="side">
                        <h5>{{ __('Category')}}</h5>
                        <form method="get" class="colorlib-form-2" action="{{ route('product.search') }}">
                            <select class="form-control" name="category" id="">
                                @foreach ($parentCategories as $category)
                                    <option value="{{$category->id}}">{{ $category->name }} </br> </option>
                                    @if (count($category->subcategory))
                                        @php $char = '|--' @endphp
                                        @include ('admin.categories.subCategoryList', ['subcategories' => $category->subcategory, 'char' => $char])
                                    @endif
                                @endforeach
                            </select>
                           
                            <h5 class="mt-5">{{ __('Price Range')}}</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">{{ __('From')}}:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="start" id="people" class="form-control">
                                                <option value="100000">100.000 VNĐ</option>
                                                <option value="150000">150.000 VNĐ</option>
                                                <option value="200000">200.000 VNĐ</option>
                                                <option value="250000">250.000 VNĐ</option>
                                                <option value="300000">300.000 VNĐ</option>
                                                <option value="400000">400.000 VNĐ</option>
                                                <option value="500000">500.000 VNĐ</option>
                                                <option value="1000000">1.000.000 VNĐ</option>
                                                <option value="2000000">2.000.000 VNĐ</option>
                                                <option value="5000000">5.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">{{ __('To')}}:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="end" id="people" class="form-control">
                                                <option value="200000">200.000 VNĐ</option>
                                                <option value="300000">300.000 VNĐ</option>
                                                <option value="400000">400.000 VNĐ</option>
                                                <option value="500000">500.000 VNĐ</option>
                                                <option value="1000000">1.000.000 VNĐ</option>
                                                <option value="2000000">2.000.000 VNĐ</option>
                                                <option value="5000000">5.000.000 VNĐ</option>
                                                <option value="10000000">10.000.000 VNĐ</option>
                                                <option value="20000000">20.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Search')}}</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@endsection
