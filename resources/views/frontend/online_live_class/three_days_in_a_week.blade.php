@extends('layouts.app')

@section('content')
  <div class="wrap-body courseRequest">
      <div class="one-on-one">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 pb-4 mt-3 text-center">
                      <h2>Online Live Class (Three Days in a Week)</h2>
                  </div>
              </div>
              <div class="row pt-4">
                @if (isset($courses) && $courses != '')
                  @foreach ($courses as $course)
                    <div class="{{ $class }} text-center monthly-package">
                      <div class="card">
                        <h2 class="card_title">{{$course->name}}</h2>
                        <p class="pricing">{{$course->price}}৳</p>
                        <hr>
                        @php
                          $includes = explode (",", $course->included);
                        @endphp
                        <ul class="features">
                          @foreach ($includes as $include)
                            <li>{{$include}}</li>
                          @endforeach
                        </ul>
                          <a class="cta_btn" data-backdrop="static" data-keyboard="false" id="buy_button" data-id="{{(string)$course->id . ',' . (string)$course->price}}" data-toggle="modal" data-target="#courseModal">Enroll Now</a>
                      </div>
                    </div>
                  @endforeach
                @endif
                <!-- Modal -->
                <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enroll Course Now</h5>
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
                        <form id="course_form" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="person_name" placeholder="Enter Name">
                          </div>
                          <input type="hidden" id="modal_course_id" name="course_id" value="">
                          <input type="hidden" id="modal_course_price" value="">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"  aria-describedby="emailHelp" placeholder="Enter email">
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
              </div>
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
      $('a[data-toggle=modal]').on('click', function() {
        $('form#course_form').trigger("reset");
        var data = $(this).data('id');
        console.log(data)
        values=data.split(',');
        one=values[0];
        two=values[1];
        $("#modal_course_id").val(one);
        $("#modal_course_price").val(two);
        var val =  1
        var price = $('#modal_course_price').val()
        console.log('price: ' + price)
        total = price * val
        total = (total/1000) * 20 + total
        $('#calculation_div').show()
        $('#calculate').text(total)
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
        var formData = getFormData('#course_form');
        console.log(formData);
        if (formData.person_name != '' && formData.course_id != '' && formData.paid_amount != '' && formData.mobile != '' && formData.email != '' && formData.bkash_number != '' && ((formData.check) && formData.check == 'on')){
          $('#alert-last').hide();

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            type:'PUT',
            url:"{{ route('course.buy') }}",
            data:{person_name:formData.person_name, course_id:formData.course_id, paid_amount:formData.paid_amount, mobile:formData.mobile, email:formData.email, bkash_number:formData.bkash_number},
            success:function(data){
              if (data.success) {
                $('#alert-danger').hide()
                $('#alert-success').text(data.success)
                $('#alert-success').show().delay(5000).fadeOut();
                setInterval(function () {
                  $("#courseModal .close").click();
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

