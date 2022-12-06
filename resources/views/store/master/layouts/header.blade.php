<div class="colorlib-loader"></div>
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>
                        
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    <div class="logo">
                        	<!-- Logo desktop -->		
                        <div id="colorlib-logo"><a href="{{ route('home') }}"><img src="/images/icons/logo-01.png" alt=""></a></div>
                    </div>

               	<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="{{ route('home') }}" style="a:hover{color: #6c7ae0;}">{{ __('Home') }}</a>
							</li>

							<li>
                            <a href="{{ route('product.shop') }}" style="a:hover{color: #6c7ae0;}">Shop</a>
							</li>

							<li >
							<a href="about.html" style="a:hover{color: #6c7ae0;}">{{ __('About') }}</a>
							</li>

							<li>
                            <a href="contact.html" style="a:hover{color: #6c7ae0;}">{{ __('Contact') }}</a>
							</li>

                            <li >
                            <a href=""><i class="fa fa-globe" aria-hidden="true" style="a:hover{color: #6c7ae0;}"></i> {{ __('Language') }}</a>
								<ul class="sub-menu">
                                    <li><a href="{!! route('language', ['en']) !!}"> {{__('English') }}</a></li>
                                    <li><a href="{!! route('language', ['vi']) !!}"> {{__('Vietnamese') }}</a></li>
								</ul>
							</li>

					   
                            <li style="padding-left: 250px;"><a href="{{route('cart.showCart')}}" style="a:hover{color: #6c7ae0;}"><i class="zmdi zmdi-shopping-cart"></i> {{ __('Cart')}} [{{Cart::count()}}]</a></li>
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
                            
                                <!-- <input type="submit" class="btn-logout" value="{{ __('Logout') }}"> -->
                                <li class="has-dropdown" style="color: black;">
                                    <a href="shop.html" style="a:hover{color: #6c7ae0;}">{{ __('Account') }} <i class="fa fa-sort-desc"></i></a>
                                    <ul class="sub-menu">
                                        <li style="text-align: left;"><a href="cart.html">{{ Auth::user()->fullname }}</a></li>
                           
                                        <form action="{{ route('logout') }}" method="post">         
                                            <input type="submit" class="btn-logout" value="{{ __('Logout') }}" style="color: gray;  padding: 5px 0 0 20px;" >	    
                                                @csrf
                                            </form>
                                           
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: black;">{{ __('Login')}} /</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: black;">{{ __('Register')}} </a>
                                @endif
                            @endauth
                            @endif
						</ul>
					</div>	

                </nav>
            </div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>

</header>