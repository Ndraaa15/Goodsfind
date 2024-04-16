@extends('layout.app')
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('assets/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">Wislist</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($wishlists->isEmpty())
                    <p>Your wishlist is currently empty.</p>
                    @else
                    @foreach($wishlists as $wishlist)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ $wishlist->product->image ?: 'assets/images/slide-2.jpg' }}" alt="Product image">
                                    </a>
                                </figure>
                                <h3 class="product-title">
                                    <a href="#">{{ $wishlist->product->name }}</a>
                                </h3>
                            </div>
                        </td>
                        <td class="price-col">Rp{{ $wishlist->product->price }} </td>
                        <td class="stock-col">
                            @if($wishlist->product->stock > 0)
                            <span class="in-stock">In stock</span>
                            @else
                            <span class="out-of-stock">Out of stock</span>
                            @endif
                        </td>
                        <td class="action-col">
                            @if($wishlist->product->stock > 0)
                            <form id="add-cart-item" action="{{ route('add-cart-item', ['product_id' => $wishlist->product_id])}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</button>
                            </form>
                            <script>
                                function addCartItem() {
                                    document.getElementById('add-cart-item').submit();
                                }
                            </script>
                            @else
                            <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                            @endif
                        </td>
                        <td class="remove-col">
                            <form id="delete-wishlist" action="{{ route('delete-wishlist', ['product_id' => $wishlist->product_id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-remove" onclick="deleteItem()">
                                    <i class="icon-close"></i>
                                </button>
                            </form>
                            <script>
                                function deleteItem() {
                                    if (confirm('Are you sure you want to delete?')) {
                                        document.getElementById('delete-wishlist').submit();
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
