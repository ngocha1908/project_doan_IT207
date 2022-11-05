@extends('admin.master.master')
@section('title', 'Categories Management')
@section('content')
<!--main-->
<div class="main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('List Category') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ __($message) }}</p>
                        </div>
                    @endif
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> {{ __('Add')}}</a>
                    <div class="bootstrap-table mt-5">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('STT') }}</th>
                                        <th>{{ __('cat_name') }}</th>
                                        <th>{{ __('Slug') }}</th>
                                        <th>{{ __('Parent') }}</th>
                                        <th width='18%'>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ ($categories->currentpage() - 1) * $categories->perpage() + $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        @if ($category->parent <= 0)
                                            <td>---</td>
                                        @else
                                            <td>{{ $categories[$category->parent - 1]['name'] }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="btn-delete" class="btn btn-danger mt-2"> <i class="fa fa-remove" aria-hidden="true"></i> {{__('Delete')}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div align='right'>
                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end main-->
@endsection
