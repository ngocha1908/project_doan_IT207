@extends('admin.master.master')
@section('title','Category')
@section('content')
<!-- main     -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('Category Management') }}</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ __($error) }}</div>
                            @endforeach
                        @endif
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">{{ __('Parent') }}:</label>
                                    <select class="form-control" name="parent" >
                                        <option value="0"> --- </br></option>
                                        @foreach ($parentCategories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }} </br> </option>
                                            @if (count($category->subcategory))
                                                @php $char = '|--' @endphp
                                                @include ('admin.categories.subCategoryList', ['subcategories' => $category->subcategory, 'char' => $char])
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('cat_name') }}:</label>
                                    <input type="text" class="form-control" name="name" placeholder="{{ __('cat_name') }}">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-plus"></i> {{ __('Add') }} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>
<!--/.main-->
@endsection
