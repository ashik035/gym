@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-5 mt-4 text-center">
            <div class="pull-left">
                <h2> Showing Course Details</h2>
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
                        <td scope="col" class="text-white">Menu Name</td>
                        <td>{{ $course->menu_name }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Sub Menu Name</td>
                        <td>{{ $course->sub_menu }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Course Name</td>
                        <td>{{ $course->name }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Price</td>
                        <td>{{ $course->price }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">duration</td>
                        <td scope="col" class="text-white">
                            {{ $course->duration }} months
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection