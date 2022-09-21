@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-4 text-center">
        <div class="pull-left">
            <h2>Edit Blog</h2>
        </div>
    </div>
</div>

<form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Blog Title:</strong>
                <input type="text" class="form-control" value="{{ old('title').@$blog->title }}" name="title">
                @if ($errors->has('title'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 offset-md-2 offset-xs-2 offset-sm-2">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="details" placeholder="">{{ old('details').@$blog->details }}</textarea>
                @if ($errors->has('details'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('details') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 offset-md-2 offset-xs-2 offset-sm-2 mb-3">
            <div class="form-group">
                <strong>Current Image: </strong>
                <td><img src={{ asset("storage/images/blog/$blog->image") }} height="80px" width="80px" alt="blog"></td>
                <input type="hidden" name="current_image" value="{{ $blog->image }}">
            </div>
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image">
            </div>
            @if ($errors->has('image'))
                <span role="alert">
                    <strong class="text-danger">{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center offset-md-2 offset-xs-2 offset-sm-2 mar">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection