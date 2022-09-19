@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-4 text-center">
        <div class="pull-left">
            <h2>Edit Course</h2>
        </div>
    </div>
</div>

<form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Menu Name:</strong>
                <select class="form-control" name="menu_name" id="menu_name">
                    <option value="">Select a Menu</option>
                    @foreach ($menues as $menu)
                        @if ($menu->menu != 'SHOP')
                            <option value="{{$menu->menu}}" <?php echo (old('menu_name').@$course->menu_name == $menu->menu) ? 'selected' : '' ?> >{{$menu->menu}}</option>
                        @endif
                    @endforeach
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
                <strong>Sub Menu Name:</strong>
                <select class="form-control" name="sub_menu" id='sub_menu'>
                    <option value="">Select a Sub Menu</option>
                    @foreach ($sub_menues as $sub_menu)
                            <option value="{{$sub_menu}}" <?php echo (old('sub_menu').@$course->sub_menu == $sub_menu) ? 'selected' : '' ?> >{{$sub_menu}}</option>
                    @endforeach
                </select>
                @if ($errors->has('sub_menu'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('sub_menu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" class="form-control" value="{{ old('name').@$course->name }}" name="name"/>
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
                <input type="text" class="form-control" value="{{ old('included').@$course->included }}" placeholder="Add comma to add more features" name="included" id="included">
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
                <input type="number" class="form-control" value="{{ old('price').@$course->price }}" name="price"/>
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
                <input type="number" class="form-control" value="{{ old('duration').@$course->duration }}" name="duration"/>
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

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        var menu =  $( "#menu_name" ).val();
        var subs = ['One-on-One Training','Online Fitness Coaching for General','PCOS(Poly-Cystic Ovarian Syndrome)','Heart Disease Diabetes Arthritis','Exercise and Diet For Older Adults','Customize Diet Plan','Customize Workout Diet','3 Days In a Week']
        if (menu != ''){
                if (menu == 'PROGRAM') {
                    for (let i = 0; i < subs.length; i++) {
                        if (i == 7) {
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", true);
                        } else {
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", false);
                        }
                    }
                } else {
                    for (let i = 0; i < subs.length; i++) {
                        if (i == 7) {
                            console.log(i)
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", false);
                        } else {
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", true);
                        }
                    }
                }
            }
        $('#menu_name').on('change', function() {
            var menu =  $( "#menu_name" ).val();
            var subs = ['One-on-One Training','Online Fitness Coaching for General','PCOS(Poly-Cystic Ovarian Syndrome)','Heart Disease Diabetes Arthritis','Exercise and Diet For Older Adults','Customize Diet Plan','Customize Workout Diet','3 Days In a Week']
            if (menu != ''){
                if (menu == 'PROGRAM') {
                    for (let i = 0; i < subs.length; i++) {
                        if (i == 7) {
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", true);
                        } else {
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", false);
                        }
                    }
                } else {
                    for (let i = 0; i < subs.length; i++) {
                        if (i == 7) {
                            console.log(i)
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", false);
                        } else {
                            $('#sub_menu option[value="'+subs[i]+'"]').attr("hidden", true);
                        }
                    }
                }
            }
        });
    });
</script>