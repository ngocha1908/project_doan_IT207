@extends('admin.master.master')
@section('title', 'Add Product')
@section('content')
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('Add Product')}}</div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ __($error) }}</div>
                    @endforeach
                @endif
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Code') }}</label>
                                <input type="text" name="code" class="form-control" value="{{old('code')}}">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ __('Category') }}</label>
                                    <select class="form-control" name="category_id" id="">
                                        @foreach ($parentCategories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }} </br> </option>
                                            @if (count($category->subcategory))
                                                @php $char = '|--' @endphp
                                                @include ('admin.categories.subCategoryList', ['subcategories' => $category->subcategory, 'char' => $char])
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Price') }}</label>
                                <input type="number" name="price" class="form-control" value="{{old('price')}}">
                            </div>
                            <div class="form-group mt-3 qty-input">
                                <h4>{{ __('Quantity_input') }}</h4>
                                <label>{{ __('S') }}:</label>
                                <input type="number" name="s" value="0" min="0">
                                <label>{{ __('M') }}:</label>
                                <input type="number" name="m" value="0" min="0">
                                <label>{{ __('L') }}:</label>
                                <input type="number" name="l" value="0" min="0">
                                <label>{{ __('XL') }}:</label>
                                <input type="number" name="xl" value="0" min="0">
                                <label>{{ __('XLL') }}:</label>
                                <input type="number" name="xxl" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>{{ __('is_Featured') }}</label>
                                <select name="is_featured" class="form-control">
                                    <option value="0">{{ __('No') }}</option>
                                    <option value="1">{{ __('Yes') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Status') }}</label>
                                <select name="status" class="form-control">
                                    <option value="1">{{ __('Stocking') }}</option>
                                    <option value="0">{{ __('Out of stock') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('Image') }}</label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('Description') }}</label>
                                <textarea id="editor" name="description" value="">{{old('description')}}</textarea>
                            </div>
                            <button class="btn btn-success" name="add-product" type="submit">{{ __('Add Product') }}</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-danger" type="reset">{{ __('Back') }}</a>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
