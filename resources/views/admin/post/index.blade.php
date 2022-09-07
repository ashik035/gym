@extends('admin.layouts.admin')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Post</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid mt-5">
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Post Lists</h2>
                </div>
                <div class="pull-right pb-2">
                    <a class="btn btn-success" href="{{ route('post.create') }}"> Create New Post</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Type</th>
                <th>Details</th>
                <th>Media</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->type }}</td>
                <td>{{ $post->details }}</td>
                <td>
                    @if ( $post->type == 'image' )
                        <img src="{{ asset("storage/images/post/$post->media") }}" height="150px" width="250px" alt="post">
                    @elseif ( $post->type == 'video' )
                        <video width="250" height="180" controls>
                            <source src="{{ asset("storage/videos/post/$post->media")}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <iframe width="250" height="180" src="{{ $post->media }}" frameborder="0" allowfullscreen></iframe>
                    @endif
                </td>
                <td>
                    <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('post.show',$post->id) }}">Show</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="row">
            <div class="d-flex mb-5">
                <div class="mx-auto">
                    {{$posts->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $('#successMessage').fadeOut();
            }, 3000);
        });
    </script>
@endsection