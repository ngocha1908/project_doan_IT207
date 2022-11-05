@extends('admin.master.master')
@section('title', 'Users Management')
@section('content')
<!--main-->
<div class="main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('List Users') }}</h1>
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
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('STT') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Fullname') }}</th>
                                        <th>{{ __('Phone') }} </th>
                                        <th>{{ __('Role') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th width='18%'>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{ ($users->currentpage() - 1) * $users->perpage() + $key + 1 }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if ($user->role_id == config('auth.roles.admin'))
                                            <p class="btn btn-success">{{ __('Admin') }}</p>
                                            @else
                                            <p class="btn btn-primary">{{ __('User') }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->status == config('auth.status.active'))
                                            <p class="btn btn-success">{{ __('Active') }}</p>
                                            @else
                                            <p class="btn btn-warning">{{ __('Block') }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>{{ __('Edit') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div align='right'>
                                {{ $users->links('pagination::bootstrap-4') }}
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
