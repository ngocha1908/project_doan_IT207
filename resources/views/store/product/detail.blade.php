@extends('store.master.master')
@section('title','Detail Product')
@section('content')
<!-- main -->
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots" style="margin-top: 70px;"> </div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w" style="margin-top: 70px;"></div>
                            
                        <form action="{{ route('cart.addToCart') }}" method="POST">
                        @csrf
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
									<div class="wrap-pic-w pos-relative">
                                    @foreach ($detail->images as $key=>$image)
                                                <div class="carousel-item @if ($key == config('app.zero')) active @endif">
                                                    <img class="d-block" src="../.. /uploads/{{ $image->name }}" alt="Ảnh sản phẩm">
                                                </div>
                                            @endforeach

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="../.. /uploads/{{ $image->name }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
                        <form>
						</div>
					</div>
				</div>

	
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14"  style="margin-top: 70px;">
                        {{ $detail->name }}
						</h4>

						<span class="mtext-106 cl2">
                        {{ number_format($detail->price) }} VND
						</span>

                        <p class="stext-102 cl3 p-t-23">
                        {{ __('Code') }}: {{ $detail->code }}
						</p>

                        <span class="mtext-106 cl2">
                                    @if ($detail->status == config('app.status.stocking'))
                                    <a class="btn btn-success mt-2">{{ __('Stocking') }}</a>
                                    @else
                                    <a class="btn btn-danger mt-2">{{ __('Out of stock') }}</a>
                                    @endif
						</span>

						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="size">					
										@foreach ( $sizes as $item)
                                            @if ( $item->size == config('app.size.s'))
                                                <option value="s">S</option>
                                            @elseif ($item->size == config('app.size.m'))
                                                <option value="m">M</option>
                                            @elseif ($item->size == config('app.size.l'))
                                                <option value="l">L</option>
                                            @elseif ($item->size == config('app.size.xl'))
                                                <option value="xl">XL</option>
                                            @else
                                                <option value="xxl">XXL</option>
                                            @endif
                                        @endforeach
										</select>
										 
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>
                        </div>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

                                    @if (Session::has('messages')) 
                                        <div class="alert alert-warning">
                                            <div class="text-black">{{ __(Session::get('messages')) }}</div>
                                        </div>
                                    @endif
                                    @if ($detail->status)
									<input type="hidden" name="id" value="{{$detail->id}}">
                                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" type="submit">
                                    {{ __('Add to cart') }}
									</button>
                                    @else
                                    <p class="btn btn-danger mt-3" disabled> {{ __('Cannot add to cart') }}</p>
                                    @endif
						<!------------------------  ------------------------->       
                                </div>
                            </div>
                        </div>  
                    </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- <div class="choose-size">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('Guide to choose size') }}</span></h2>
                <img src="{{ asset('../uploads/choose-size.png') }}" alt>
            </div>
        </div>
    </div>
</div> -->
					
<div id="comment">
    <div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center" style="margin-top: 70px;">
				 Leave a comment
				</h3>
			</div>
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form method="post" action=" {{ route('comment') }}">
                @csrf
                <div class="form-group">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger col-9">{{ __($error) }}</div>
                    @endforeach
                    @endif
                    <textarea class="form-control comment-input" id="exampleFormControlTextarea1" name="content" rows="3" placeholder="{{ __('input_comment') }}"></textarea>
                </div>
                <input type="hidden" name="product_id" value="{{ $detail->id}}">
                <button type="submit" name="sbm" class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04" style="margin-left: 40%;">Post Comment</button>
            </form>
        </div>
        <div id="comments-list" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="comment-list-top">
                </div>
                @foreach ($comments as $comment)
                <div class="comment-item">
                    <ul>
                        <li class="name"><b>{{ $comment->user->fullname }}</b></li>
                        <li class="time">{{ $comment->created_at }}</li>
                        <li class="detail">
                            {{ $comment->content }}
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
            {{ $comments->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
				{{ __('Recommend') }}
				</h3>
			</div>
			
			<!-- <div class="wrap-slick2">
				<div class="slick2">
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
					@foreach ($products as $item)
						
						<div class="block2">
							<div class="block2-pic hov-img0">
								<div class="product-img" style="background-image: url(./public/storage/{{ $item->images->first()['name'] }});">
                        			<div class="cart">
                           			 <p>
                               			 <span><a href="{{ route('product.detail', $item->slug) }}"><i class="icon-eye"></i></a></span>
                           			 </p>
                        			</div>
                    			</div>
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{ route('product.detail', $item->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $item->name }}
									</a>

									<span class="stext-105 cl3">
									{{ number_format($detail->price) }} VND
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section> -->
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3 text-center">
                <div class="product-entry">
                    <div class="product-img" style="background-image: url(./public/storage/{{ $item->images->first()['name'] }});">
                        <div class="cart">
                            <p>
                                <span><a href="{{ route('product.detail', $item->slug) }}"><i class="icon-eye"></i></a></span>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3 class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"><a href="{{ route('product.detail', $item->slug) }}">{{ $item->name }}</a></h3>
                        <p class="price">
                            <span class="stext-105 cl3">{{ number_format($detail->price) }} VND</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/slick/slick.min.js"></script>
	<script src="../js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="../vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>


@endsection

