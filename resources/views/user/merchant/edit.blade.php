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
                            <form id="update-form" action="{{ route('update-merchant', ['id' =>  $merchant->id ]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="service-price">Service Price</label>
                                    <input type="text" class="form-control" id="service-price" name="service-price" value="{{ $merchant->service_price}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="account-number">Account Number</label>
                                    <input type="text" class="form-control" id="account-number" name="account-number" value="{{ $merchant->account_number }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="bank-name">Bank Name</label><br>
                                    <small>Current : {{ $merchant->bank_name }}</small><br>
                                    <select name="bank-name" id="bank-name">
                                        <option value="BCA">BCA</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BNI">BNI</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label><br>
                                    <small>Current : {{ $merchant->location }}</small><br>
                                    <select name="location" id="location">
                                        <option value="Malang">Malang</option>
                                        <option value="Sidoarjo">Sidoarjo</option>
                                        <option value="Surabaya">Surabaya</option>
                                    </select>
                                </div>
                                <div class="form-footer">
                                    <input class="btn btn-outline-primary-2" type="submit" name="submit" id="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
