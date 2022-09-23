@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-5 mt-4 text-center">
            <div class="pull-left">
                <h2> Showing Course Request Details</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-5">
            <table class="table table-striped table-dark w-100 mb-5">
                <thead>
                    <tr>
                        <th scope="col" class="text-white">Type</th>
                        <th scope="col" class="text-white">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col" class="text-white">Order Id</td>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Course Id</td>
                        <td>{{ $order->course_id }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Course Menu</td>
                        <td>{{ $course->menu_name }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Course Sub Menu</td>
                        <td>{{ $course->sub_menu }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Course Name</td>
                        <td>{{ $course->name }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Person Name</td>
                        <td>{{ $order->person_name }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Email</td>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Peronal Mobile Number</td>
                        <td>{{ $order->mobile }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Bkash Number</td>
                        <td>{{ $order->bkash_number }}</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Course Enrollment Charge</td>
                        <td>{{ $course->price }} BDT</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Total Course Charge (With Bkash Cost)</td>
                        <td>{{ $cost }} BDT</td>
                    </tr>
                    <tr>
                        <td scope="col" class="text-white">Paid By the user Via Bkash</td>
                        <td>{{ $order->paid_amount }} BDT</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection