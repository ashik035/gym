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
                                            <div class="box-entry post_box">
                                                @if ( $post->type == 'image' )
                                                    <img style="height:200px; width=270px" src="{{ asset("storage/images/post/$post->media") }}" alt="post">
                                                @elseif ( $post->type == 'video' )
                                                    <video width=270 height=200 controls autoplay muted>
                                                        <source src="{{ asset("storage/videos/post/$post->media")}}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <iframe width="270" height="200" src="{{ $post->media }}" frameborder="0" allowfullscreen></iframe>
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
    </div>
@endsection
