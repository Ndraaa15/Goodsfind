<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{asset('assets/images/logo-footer.png')}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros
                            eu erat. </p>
                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Got Question? Call us 24/7
                            <a href="tel:#">+0123 456 789</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4>
                        <ul class="widget-list">
                            <li><a href="/about">About us</a></li>
                            <li><a href="/contact">Contact us</a></li>
                            <li><a href="/faq">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>
                        <ul class="widget-list">
                            <li><a href="/faq#accordion-1">Shipping Information</a></li>
                            <li><a href="/faq#accordion-2">Orders and Returns</a></li>
                            <li><a href="/faq#accordion-3">Payments</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-list">
                            @auth
                            <li><a href="/profile">Profile</a></li>
                            <li><a href="/cart">Cart</a></li>
                            <li><a href="/wishlist">Wishlist</a></li>
                            <li><a href="/merchant">Merchant</a></li>
                            <li><a href="#">Sign Out</a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal">Sign in</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p>
        </div>
    </div>
</footer>
