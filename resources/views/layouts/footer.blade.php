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
                            <a href="{{ route('index') }}">
                                <img class="white_logo" src="{{ image("/assets/images/logo-white.png", 200, false) }}" alt="{{ env('APP_NAME') }}">
                            </a>
                        </div>
                        <p>{{ "Kendine değer katmak ve gündeme dair konularda söz sahibi olmak isteyenler için. Kolayca erişin. Hemen okuyun." }}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-none d-lg-block">

                    <div class="widget">
                        <div class="widget_title h6 text-white">Popüler Etiketler</div>
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
                                <i class="fa fa-map-marker-alt"></i>
                                <p>İzmir, Türkiye</p>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <a href="mailto:bakmaklazim@hotmail.com">bakmaklazim@hotmail.com</a>
                            </li>
                        </ul>
                    </div>
                    {{--
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
                    --}}
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="copyright m-0 text-center">© {{ date('Y') }} All Rights Reserved By <a href="{{ route('index') }}" class="text_default">{{ env('APP_NAME') }}</a>.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="javascript:void(0);" class="scrollup" style="display: none;"><i class="fas fa-chevron-up"></i></a>
