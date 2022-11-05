@extends('admin.master.master')
@section('title', 'Edit User')
@section('content')
<!--main-->
<div class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> {{ __('Edit User')}} </div>
                <div class="panel-body">
                    <div class="row justify-content-center" style="margin-bottom:40px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">{{ __('Fullname') }}: {{ $user->fullname}}</label>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}: {{ $user->email}}</label>
                                </div>
                                <div class="form-group">
                                    @if ($user->role_id == config('auth.roles.admin'))
                                    <label>{{ __('Role') }}: {{ __('Admin')}} </label>
                                    @else
                                    <label>{{ __('Role') }}: {{ __('User')}} </label>
                                    @endif
                                </div>
                            </div>
                            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Status') }}</label>
                                            <select name="status" class="form-control">
                                                <option @if($user->status == config('auth.status.active')) selected @endif value="1">{{ __('Active') }}</option>
                                                <option @if($user->status == config('auth.roles.block')) selected @endif value="2">{{ __('Block') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-5">{{ __('Update') }}</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-danger mt-5" type="reset">{{ __('Back') }}</a>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
