@php
$serviceTax = 0;
foreach($cartItems as $cartItem){
$serviceTax += $cartItem->product->merchant->service_price;
}
@endphp

@extends('layout.app')
@section('content')
<main class="main">
    <div class="page-header text-center mb-3" style="background-image: url({{ asset('assets/images/page-header-bg.jpg')}} )">
        <div class="container">
            <h1 class="page-title">Shopping Cart</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $cartItem)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ $cartItem->product->image ?: '../assets/images/slide-2.jpg'}}" alt="Product image">
                                                </a>
                                            </figure>
                                            <h3 class="product-title">
                                                <a href="{{ route('get-product-by-id', ['id' => $cartItem->product->id]) }}">{{$cartItem->product->name}}</a>
                                            </h3>
                                        </div>
                                    </td>
                                    <td class="total-col">
                                        {{ $cartItem->quantity }}
                                    </td>
                                    <td class="total-col">
                                        Rp.{{($cartItem->product->price - ($cartItem->product->price * $cartItem->product->discount / 100))}}
                                    </td>
                                    <td class="remove-col">
                                        <form id="delete-form" action="{{ route('delete-cart-item', ['product_id' => $cartItem->product_id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn-remove" onclick="deleteItem()">
                                                <i class="icon-close"></i>
                                            </button>
                                        </form>
                                        <script>
                                            function deleteItem() {
                                                if (confirm('Are you sure you want to delete?')) {
                                                    document.getElementById('delete-form').submit();
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h2 class="checkout-title">Billing Details</h2>
                        <form id="checkout" action="{{ route('checkout')}}" method="POST">
                            @csrf
                            @method('POST')
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>

                            <label>Company Name (Optional)</label>
                            <input type="text" class="form-control" name="company-name">

                            <label>State / Country *</label>
                            <input type="text" class="form-control" name="country" required value="Indonesia">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>

                                <div class="col-sm-6">
                                    <label>Province *</label>
                                    <input type="text" class="form-control" name="province" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" class="form-control" name="postal-code" required>
                                </div>

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                            </div>

                            <label>Email address *</label>
                            <input type="email" class="form-control" name="email" required>

                            <label>Detail address</label>
                            <textarea class="form-control" cols="30" rows="4" name="detail-address" placeholder="Write more detail address"></textarea>
                    </div>
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3>
                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>Rp{{$cart->total_price }}</td>
                                    </tr>
                                    <tr class="summary-subtotal">
                                        <td>Service Tax:</td>
                                        <input type="text" name="service-price" hidden value="{{ $serviceTax }}">
                                        <td>Rp{{$serviceTax}}</td>
                                    </tr>
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="text" name="shipping-type" hidden value="Standart">
                                                <input type="radio" id="standart-shipping" name="shipping-price" class="custom-control-input" value="20000">
                                                <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                            </div>
                                        </td>
                                        <td>Rp20000</td>
                                    </tr>
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="text" name="shipping-type" hidden value="Express">
                                                <input type="radio" id="express-shipping" name="shipping-price" class="custom-control-input" value="50000">
                                                <label class="custom-control-label" for="express-shipping">Express:</label>
                                            </div>
                                        </td>
                                        <td>Rp50000</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>Rp{{ $cart->total_price + $serviceTax}}</td>
                                    </tr>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const radioButtons = document.querySelectorAll('input[name="shipping-price"]');
                                            const totalElement = document.querySelector('.summary-total td:last-child');
                                            const cartTotal = <?php echo $cart->total_price; ?>;
                                            const serviceTax = <?php echo $serviceTax; ?>;
                                            radioButtons.forEach(function(radioButton) {
                                                radioButton.addEventListener('change', function() {
                                                    const selectedPrice = parseFloat(this.value);
                                                    total = selectedPrice + cartTotal + serviceTax;
                                                    totalElement.textContent = 'Rp' + total;
                                                });
                                            });
                                        });
                                    </script>
                                </tbody>
                                </form>
                            </table>
                            <a href="{{ route('home') }}" onclick="event.preventDefault(); document.getElementById('checkout').submit();" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div>
                        <a href="{{ route('get-all-product') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
