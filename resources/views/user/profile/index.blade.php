@extends('layout.app')
@section('content')
<main class="main">
    <div class="page-header text-center mb-4" style="background-image: url({{asset('assets/images/page-header-bg.jpg')}})">
        <div class="container">
            <h1 class="page-title">My Profile</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-payments-link" data-toggle="tab" href="#tab-payments" role="tab" aria-controls="tab-payments" aria-selected="false">Payments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-review-link" data-toggle="tab" href="#tab-review" role="tab" aria-controls="tab-review" aria-selected="false">Review</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('signout') }}">Sign Out</a>
                            </li>
                        </ul>
                    </aside>
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">{{Auth::user()->name}}</span>
                                    (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log
                                        out</a>)
                                    <br>
                                    From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent
                                        orders</a>, manage your <a href="" class="tab-trigger-link">shipping
                                        addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your
                                        password and account details</a>.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @if($orders->isEmpty())
                                <p>No order has been made yet.</p>
                                <a href="/shop" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                @else
                                <div class="page-content">
                                    <table class="table table-wishlist table-mobile">
                                        <thead>
                                            <tr>
                                                <th>My Order</th>
                                                <th>Total</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td class="product-col">
                                                    <div class="product">
                                                        <h3 class="product-title">
                                                            <a href="#">{{ $order->order_code}}</a>
                                                        </h3>
                                                    </div>
                                                </td>
                                                <td class="total-col">
                                                    Rp{{$order->total_price}}
                                                </td>
                                                <td class="action-col">
                                                    <button href="#detail-modal" data-toggle="modal" class="btn btn-outline-primary btn-edit" data-product-order="{{ $order }}">
                                                        >
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="tab-payments" role="tabpanel" aria-labelledby="tab-payments-link">
                                @if($orders === null)
                                <p>No payments has been made yet.</p>
                                <a href="/shop" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                @else
                                <div class="page-content">
                                    <table class="table table-wishlist table-mobile">
                                        <thead>
                                            <tr>
                                                <th>My Order</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td class="product-col">
                                                    <div class="product">
                                                        <h3 class="product-title">
                                                            <a href="#">{{ $order->order_code}}</a>
                                                        </h3>
                                                    </div>
                                                </td>
                                                <td class="total-col">
                                                    Rp{{$order->payment->total_payment}}
                                                </td>
                                                <td class="action-col">
                                                    @if($order->payment->status_payment === \App\StatusPayment::PENDING)
                                                    <span class="badge badge-warning">Pending</span>
                                                    @elseif($order->payment->status_payment === \App\StatusPayment::PAID)
                                                    <span class="badge badge-success">Paid</span>
                                                    @else
                                                    <span class="badge badge-danger">Failed</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="{{ route('update-user') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <label>Name *</label>
                                    <input type="text" class="form-control" placeholder="{{ $user->name }}" name="name">
                                    <label>Display Name *</label>
                                    <input type="text" class="form-control" placeholder="{{ $user->display_name }}" name="display-name">
                                    <small class="form-text">This will be how your name will be displayed in the
                                        account section and in reviews</small>
                                    <label>Email address *</label>
                                    <input type="email" class="form-control" placeholder="{{ $user->email }}" name="email">
                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control" placeholder="●●●●●●●●●">
                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control" name="new-password">
                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control mb-2" name="confirm-password">
                                    <input type="submit" class="btn btn-outline-primary-2" value="Save">
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab-review" role="tabpanel" aria-labelledby="tab-review-link">
                                @php
                                $reviewText = "Add Review";
                                $ratingVal = "Add Rating";
                                if ($review !== null) {
                                $reviewText = $review->review;
                                $ratingVal = $review->rating;
                                }
                                @endphp
                                <form action="{{ route('add-review') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <label>Rating *</label>
                                    <input type="number" class="form-control" placeholder="{{ $ratingVal }}" min="1" max="5" name="rating" required>
                                    <label>Review *</label>
                                    <input type="text" class="form-control" placeholder="{{ $reviewText }}" name="review" required>
                                    <input type="submit" class="btn btn-outline-primary-2" value="Add Review">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('user.profile.detail')
@endsection
