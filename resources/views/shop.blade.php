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
                                        <form id="add-wishlist-{{$product->id}}" action="{{ route('add-wishlist', ['product_id' => $product->id])}}" method="POST">
                                            @csrf
                                            @method('POST')
                                        </form>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('add-wishlist-{{$product->id}}').submit();" class="btn-product btn-wishlist"><span>add to wishlist</span></a>
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
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            @php
                            use Illuminate\Support\Facades\Request;

                            $queryParams = Request::query();

                            unset($queryParams['page']);

                            $queryString = http_build_query($queryParams);
                            @endphp

                            <li class="page-item {{ $products->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link page-link-prev" href="{{ $products->previousPageUrl() ? $products->previousPageUrl().($queryString ? '&'.$queryString : '') : '#' }}" aria-label="Previous" tabindex="-1" aria-disabled="{{ $products->previousPageUrl() ? 'false' : 'true' }}">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>

                            {{-- Pagination Links --}}
                            @for ($page = 1; $page <= $products->lastPage(); $page++)
                                <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($page) }}{{ $queryString ? '&' . $queryString : '' }}">{{ $page }}</a>
                                </li>
                                @endfor

                                <li class="page-item {{ $products->nextPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link page-link-next" href="{{ $products->nextPageUrl() ? $products->nextPageUrl().($queryString ? '&'.$queryString : '') : '#' }}" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>

                                <li class="page-item-total">of {{ $products->lastPage() }}</li>
                        </ul>
                    </nav>



                </div>
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="{{ url('/product?page=1') }}" class="sidebar-filter-clear">Clean All</a>
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
                                            <div>
                                                <p for="{{$category->id}}"><a href="/product?category={{$category->id}}"">{{$category->category}}</a></p>
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
