@php
$cartModel = new \App\Models\Cart();
$cart = $cartModel->get_cart_by_user_id(auth()->user()->id);
$cartItems = $cart->cart_items()->with('product')->get();
@endphp


<div class="dropdown cart-dropdown">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
        <div class="icon">
            <i class="icon-shopping-cart"></i>
            <span class="cart-count">{{$cartTotal}}</span>
        </div>
        <p>Cart</p>
    </a>
    @if($cartItems->isEmpty())
    <div class="dropdown-menu">
        <p>Your cart is currently empty.</p>
    </div>
    @else
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-cart-products">
            @foreach($cartItems as $cartItem)
            <div class="product">
                <div class="product-cart-details">
                    <h4 class="product-title">
                        <a href="/product">{{$cartItem->product->name}}</a>
                    </h4>
                    <span class="cart-product-info">
                        <span class="cart-product-qty">{{ $cartItem->quantity }}</span>
                        x {{ $cartItem->product->price }}
                    </span>
                </div>
                <figure class="product-image-container">
                    <a href="/product" class="product-image">
                        <img src="{{ $cartItem->product->image ?: 'assets/images/slide-2.jpg' }}" alt="product">
                    </a>
                </figure>
                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
            </div>
            @endforeach
        </div>
        <div class="dropdown-cart-total">
            <span>Total</span>
            <span class="cart-total-price">{{ $cart->total_price }}</span>
        </div>
        <div class="dropdown-cart-action">
            <a href="{{ route('get-cart') }}" class="btn btn-primary">View Cart</a>
            <a href="{{ route('get-cart') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
        </div>
    </div>
    @endif
</div>
