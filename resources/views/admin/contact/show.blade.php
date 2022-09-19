@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-5 mt-4 text-center">
            <div class="pull-left">
                <h2> Showing Banner Details</h2>
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
                        <td scope="col" class="text-white">Header</td>
                        <td>{{ $banner->header }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Sub Header</td>
                        <td>{{ $banner->sub_header }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Image</td>
                        <td scope="col" class="text-white"><img src={{ asset("storage/images/banner/$banner->image") }} height="200px" width="200px" alt="banner"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection