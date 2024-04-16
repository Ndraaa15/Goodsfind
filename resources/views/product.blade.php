@extends('layout.app')
@section('content')
<main class="main">
    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="{{$product->image ?: '../assets/images/slide-2.jpg'}}" data-zoom-image="{{$product->image ?: 'assets/images/slide-2.jpg'}}" alt="product image">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-8 mt-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$product->name}}</h1>
                            <div class="product-price">
                                @if($product->discount > 0)
                                <span class="new-price">Rp{{($product->price - ($product->price * $product->discount / 100))}}</span>
                                <span class="old-price">Was Rp{{$product->price}}</span>
                                @else
                                <span class="new-price">Rp{{ $product->price }} </span>
                                @endif
                            </div>
                            <div class="product-content">
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="product-details-action">
                                <form id="add-to-cart-form-{{$product->id}}" action="{{ route('add-cart-item', ['product_id' => $product->id])}}" method="POST">
                                    @csrf
                                    @method('POST')
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{$product->id}}').submit();" class="btn-product btn-cart"><span>add to cart</span></a>
                                <div class="details-action-wrapper">
                                    <form id="add-wishlist-{{$product->id}}" action="{{ route('add-wishlist', ['product_id' => $product->id])}}" method="POST">
                                        @csrf
                                        @method('POST')
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('add-wishlist-{{$product->id}}').submit();" class="btn-product btn-wishlist"><span>add to wishlist</span></a>
                                </div>
                                <div class="details-action-wrapper">
                                    <a href="{{ url('chatify/' . $product->merchant->user_id)  }}" class="btn-product" title="Wishlist"><span> <i class="icon-comment-o"></i>Message</span></a>
                                </div>
                            </div>
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="/product?category={{$product->product_category->id}}">{{$product->product_category->category}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
