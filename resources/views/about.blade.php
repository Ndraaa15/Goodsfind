@extends('layout.app')
@section('content')
    <main class="main">
        <div class="page-header text-center"
             style="background-image: url({{asset('assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">About Goodsvind</h1>
            </div>
        </div>
        <div class="page-content pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-text text-center mt-3">
                            <h2 class="title text-center mb-2">Who We Are</h2>
                            <p class="mb-1">Goods Find merupakan salah satu bisnis/usaha yang bergerak di bidang
                                jasa dengan berbasis pada teknologi digital, yaitu berupa website
                                sebagai platform layanan transaksi (jual-beli) barang preloved.
                            </p>
                            <p class="mb-6">
                                Goods Find ini ditujukan atau ditargetkan untuk masyarakat yang mencari
                                barang preloved berkualitas dengan harga yang terjangkau, serta mereka
                                yang ingin menjual barang preloved.
                            </p>
                            <h2 class="title text-center mb-2">Vision</h2>
                            <p class="mb-6">Menjadi platform terdepan dalam memfasilitasi transaksi barang preloved
                                secara mudah, aman dan nyaman, serta menjadi solusi utama dalam
                                mengelola limbah barang bekas untuk mencapai target pembangunan
                                berkelanjutan, khususnya pada poin 12 Sustainable Development Goals
                                (SDG’s) yaitu responsible consumption and production.
                            </p>
                            <h2 class="title text-center mb-2">Mission</h2>
                            <p class="mb-1">"Mudah, Aman, dan Nyaman"
                                MUDAH : Memungkinkan pengguna untuk memasarkan barang
                                preloved mereka dengan mudah dan menemukan barang yang
                                mereka cari tanpa kesulitan, baik secara teknis maupun non-teknis.
                                AMAN : Pengguna tidak perlu khawatir akan keamanan dalam
                                melakukan transaksi karena disediakan tanda tangan kontrak antara
                                penjual dan pembeli untuk menjamin kepastian dan kesepakatan.
                                NYAMAN : Fitur-fitur terbaru akan terus dikembangkan guna
                                meningkatkan pengalaman pengguna.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4"></div>
            <div class="bg-image pt-7 pb-5 pt-md-12 pb-md-9"
                 style="background-image: url({{asset('assets/images/background.jpg')}})">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="40" data-speed="3000"
                                          data-refresh-interval="50">0</span>k+
                                </div>
                                <h3 class="count-title text-white">Happy Customer</h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="20" data-speed="3000"
                                          data-refresh-interval="50">0</span>+
                                </div>
                                <h3 class="count-title text-white">Years in Business</h3><!-- End .count-title -->
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="95" data-speed="3000"
                                          data-refresh-interval="50">0</span>%
                                </div>
                                <h3 class="count-title text-white">Return Clients</h3><!-- End .count-title -->
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="15" data-speed="3000"
                                          data-refresh-interval="50">0</span>
                                </div>
                                <h3 class="count-title text-white">Awards Won</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-light-2 pt-6 pb-7 mb-6">
                <div class="container">
                    <div class="text-center ">
                        <a href="/shop" class="btn btn-sm btn-minwidth-lg btn-outline-primary-2">
                            <span>Let's Try Shopping</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
