@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-4 text-center">
        <div class="pull-left">
            <h2>Add New Course</h2>
        </div>
    </div>
</div>

<form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Menu Name:</strong>
                <select class="form-control" name="menu_name">
                    <option value="">Select a Menu</option>
                    <option value="program" <?php echo (old('menu_name') == 'program') ? 'selected' : '' ?> >Program</option>
                    <option value="online_live" <?php echo (old('menu_name') == 'online_live') ? 'selected' : '' ?> >Online Live Group Class</option>
                </select>
                @if ($errors->has('menu_name'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('menu_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name"/>
                @if ($errors->has('name'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 offset-md-2 offset-xs-2 offset-sm-2">
            <div class="form-group">
                <strong>Included Features:</strong>
                <textarea class="form-control" style="height:150px" placeholder="Add comma to add more feature" name="included">{{ old('included') }}</textarea>
                @if ($errors->has('included'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('included') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Course Fee:</strong>
                <input type="number" class="form-control" value="{{ old('price') }}" name="price"/>
                @if ($errors->has('price'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Course Duration:</strong>
                <input type="number" class="form-control" value="{{ old('duration') }}" name="duration"/>
                @if ($errors->has('duration'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('duration') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center offset-md-2 offset-xs-2 offset-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection