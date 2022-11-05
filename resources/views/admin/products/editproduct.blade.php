@extends('admin.master.master')
@section('title', 'Edit Product')
@section('content')
<!--main-->
<div class="col-10 main editproduct">
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('Edit Product') }}</div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ __($error) }}</div>
                    @endforeach
                @endif
                <div class="panel-body">
                    <div class="row">
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Code') }}</label>
                                    <input type="text" name="code" class="form-control" value="{{$product->code}}">
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('Category') }}</label>
                                        <select class="form-control" name="category_id" id="">
                                            @foreach ($parentCategories as $category)
                                                <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }} </br> </option>
                                                @if (count($category->subcategory))
                                                    @php $char = '|--' @endphp
                                                    @include ('admin.categories.subCategoryList', ['subcategories' => $category->subcategory, 'char' => $char])
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Price') }}</label>
                                        <input type="number" name="price" class="form-control" value="{{$product->price}}">
                                    </div>
                                    <div class="form-group mt-3 qty-input">
                                        <h4>{{ __('Quantity_input') }}</h4>
                                        @foreach ($product->size as $key => $item)
                                            <label>{{ __(strtoupper($item->size)) }}:</label>
                                            <input type="number" name="{{$item->size}}" value="{{$item->quantity}}" min="0">
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('is_Featured') }}</label>
                                        <select name="is_featured" class="form-control">
                                            <option @if($product->is_featured == config('app.is_featured')) selected @endif value="1">{{ __('Yes') }}</option>
                                            <option @if($product->is_featured != config('app.is_featured')) selected @endif value="0">{{ __('No') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Status') }}</label>
                                        <select name="status" class="form-control">
                                            <option @if ($product->status == config('app.status.true')) selected @endif value="1">{{ __('Stocking') }}</option>
                                            <option @if ($product->status == config('app.status.false')) selected @endif value="0">{{ __('Out of stock') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Image') }}</label>
                                        <input type="file" name="images[]" class="form-control" multiple>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Description') }}</label>
                                            <textarea id="editor" name="description"> {{ $product->description}} </textarea>
                                        </div>
                                        <button class="btn btn-success" name="edit-product" type="submit">{{ __('Edit Product') }}</button>
                                        <button class="btn btn-danger" type="reset">{{ __('Cancel') }}</button>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
@endsection