@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-5 mt-4 text-center">
            <div class="pull-left">
                <h2> Showing Post Details</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <table class="table table-striped table-dark w-100 ">
                <thead>
                    <tr>
                        <th scope="col" class="text-white">Type</th>
                        <th scope="col" class="text-white">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col" class="text-white">Title</td>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Type</td>
                        <td>{{ $post->type }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Details</td>
                        <td>{{ $post->details }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Media</td>
                        <td scope="col" class="text-white">
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection