<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="row">
                <div class="col-5">
                    <div class="mt-3"></div>
                    <a class="navbar-brand" href="{{ route('admin.index') }}"><span>{{ __('Store Management') }}</a>
                </div>
                <div class="col-7" align="right"> 
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="{!! route('language', ['en']) !!}"> {{__('English')}}</a>
                            <a href="{!! route('language', ['vi']) !!}"> {{__('Vietnamese')}}</a>
                            <a href="#">
                                {{ Auth::user()->fullname }}
                            </a>
                            <div class="logout">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    <button href="#">
                                        {{ __('Logout') }}
                                    </button>
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
