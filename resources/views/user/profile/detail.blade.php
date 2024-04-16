<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <div class="form-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <p>$orders</p>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ $order->order_item ?: 'assets/images/slide-2.jpg' }}" alt="Product image">
                                                    </a>
                                                </figure>
                                                <h3 class="product-title">
                                                    <a href="#">{{ $order->order_items }}</a>
                                                </h3>
                                            </div>
                                        </td>
                                        <td class="total-col">
                                            Rp.{{ $order->total_price }}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h2 class="checkout-title">Billing Details</h2>
                            <label>Name</label>
                            <input type="text" class="form-control">
                            <label>Company Name (Optional)</label>
                            <input type="text" class="form-control">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <input type="text" class="form-control" required>
                                </div>

                                <div class="col-sm-6">
                                    <label>State / County *</label>
                                    <input type="text" class="form-control" required value="Indonesia">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" class="form-control" required>
                                </div>

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="tel" class="form-control" required>
                                </div>
                            </div>

                            <label>Email address *</label>
                            <input type="email" class="form-control" required>

                            <label>Detail address</label>
                            <textarea class="form-control" cols="30" rows="4" placeholder="Write more detail address"></textarea>
                        </div>
                        <aside class="col-lg-12">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3>
                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>Rp.????</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Service tax:</td>
                                            <td>Rp.????</td>
                                        </tr>
                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>Rp.????</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-outline-danger btn-order btn-block">REJECTED</a>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('.btn-edit').on('click', function() {
            const product = JSON.parse($(this).attr('data-product'));

            $('#product-id').val(product.id);
            $('#product-name').val(product.name);
            $('#product-description').val(product.description);
            $('#product-price').val(product.price);
            $('#product-image').attr('src', product.image);
            $('#product-category').val(product.category);
            $('#product-condition').val(product.condition);
            $('#product-stock').val(product.stock);
            $('#product-discount').val(product.discount);
            $('#product-time-usage').val(product.time_usage);
            $('#product-is-promotion').val(product.is_promotion);
        })
    })
</script>
