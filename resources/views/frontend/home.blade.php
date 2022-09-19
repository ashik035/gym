@extends('layouts.app')

@section('content')
    <div class="wrap-body">
        <header>
            <div id="owl-slide" class="owl-carousel">
                @foreach ($banners as $banner)
                    <div class="item">
                        <img src="{{ asset("storage/images/banner/$banner->image") }}" />
                        <!-- Static Header -->
                        <div class="header-text hidden-xs">
                            <div class="col-md-12 text-left">
                                <h1>{{ $banner->header }}</h1>
                                <p>{{ $banner->sub_header }}</p>
                                <a class="button" href="/">Let's Start!</a>
                            </div>
                        </div><!-- /header-text -->
                    </div>
                @endforeach
            </div>
        </header>
        <!--////////////////////////////////////Container-->
        <section id="container">
            <div class="wrap-container">
                <!-----------------content-box-about-------------------->
                <section class="content-box box-about">
                    <div class="zerogrid">
                        <div class="wrap-box"><!--Start Box-->
                            <div class="box-header">
                                <h2>What'll You Get</h2>
                            </div>
                            <div class="box-content">
                                <p>Professional & personal fitness trainer,to assist clients in all fitness levels to get into shape & achieve goal.  <br>I offer clients with customized meal plan,workout program,supplement guideline<br>& progress monitoring for achieving the perfect desired shape!<p>
                    </div>
                </section>
                <!-----------------content-box-main-------------------->
                <section class="content-box box-main">
                    <div class="zerogrid">
                        <div class="wrap-box"><!--Start Box-->
                            <div class="row">
                                @if (isset($posts) && $posts != '')
                                    @foreach ($posts as $post)
                                    <div class="col-1-3">
                                        <div class="wrap-col">
                                            <div class="box-entry">
                                                @if ( $post->type == 'image' )
                                                    <img style="height:200px; width=287px" src="{{ asset("storage/images/post/$post->media") }}" alt="post">
                                                @elseif ( $post->type == 'video' )
                                                    <video width=287 height=200 controls autoplay muted>
                                                        <source src="{{ asset("storage/videos/post/$post->media")}}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <iframe width="287" height="200" src="{{ $post->media }}" frameborder="0" allowfullscreen></iframe>
                                                @endif
                                                <div class="entry-details">
                                                    <div class="entry-meta ">
                                                        <span>{{$post->category}}</span>
                                                        <div class="f-right t-right">
                                                            <span><i class="fa fa-calendar"></i> {{$post->created_at->format('d/m/Y')}} </span>
                                                        </div>
                                                    </div>
                                                    <div class="entry-des">
                                                        <h3>{{$post->title}}</h3>
                                                        <p>{{$post->details}}</p>
                                                    </div>
                                                    <a class="button" href="#app">Start Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </section>
        <!--////////////////////////////////////Footer-->
        <footer>
            <div class="zerogrid wrap-footer">
                <div class="row">
                    <div class="col-1-4 col-footer-1">
                        <div class="wrap-col">
                            <h3 class="widget-title">About Me</h3>
                            <p>{{ $about_me }}</p>
                        </div>
                    </div>
                    <div class="col-1-4 col-footer-2">
                        <div class="wrap-col">
                            <h3 class="widget-title">Recent Post</h3>
                            <ul>
                                <li><a href="#">BEST WORKOUT VIDEOS</a></li>
                                <li><a href="#">5 WAYS TO BE FIT</a></li>
                                <li><a href="#">HOW TO START</a></li>
                                <li><a href="#">SUPPLEMENTS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-1-4 col-footer-3">
                        <div class="wrap-col">
                            <h3 class="widget-title">Tag Cloud</h3>
                            <a href="#">trainer</a>
                            <a href="#">workout</a>
                            <a href="#">countries</a>
                            <a href="#">healthy</a>
                            <a href="#">food</a>
                            <a href="#">home</a>
                            <a href="#">traing</a>
                            <a href="#">photo</a>
                            <a href="#">fit</a>
                            <a href="#">law</a>
                            <a href="#">fitness</a>
                            <a href="#">skate</a>
                            <a href="#">scholl</a>
                            <a href="#">video</a>
                            <a href="#">travel</a>
                            <a href="#">images</a>
                            <a href="#">gym</a>
                        </div>
                    </div>
                    <div class="col-1-4 col-footer-4">
                        <div class="wrap-col">
                            <h3 class="widget-title">Where to Find Me</h3>
                            <div class="row">
                                <address>
                                    <strong>sector 4, Uttara,</strong>
                                    <br>
                                    Dhaka
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="zerogrid wrapper">
                    Copyright @ AB Shiddique Fitness - Designed by <a href="/">AB</a></a>
                    <ul class="quick-link">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <!-- carousel -->
        <script src="{{ asset('js/owl-carousel/owl.carousel.js') }}"></script>
        <script>
        $(document).ready(function() {
            $("#owl-slide").owlCarousel({
            autoPlay: 3000,
            items : 1,
            itemsDesktop : [1199,1],
            itemsDesktopSmall : [979,1],
            itemsTablet : [768, 1],
            itemsMobile : [479, 1],
            navigation: true,
            navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
            pagination: false
            });
        });
        </script>
    </div>
@endsection
