@extends('layout.app')
@section('content')
<main class="main">
    <div class="intro-section pt-3 pb-3 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
                        <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "responsive": {
                                            "768": {
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                            @foreach($slide as $slideItem)
                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="{{$slideItem['url']}}">
                                        <img src="{{$slideItem['url']}}" alt="{{$slideItem['name']}}">
                                    </picture>
                                </figure>
                                <div class="intro-content">
                                    <h3 class="intro-subtitle text-primary">{{$slideItem['head']}}</h3>
                                    <h1 class="intro-title">
                                        {{$slideItem['name']}}
                                    </h1>
                                    <div class="intro-price">
                                        @if($slideItem['disc'] > 0)
                                        <sup class="intro-old-price">{{$slideItem['price']}}</sup>
                                        <span class="text-primary">{{($slideItem['price'] - ($slideItem['price'] * $slideItem['disc'] / 100))}}.Rp</span>
                                        @else
                                        <span class="text-primary">Rp{{$slideItem['price']}}</span>
                                        @endif
                                    </div>
                                    <a href="{{$slideItem['target']}}" class="btn btn-primary btn-round">
                                        <span>Click Here</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <span class="slider-loader"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container featured">
        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                    @foreach($products as $product)
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="/product">
                                <img src="{{ $product->image ?: 'assets/images/slide-2.jpg' }}" alt="{{ $product->name }}" class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <form id="add-wishlist-form-{{$product->id}}" action="{{ route('add-wishlist', ['product_id' => $product->id ]) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('add-wishlist-form-{{$product->id}}').submit();" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            </div>
                            <div class="product-action product-action-dark">
                                <form id="add-to-cart-form-{{$product->id}}" action="{{ route('add-cart-item', ['product_id' => $product->id])}}" method="POST">
                                    @csrf
                                    @method('POST')
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{$product->id}}').submit();" class="btn-product btn-cart"><span>add to cart</span></a>
                                <a href="{{ route('get-product-by-id', ['id' => $product->id])}}" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                            </div>
                        </figure>
                        <div class="product-body">
                            <div class="product-cat">
                                <a href="/shop?category={{$product->category}}">{{$product->category}}</a>
                            </div>
                            <h3 class="product-title"><a href="/product">{{ $product->name }}</a></h3>
                            <div class="product-price">
                                @if($product->discount > 0)
                                <span class="new-price">Rp{{($product->price - ($product->price * $product->discount / 100))}}</span>
                                <span class="old-price">Was Rp{{$product->price}}</span>
                                @else
                                <span class="new-price">Rp{{ $product->price }} </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="more-container text-center mt-6 mb-0">
            <a href="{{ route('get-all-product') }}" class="btn btn-outline-dark-2 btn-round btn-more"><span>Check more product</span><i class="icon-long-arrow-right"></i></a>
        </div>
    </div>
</main>
@endsection
