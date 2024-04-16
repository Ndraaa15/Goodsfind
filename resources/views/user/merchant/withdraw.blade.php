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
                            <form action="#">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="Nominal">Nominal</label>
                                    <input type="text" class="form-control" id="Nominal" name="value" required>
                                </div>
                                <div class="form-footer">
                                    <button type="button" class="btn btn-outline-primary-2 btn-accept">
                                        <span>Withdraw</span>
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

