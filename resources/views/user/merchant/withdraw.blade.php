<div class="modal fade" id="withdraw-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <div class="form-box">
                    <div class="form-tab">
                        <div class="tab-content" id="tab-content-5">
                            <form action="{{ route('withdraw') }}" method="post" id="withdraw-form">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" required>
                                </div>
                                <div class="form-footer">
                                    <input class="btn btn-outline-primary-2" type="submit" name="submit" id="submit" value="Withdraw">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
