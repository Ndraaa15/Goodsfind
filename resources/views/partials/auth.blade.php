<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="{{ route('signin') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="signin-email">Email Address *</label>
                                        <input type="text" class="form-control" id="signin-email" name="signin-email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sigmin-password">Password *</label>
                                        <input type="password" class="form-control" id="signin-password" name="signin-password" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action=" {{ route('register') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="register-name">Name *</label>
                                        <input type="text" class="form-control" id="register-name" name="register-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-display-name">Display Name *</label>
                                        <input type="text" class="form-control" id="register-display-name" name="register-display-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-email">Email Address *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password" name="register-password" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
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
</div>
