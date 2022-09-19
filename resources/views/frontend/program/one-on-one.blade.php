@extends('layouts.app')

@section('content')
    <div class="wrap-body">
        <div class="one-on-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pb-4 text-center">
                        <h2>One-on-One Training</h2>
                    </div>
                    <div class="col-md-12 text-center">
                        <h4>One-on-One Training (3 Days in Week)- 25K per month (Limited Slot)</h4>
                    </div>
                    <div class="col-md-12 text-center">
                        <h4>One-on-One Training (2 Days in Week)- 20K per month (Limited Slot)</h4>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-3 text-center monthly-package">
                        <div class="card" style="width: 15rem;">
                            <h3>Package Type</h3>
                            <div class="card-body">
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                              <h5 class="card-title">1 Month Package</h5>
                                </div>
                              <ul>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Duration</span></li>
                                </div>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Price</span></li>
                                </div>
                              </ul>
                              <h6 style="margin-top: 20px">1 Month = 500 tk</h6>
                              <a id="myBtn" style="margin-top: 60px" href="#" class="btn btn-primary">More Package</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3 text-center monthly-package">
                        <div class="card" style="width: 15rem;">
                            <h3>Package Type</h3>
                            <div class="card-body">
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                              <h5 class="card-title">1 Month Package</h5>
                                </div>
                              <ul>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Duration</span></li>
                                </div>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Price</span></li>
                                </div>
                              </ul>
                              <h6 style="margin-top: 20px">1 Month = 500 tk</h6>
                              <a id="myBtn" style="margin-top: 60px" href="#" class="btn btn-primary">More Package</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3 text-center monthly-package">
                        <div class="card" style="width: 15rem;">
                            <h3>Package Type</h3>
                            <div class="card-body">
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                              <h5 class="card-title">1 Month Package</h5>
                                </div>
                              <ul>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Duration</span></li>
                                </div>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Price</span></li>
                                </div>
                              </ul>
                              <h6 style="margin-top: 20px">1 Month = 500 tk</h6>
                              <a id="myBtn" style="margin-top: 60px" href="#" class="btn btn-primary">More Package</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3 text-center monthly-package">
                        <div class="card" style="width: 15rem;">
                            <h3>Package Type</h3>
                            <div class="card-body">
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                              <h5 class="card-title">1 Month Package</h5>
                                </div>
                              <ul>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Duration</span></li>
                                </div>
                                <div class="month-package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                <li class="card-text">Package Price</span></li>
                                </div>
                              </ul>
                              <h6 style="margin-top: 20px">1 Month = 500 tk</h6>
                              <a id="myBtn" style="margin-top: 60px" href="#" class="btn btn-primary">More Package</a>
                            </div>
                            <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content">
                                  <span class="close">&times;</span>
                                  <p>Some text in the Modal..</p>
                                </div>

                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>
    </div>
@endsection
