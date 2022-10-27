@extends('layouts.app')

@section('content')
    <div class="single-page">
        <section id="container">
			<div class="wrap-container">
                <div class="crumbs text-center">
					<h2>Explore the latest Blogs</h2>
				</div>
				<!-----------------Content-Box-------------------->
				<div id="main-content">
					<div class="wrap-content">
						<div class="row">
                            @foreach ($blogs as $blog)
                                <article class="single-post zerogrid blog-zerogrid">
                                    <div class="row wrap-post"><!--Start Box-->
                                        <div class="entry-header">
                                            <span class="time">{{$blog->created_at->format('M d, Y')}}  by Shiddique</span>
                                            <h2 class="entry-title">{{$blog->title}}</h2>
                                        </div>
                                        <div class="post-thumbnail-wrap">
                                            <img src="{{ asset("storage/images/blog/$blog->image") }}" alt="post">
                                        </div>
                                        <div class="entry-content">
                                            <p>{{$blog->details}}</p>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
@endsection
