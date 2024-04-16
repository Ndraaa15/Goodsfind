<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                    <div class="banner-content text-center">
                        <h2 class="banner-title">{{$news['Title']}}</h2>
                        <p>{{$news['Desc']}}</p>
                        @if($news['Target'] != null)
                        <a href="{{$news['Target']}}" class="btn btn-primary btn-rounded"><span>Click Here</span><i class="icon-long-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="{{ $news['ImageUrl'] }}" class="newsletter-img" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div>
