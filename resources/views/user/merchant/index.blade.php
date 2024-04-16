@extends('layout.app')
@section('content')
<main class="main">
    <div class="page-content">
        <div class="container mt-3">
            <div class="banner">
                <a href="#">
                    <img src="assets/images/banner-1.jpg" alt="Banner" style="max-height: 200px;">
                </a>
                <div class="banner-content">
                    <h4 class="banner-subtitle">Merchant</h4>
                    <h3 class="banner-title">Your balance <br>{{ $merchant->balance }}</h3>
                    <a href="#edit-modal" data-toggle="modal" class="btn btn-outline-primary-2 banner-link">Edit</span></a>
                    <a href="#withdraw-modal" data-toggle="modal" class="btn btn-outline-primary-2 banner-link">Withdraw</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>My Product</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>
                            <button href="#merchant-modal" data-toggle="modal" class="btn btn-outline-primary-2">Tambah
                                <i class="icon-plus-square-o"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                @if($products->isEmpty())
                <p>You don't have any product</p>
                @else
                @foreach($products as $product)
                <tbody>
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ $product->image ?: 'assets/images/slide-2.jpg' }}" alt="Product image">
                                    </a>
                                </figure>
                                <h3 class="product-title">
                                    <a href="{{ route('get-product-by-id', ['id' => $product->id]) }}"> {{ $product->name }} </a>
                                </h3>
                            </div>
                        </td>
                        <td class="action-col">
                            {{ $product->stock }}
                        </td>
                        <td class="action-col">
                            @if($product->stock <= 0) <p>Out of Stock</p>
                                @else
                                <p>Available</p>
                                @endif
                        </td>
                        <td class="action-col">
                            <button href="#update-modal" data-toggle="modal" class="btn btn-outline btn-edit" data-product='@json($product)'>
                                Edit
                            </button>
                        </td>
                        <td class="remove-col">
                            <form id="delete-product" action="{{ route('delete-product', ['id' => $product->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-remove" onclick="deleteItem()">
                                    <i class="icon-close"></i>
                                </button>
                            </form>
                            <script>
                                function deleteItem() {
                                    if (confirm('Are you sure you want to delete?')) {
                                        document.getElementById('delete-product').submit();
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>My Order</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @if($orderItems->isEmpty())
                <p>You don't have any order</p>
                @else
                @foreach($orderItems as $orderItem)
                @php
                $shippingAddressModel = new \App\Models\ShippingAddress();
                $shippingAddress = $shippingAddressModel->get_shipping_address_by_order_id($orderItem->order_id);
                @endphp
                <tbody>
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ $orderItem->product->image ?: 'assets/images/slide-2.jpg'}}" alt="Product image">
                                    </a>
                                </figure>
                                <h3 class="product-title">
                                    <a href="#">{{ $orderItem->product->name }}</a>
                                </h3>
                            </div>
                        </td>
                        <td class="action-col">
                            {{ $orderItem->quantity }}
                        </td>
                        @if($orderItem->status_order == 'Pending')
                        <td class="action-col">
                            <button href="#check-modal" data-toggle="modal" class="btn btn-outline" data-shipping-address-name="{{ $shippingAddress->name }}" data-shipping-address="{{ $shippingAddress->city }}" data-order-item-id="{{ $orderItem->id }}">
                                Pending
                            </button>
                        </td>
                        @elseif($orderItem->status_order == 'Accepted')
                        <td class="action-col">
                            <button href="#" data-toggle="modal" class="btn btn-success" data-shipping-address-name="{{ $shippingAddress->name }}" data-shipping-address="{{ $shippingAddress->city }}" data-order-item-id="{{ $orderItem->id }}">
                                Accepted
                            </button>
                        </td>
                        @elseif($orderItem->status_order == 'Rejected')
                        <td class="action-col">
                            <button href="#" data-toggle="modal" class="btn btn-danger" data-shipping-address-name="{{ $shippingAddress->name }}" data-shipping-address="{{ $shippingAddress->city }}" data-order-item-id="{{ $orderItem->id }}">
                                Rejected
                            </button>
                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</main>
@include('user.merchant.form')
@include('user.merchant.check')
@include('user.merchant.update')
@include('user.merchant.withdraw')
@include('user.merchant.edit')
@endsection
