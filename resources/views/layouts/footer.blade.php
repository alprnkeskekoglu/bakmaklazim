@php
    $tags = getSidebarTags();
@endphp

<footer class="footer_dark bg_black">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="https://templatemanja.com/morus/demo/index-6.html"><img src="/assets/images/logo_white.png" alt="logo"></a>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-none d-lg-block">

                    <div class="widget">
                        <h6 class="widget_title">Popüler Tags</h6>
                        <div class="tags">
                            @foreach($tags as $tag)
                                <a href="{!! $tag->url !!}">{!! $tag->name !!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">İletişim</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>Izmir, Turkey</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:keskekoglualperen@gmail.com">keskekoglualperen@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <ul class="widget_social social_icons rounded_social">
                            <li><a href="index.html#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="index.html#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="index.html#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="index.html#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="index.html#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                            <li><a href="index.html#" class="sc_pinterest"><i class="ion-social-pinterest-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="copyright m-0 text-center">© 2020 All Rights Reserved By <a href="index.html" class="text_default">Morus.</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="javascript:void(0);" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
