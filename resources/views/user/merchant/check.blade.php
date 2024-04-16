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
                            <form id="update-form" action="{{ route('update-status-order', ['order_item_id' => 'PRODUCT_ID'])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="shipping-address-name">Name</label>
                                    <input type="text" class="form-control" id="shipping-address-name" name="shipping-address-name" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="shipping-address">Address</label>
                                    <input type="text" class="form-control" id="shipping-address" name="shipping-address" style="outline: none;content: 'Select some files';" disabled>
                                </div>
                                <div class="form-footer">
                                    <input type="text" name="status-order" id="status-order" value="" hidden>
                                    <button type="button" class="btn btn-outline-primary-2 btn-accept" onclick="setOrderStatus('Accepted')">
                                        <span>Accept</span>
                                        <i class="icon-check"></i>
                                    </button>
                                    <button type="submit" class="btn btn-outline-primary-2 btn-reject" onclick="setOrderStatus('Rejected')">
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
    function setOrderStatus(status) {
        $('#status-order').val(status);
        $('#update-form').submit();
    }

    document.addEventListener("DOMContentLoaded", function() {
        $('#check-modal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const name = button.data('shipping-address-name');
            const address = button.data('shipping-address');
            const orderItemID = button.data('order-item-id');

            const modal = $(this);
            modal.find('#shipping-address-name').val(name);
            modal.find('#shipping-address').val(address);

            let formAction = $('#update-form').attr('action');
            formAction = formAction.replace('PRODUCT_ID', orderItemID);
            console.log(formAction);
            $('#update-form').attr('action', formAction);
        });
    });
</script>
