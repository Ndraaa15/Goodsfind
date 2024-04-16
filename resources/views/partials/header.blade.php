<header class="header header-intro-clearance header-3">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
            </div>
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <ul>
                            @auth
                            <li><a href="/profile">{{auth()->user()->name}}</a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <a href="/" class="logo">
                    <img src="{{ asset($logoUrl) }}" alt="{{$title}} Logo" width="105" height="25">
                </a>
            </div>
            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="header-right">
                @auth
                <div class="wishlist">
                    <a href="{{ url('chatify') }}" title="Chat">
                        <div class="icon">
                            <i class="icon-comment-o"></i>
                        </div>
                        <p>Chat</p>
                    </a>
                </div>
                <div class="wishlist">
                    <a href="{{ route('wishlist') }}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge">{{$wishTotal}}</span>
                        </div>
                        <p>Wishlist</p>
                    </a>
                </div>
                @include('partials.cart')
                <div class="wishlist">
                    <a href="{{ route('profile') }}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                        <p>Profile</p>
                    </a>
                </div>
                @else
                <div class="wishlist">
                    <a href="#signin-modal" data-toggle="modal" title="Wishlist">
                        <div class="icon">
                            <i class="icon-comment-o"></i>
                        </div>
                        <p>Chat</p>
                    </a>
                </div>
                <div class="wishlist">
                    <a href="#signin-modal" data-toggle="modal" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                        </div>
                        <p>Wishlist</p>
                    </a>
                </div>
                <div class="wishlist">
                    <a href="#signin-modal" data-toggle="modal" title="Wishlist">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                        </div>
                        <p>Cart</p>
                    </a>
                </div>
                <div class="wishlist">
                    <a href="#signin-modal" data-toggle="modal" title="Wishlist">
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                        <p>Profile</p>
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                @include('partials.category')
            </div>
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="{{ route('get-all-product')}}">Shop</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="{{ route('merchant')}}">Merchant</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="{{ route('about')}}">About us</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="{{ route('contact')}}">Contact us</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="{{ route('faq') }}">FAQ</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
