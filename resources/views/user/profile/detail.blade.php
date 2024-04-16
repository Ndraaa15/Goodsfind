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
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody id="product-details-body"></tbody>
                                <!-- Product details will be dynamically added here -->
                            </table>
                            <h2 class="checkout-title">Billing Details</h2>
                        </div>
                        <aside class="col-lg-12">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3>
                                <table class="table table-summary">
                                    <tbody id="summary-details-body">
                                        <!-- Subtotal, service tax, shipping, and total will be dynamically added here -->
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
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var order = $(this).data('product-order');

            if (Array.isArray(order.order_items)) {
                var productDetailsHTML = '';

                order.order_items.forEach(function(orderItem) {
                    var productHTML = `
                <td class="product-col">
                    <div class="product">
                        <figure class="product-media">
                            <a href="#">
                                <img src="${orderItem.product.image || 'assets/images/slide-2.jpg'}" alt="Product image">
                            </a>
                        </figure>
                        <h3 class="product-title">
                            <a href="#">${orderItem.product.name}</a>
                        </h3>
                    </div>
                </td>
            `;

                    var quantityHTML = `
                <td class="quantity-col">
                    ${orderItem.quantity}
                </td>`

                    var totalPriceHTML = `
                <td class="total-col">
                    Rp.${orderItem.price}
                </td>
            `;
                    productDetailsHTML += `<tr>${productHTML}${quantityHTML}${totalPriceHTML}</tr>`;
                });

                $('#product-details-body').html(productDetailsHTML);
            }


            var subtotal = parseFloat(order.total_price);
            var serviceTax = parseFloat(order.payment.service_price);
            var shipping = parseFloat(order.payment.shipping_price);
            var total = subtotal + serviceTax + shipping;

            // Generate HTML for the summary details
            var summaryDetailsHTML = `
            <tr class="summary-service-tax">
                    <td>Subtotal:</td>
                    <td>Rp${subtotal}</td>
                </tr>
                <tr class="summary-service-tax">
                    <td>Service tax:</td>
                    <td>Rp${serviceTax}</td>
                </tr>
                <tr class="summary-service-tax">
                    <td>Shipping:</td>
                    <td>Rp${shipping}</td>
                </tr>
                <tr class="summary-total">
                    <td>Total:</td>
                    <td>Rp${total}</td>
                </tr>
            `;

            // Display the summary details in the table body
            $('#summary-details-body').html(summaryDetailsHTML);

            // Open the modal
            $('#detail-modal').modal('show');
        });
    });
</script>
