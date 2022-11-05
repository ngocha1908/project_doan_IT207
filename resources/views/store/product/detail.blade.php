@extends('store.master.master')
@section('title','Detail Product')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-detail-wrap">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ route('cart.addToCart') }}" method="POST">
                                @csrf
                                <div class="product-entry">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($detail->images as $key => $image)
                                                <div class="carousel-item @if ($key == config('app.zero')) active @endif">
                                                    <img class="d-block" src="../uploads/{{ $image->name }}" alt="Ảnh sản phẩm">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-7">
                            <div class="desc">
                                <h3>{{ __('Name') }}: {{ $detail->name }}</h3>
                                <h5>{{ __('Code') }}: {{ $detail->code }}</h5>
                                <p class="price">
                                <h5>{{ __('Price') }}: {{ number_format($detail->price) }} VND</h5>
                                </p>
                                <h5> {{ __('Status') }}:
                                    @if ($detail->status == config('app.status.stocking'))
                                    <a class="btn btn-success mt-2">{{ __('Stocking') }}</a>
                                    @else
                                    <a class="btn btn-danger mt-2">{{ __('Out of stock') }}</a>
                                    @endif
                                </h5>
                                <h5>{{ __('Description') }}</h5>
                                <p class="description">
                                    {{ $detail->description }}
                                </p>
                                <h5> {{ __('Quantity') }}:
                                    <div class="row">
                                        <div class="col-md-4 quantity-form">
                                            <input name="quantity" type="number" class="form-control form-blue quantity" value="1" min="1" max="100">
                                        </div>
                                    </div>
                                    <h5 class="mb-0">{{ __('Choose Size') }}</h5>
                                    <select class="size-select" name="size">
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
                                    @if (Session::has('messages')) 
                                        <div class="alert alert-warning">
                                            <div class="text-black">{{ __(Session::get('messages')) }}</div>
                                        </div>
                                    @endif
                                    @if ($detail->status)
                                        <input type="hidden" name="id" value="{{$detail->id}}">
                                        <p><button class="btn btn-primary btn-addtocart mt-3" type="submit"> {{ __('Add to cart') }}</button></p>
                                    @else
                                        <p class="btn btn-danger mt-3" disabled> {{ __('Cannot add to cart') }}</p>
                                    @endif
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="choose-size">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('Guide to choose size') }}</span></h2>
                <img src="{{ asset('../uploads/choose-size.png') }}" alt>
            </div>
        </div>
    </div>
</div>

<div id="comment">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('Comments') }}</span></h2>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form method="post" action=" {{ route('comment') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">
                        <h5>{{ __('Write Comment') }}:</h5>
                    </label>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger col-9">{{ __($error) }}</div>
                    @endforeach
                    @endif
                    <textarea class="form-control comment-input" id="exampleFormControlTextarea1" name="content" rows="3" placeholder="{{ __('input_comment') }}"></textarea>
                </div>
                <input type="hidden" name="product_id" value="{{ $detail->id}}">
                <button type="submit" name="sbm" class="btn btn-primary">{{ __('Comment') }}</button>
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

<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('Recommend') }}</span></h2>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3 text-center">
                <div class="product-entry">
                    <div class="product-img" style="background-image: url(../uploads/{{ $item->images->first()['name'] }});">
                        <div class="cart">
                            <p>
                                <span><a href="{{ route('product.detail', $item->slug) }}"><i class="icon-eye"></i></a></span>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="{{ route('product.detail', $item->slug) }}">{{ $item->name }}</a></h3>
                        <p class="price">
                            <span>{{ number_format($detail->price) }} VND</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
