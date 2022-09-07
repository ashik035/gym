@extends('admin.layouts.admin')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Banner</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Banner</li>
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
                    <h2>Banner Lists</h2>
                </div>
                <div class="pull-right pb-2">
                    <a class="btn btn-success" href="{{ route('banner.create') }}"> Create New banner</a>
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
                <th>Header</th>
                <th>Sub Header</th>
                <th>Image</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td>{{ $banner->header }}</td>
                <td>{{ $banner->sub_header }}</td>
                <td><img src={{ asset("storage/images/banner/$banner->image") }} height="100px" width="100px" alt="banner"></td>
                <td>
                    <form action="{{ route('banner.destroy',$banner->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('banner.edit',$banner->id) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('banner.show',$banner->id) }}">Show</a>
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
                    {{$banners->links("pagination::bootstrap-4")}}
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