@extends('admin.layouts.admin')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Product Order List</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product Order List</li>
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
                    <h2>Product Ordered Lists</h2>
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
                <th>Product</th>
                <th>Person</th>
                <th>Bkash</th>
                <th>Paid</th>
                <th>Mobile</th>
                <th>Quantity</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->product_id }}</td>
                <td>{{ $order->person_name }}</td>
                <td>{{ $order->bkash_number }}</td>
                <td>{{ $order->paid_amount }} Tk</td>
                <td>{{ $order->mobile }}</td>
                <td>{{ $order->product_amount }} </td>
                <td>
                    <form action="{{ route('product.order.destroy',$order->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('product.order.show',$order->id) }}">Show</a>
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
                    {{$orders->links("pagination::bootstrap-4")}}
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