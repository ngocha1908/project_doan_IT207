<div class="colorlib-loader"></div>
<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <div id="colorlib-logo"><a href="{{ route('home') }}"><img src="{{ asset('store/images/logo.png') }}" alt=""></a></div>
                    </div>
                    <div class="col-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            <li><a href="{{ route('product.shop') }}">{{ __('Search') }}</a></li>
                            <li><a href="about.html">{{ __('About') }}</a></li>
                            <li><a href="contact.html">{{ __('Contact') }}</a></li>
                            <li class="has-dropdown">
                                <a href=""><i class="fa fa-globe" aria-hidden="true"></i> {{ __('Language') }}</a>
                                <ul class="dropdown">
                                    <li><a href="{!! route('language', ['en']) !!}"> {{__('English') }}</a></li>
                                    <li><a href="{!! route('language', ['vi']) !!}"> {{__('Vietnamese') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('cart.showCart')}}"><i class="icon-shopping-cart"></i> {{ __('Cart')}} [{{Cart::count()}}]</a></li>
                            @if (Route::has('login'))
                            @auth
                                <li class="has-dropdown">
                                    <li class="nav-link text-primary notification-num" href="#" id="notification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                        @if (auth()->user()->unreadNotifications->count() > 0)
                                            <span class="pending badge btn-primary badge-number">{{ auth()->user()->unreadNotifications->count() }}</span>
                                        @endif
                                    </li>
                                    <ul class="dropdown-menu">
                                        <li class="font-primary">
                                            <div class="row">
                                                    <a href="" class="font-primary read-all" id="readall"><p> {{ trans('mark_all_as_read') }} </p></a>                                            
                                            </div>
                                        </li>
                                        <ul class="notification-box show-notification">
                                            @foreach (Auth::user()->notifications as $notification)
                                                <a href="{{ route('orderdetail', $notification->data['id']) }}">
                                                <li class="notification-box list" data-id="{{ $notification->id }}">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-12 box-noti {{ $notification->read_at ? 'read' : '' }}">
                                                            <div>
                                                                {{ __('your_order') . ' ' }}
                                                                @switch ($notification->data['status'])
                                                                    @case (config('app.orderStatus.pending'))
                                                                        {{ __('noti_pending') }}
                                                                        @break
                                                                    @case (config('app.orderStatus.processing'))
                                                                        {{ __('noti_processing') }}
                                                                        @break
                                                                    @case (config('app.orderStatus.delivering'))
                                                                        {{ __('noti_delivering') }}
                                                                        @break
                                                                    @case (config('app.orderStatus.complete'))
                                                                        {{ __('noti_complete') }}
                                                                        @break
                                                                    @case (config('app.orderStatus.cancel'))
                                                                        {{ __('noti_cancel') }}
                                                                        @break
                                                                    @case (config('app.orderStatus.rejected'))
                                                                        {{ __('noti_rejected') }}
                                                                        @break
                                                                @endswitch
                                                            </div>
                                                            <small class="box {{ $notification->read_at ? 'read' : '' }}">{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                            @endforeach
                                        </ul>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="shop.html">{{ __('Account') }} <i class="fa fa-sort-desc"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="cart.html">{{ Auth::user()->fullname }}</a></li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                <input type="submit" class="btn-logout" value="{{ __('Logout') }}">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Login')}} /</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Register')}} </a>
                                @endif
                            @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
</nav>
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li class="slide-1">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">{{ __('Sale')}}</h1>
                                    <h2 class="head-3">45%</h2>
                                    <p class="category"><span>{{ __('New designs')}}</span></p>
                                    <p><a href="#" class="btn btn-primary">{{ __('Connect with store')}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide-2">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Sale</h1>
                                    <h2 class="head-3">45%</h2>
                                    <p class="category"><span>Những mẫu thiết kế mới</span></p>
                                    <p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide-3">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Sale</h1>
                                    <h2 class="head-3">45%</h2>
                                    <p class="category"><span>Những mẫu thiết kế mới</span></p>
                                    <p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
</div>
