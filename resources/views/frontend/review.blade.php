@extends('layouts.app')

@section('content')
    <div class="wrap-body">
        <section id="container">
          <div class="wrap-container">
            <!-----------------Content-Box-------------------->
            <section class="content-box zerogrid">
              <div class="row wrap-box"><!--Start Box-->
                <h3 class="t-center" style="font-size: 30px;margin: 10px 0 30px">Share a review</h3>
                <div id="contact_form">
                  <form action="{{ route('review.post') }}" name="form1" id="ff" method="POST">
                      @csrf
                    <label class="row">
                      <div class="col-1-3">
                        <div class="wrap-col">
                          <input type="text" name="name" id="name" placeholder="Enter name" required="required" />
                        </div>
                      </div>
                      <div class="col-1-3">
                        <div class="wrap-col">
                          <input type="email" name="email" id="email" placeholder="Enter email" required="required" />
                        </div>
                      </div>
                      <div class="col-1-3">
                        <div class="wrap-col">
                          <input type="text" name="subject" id="subject" placeholder="Subject" required="required" />
                        </div>
                      </div>
                    </label>
                    <label class="row">
                      <div class="wrap-col">
                        <textarea name="details" id="details" class="form-control" rows="4" cols="25" required="required"
                        placeholder="Details"></textarea>
                      </div>
                    </label>
                    <div class="text-center">
                      <button class="btn sendButton" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </section>

          </div>
      </section>
    </div>
@endsection
