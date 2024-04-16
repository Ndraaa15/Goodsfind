@extends('layout.app')
@section('content')
<main class="main">
    <div class="page-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mt-4">
                    @foreach($products as $product)
                    <div class="products mb-3">
                        <div class="product product-list">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <figure class="product-media">
                                        <a href="/product">
                                            <img src="{{$product->image ?: '../assets/images/slide-2.jpg'}}" alt="Product image" class="product-image">
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-6 col-lg-3 order-lg-last">
                                    <div class="product-list-action">
                                        <div class="product-price">
                                            @if($product->discount > 0)
                                            <span class="new-price">Rp{{($product->price - ($product->price * $product->discount / 100))}}</span>
                                            <span class="old-price">Was Rp{{$product->price}}</span>
                                            @else
                                            <span class="new-price">Rp{{ $product->price }} </span>
                                            @endif
                                        </div>
                                        <form id="add-to-cart-form-{{$product->id}}" action="{{ route('add-cart-item', ['product_id' => $product->id])}}" method="POST">
                                            @csrf
                                            @method('POST')
                                        </form>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{$product->id}}').submit();" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="product-body product-action-inner">
                                        <a href="#" class="btn-product btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
                                        <div class="product-cat">
                                            <a href="/product?category={{$product->product_category->id}}">{{$product->product_category->category}}</a>
                                        </div>
                                        <h3 class="product-title"><a href="{{ route('get-product-by-id', ['id' => $product->id])}}">{{ $product->name }}</a></h3>
                                        <div class="product-content">
                                            <p>{{$product->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div>
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3>
                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach($categories as $category)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{$category->id}}">
                                                <label class="custom-control-label" for="{{$category->id}}">{{$category->category}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
@endsection
