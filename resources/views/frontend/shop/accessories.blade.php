@extends('layouts.app')

@section('content')
    <div class="wrap-body">
        <div class="one-on-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pb-4 text-center mt-5">
                        <h2>All Accessories Products</h2>
                    </div>
                </div>
                <div class="row pt-4">
                    @if( isset($products) && $products != '')
                      @foreach ($products as $product)
                        <div class="col-md-4 text-center monthly-package">
                          <div class="card monthly-card">
                              <img class="card-img-top" src="{{ asset("storage/images/product/$product->image") }}" alt="Card image cap">
                              <div class="card-body">
                                <h2 class="card-title"><strong>{{$product->name}}</strong></h2>
                                <p>{{$product->details}}</p>
                                <div class="foot">
                                  <h4 class="price_product"><strong>Price: {{$product->price}} BDT</strong></h4>
                                  <a class="product_button" data-backdrop="static" data-keyboard="false" id="buy_button" data-id="modal" data-toggle="modal" data-id="{{(string)$product->id . ',' . (string)$product->price}}" data-target="#productModal">Buy Now</a>
                                </div>
                              </div>
                            </div>
                        </div>
                      @endforeach
                    @endif
                </div>
                <!-- Modal -->
                <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buy Product Now</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div id="alert-success" class="alert alert-success alert-solid alert-dismissible shadow-sm p-3 mb-5 rounded"
                            role="alert">
                        </div>
                        <div id="alert-danger" class="alert alert-danger alert-solid alert-dismissible shadow-sm p-3 mb-5 rounded"
                            role="alert">
                        </div>
                        @if (session()->has('failed'))
                          <div class="alert alert-danger alert-solid alert-dismissible shadow-sm p-3 mb-5 rounded"
                              role="alert">
                              {{ session('failed') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                        <form id="product_form" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="person_name" placeholder="Enter Name">
                          </div>
                          <input type="hidden" id="modal_product_id" name="product_id" value="">
                          <input type="hidden" id="modal_product_price" value="">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"  aria-describedby="emailHelp" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="product_amount">Product Amount</label>
                            <input type="number" class="form-control" id="product_amount" name="product_amount" placeholder="product amount">
                          </div>
                          <div class="form-group" id="calculation_div">
                            <p class="text-success"><strong> You have to pay <span  class="text-danger" id="calculate"></span> taka by Bkash</strong></p>
                          </div>
                          <div class="form-group">
                            <p><strong> Please Send Money before submit this to this bkash Number <br> (01778-555444). Admin will call you shortly to your given contact number. </strong></p>
                          </div>
                          <div class="form-group">
                            <label for="paid_amount">Paid Amount</label>
                            <input type="number" class="form-control" id="paid_amount" name="paid_amount" placeholder="paid amount">
                          </div>
                          <div class="form-group">
                            <label for="mobile">Personal Mobile Number</label>
                            <input type="number" class="form-control" id="name" name="mobile" placeholder="Personal Contact Number">
                          </div>
                          <div class="form-group">
                            <label for="bkash_number">Bkash Number</label>
                            <input type="number" class="form-control" id="bkash_number" name="bkash_number" placeholder="Bkash Number">
                          </div>
                          <div class="form-check">
                            <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label mt-0" for="exampleCheck1">I have sent money via Bkash</label><br><br>
                            <span id='alert-last' class="text-danger">Please Provide all input field data to enable Submit Button</span>
                          </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="button" class="btn front-btn" id='form_submit'>Submit</button>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
                @if ($count > 3)
                  <div class="row">
                    <div class="d-flex mb-5">
                        <div class="mx-auto">
                          {{$products->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                  </div>
                @endif
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $( document ).ready(function() {
      $('#calculate').text('')
      $('#calculation_div').hide()
      $('#alert-last').hide();
      $('#alert-success').hide();
      $('#alert-danger').hide();
      $('button[data-toggle=modal]').on('click', function() {
        $('form#product_form').trigger("reset");
        $('#calculation_div').hide()
        var data = $(this).data('id');
        console.log(data)
        values=data.split(',');
        one=values[0];
        two=values[1];
        $("#modal_product_id").val(one);
        $("#modal_product_price").val(two);
      });
      $('#product_amount').on('keyup', function() {
          var val =  $('#product_amount').val()
          if (val > 0) {
            var price = $('#modal_product_price').val()
            console.log('price: ' + price)
            total = price * val
            total = (total/1000) * 20 + total
            $('#calculation_div').show()
            $('#calculate').text(total)
          }
      });

      $('#form_submit').on('click', function() {
        function getFormData(dom_query){
            var out = {};
            var s_data = $(dom_query).serializeArray();
            //transform into simple data/value object
            for(var i = 0; i<s_data.length; i++){
                var record = s_data[i];
                out[record.name] = record.value;
            }
            return out;
        }
        var formData = getFormData('#product_form');
        console.log(formData);
        // console.log('formData: ' + myData)
        if (formData.person_name != '' && formData.product_amount != '' && formData.product_id != '' && formData.paid_amount != '' && formData.mobile != '' && formData.email != '' && formData.bkash_number != '' && ((formData.check) && formData.check == 'on')){
          $('#alert-last').hide();

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            type:'PUT',
            url:"{{ route('product.buy') }}",
            data:{person_name:formData.person_name, product_id:formData.product_id, product_amount:formData.product_amount, paid_amount:formData.paid_amount, mobile:formData.mobile, email:formData.email, bkash_number:formData.bkash_number},
            success:function(data){
              if (data.success) {
                $('#alert-danger').hide()
                $('#alert-success').text(data.success)
                $('#alert-success').show().delay(5000).fadeOut();
                setInterval(function () {
                  $("#productModal .close").click();
                }, 5000);
              } else {
                $('#alert-success').hide()
                $('#alert-danger').text(data.danger)
                $('#alert-danger').show().delay(5000).fadeOut();
              }
            }
          });

        } else {
          $('#alert-last').show();
        }
      });
  });
</script>
