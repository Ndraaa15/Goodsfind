<div class="modal fade" id="check-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <div class="form-box">
                    <div class="form-tab">
                        <div class="tab-content" id="tab-content-5">
                            <form action="#">
                                <div class="form-group">
                                    <label for="shipping-address-name">Name</label>
                                    <input type="text" class="form-control" id="shipping-address-name" name="shipping-address-name" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="shipping-address">Address</label>
                                    <input type="text" class="form-control" id="shipping-address" name="shipping-address" style="outline: none;content: 'Select some files';" disabled>
                                </div>
                                <div class="form-footer">
                                    <form id="accept-order" action="#" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" id="order-item-id" name="order-item-id"> <!-- Use input type "hidden" to store the order ID -->
                                        <input type="hidden" name="status" value="Accepted"> <!-- Add input for status -->
                                        <button type="button" class="btn btn-outline-primary-2 btn-accept" onclick="acceptOrder()">
                                            <span>Accept</span>
                                            <i class="icon-check"></i>
                                        </button>
                                    </form>
                                    <script>
                                        // Define the acceptOrder function in the global scope
                                        function acceptOrder() {
                                            if (confirm('Are you sure you want to accept this order?')) {
                                                var orderId = $('#order-item-id').val(); // Get the order ID from the hidden input field
                                                var endpoint = '/order/' + orderId; // Construct the endpoint

                                                // Set the form action and submit
                                                var form = $('#accept-order'); // Get the form element using jQuery
                                                if (form.length > 0) { // Check if the form element is found
                                                    form.attr('action', endpoint);
                                                    form.submit();
                                                } else {
                                                    console.error('Form element not found.');
                                                }
                                            }
                                        }

                                        document.addEventListener("DOMContentLoaded", function() {
                                            $('#check-modal').on('show.bs.modal', function(event) {
                                                var button = $(event.relatedTarget);
                                                var orderItemId = button.data('order-item-id');
                                                $('#order-item-id').val(orderItemId); // Set the value of the hidden input field
                                            });
                                        });
                                    </script>
                                    <button type="submit" class="btn btn-outline-primary-2 btn-reject">
                                        <span>Reject</span>
                                        <i class="icon-close"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#check-modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var name = button.data('shipping-address-name');
            var address = button.data('shipping-address');

            var modal = $(this);
            modal.find('#shipping-address-name').val(name);
            modal.find('#shipping-address').val(address);
        });
    });
</script>
