<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="service-price">Service Price</label>
                                    <input type="text" class="form-control" id="service-price" name="value" required>
                                </div>
                                <div class="form-group">
                                    <label for="account-number">Account Number</label>
                                    <input type="text" class="form-control" id="account-number" name="value" required>
                                </div>
                                <div class="form-group">
                                    <label for="bank-name">Bank Name</label>
                                    <input type="text" class="form-control" id="bank-name" name="value" required>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="value" required>
                                </div>
                                <div class="form-footer">
                                    <button type="button" class="btn btn-outline-primary-2 btn-accept">
                                        <span>Update</span>
                                        <i class="icon-check"></i>
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
