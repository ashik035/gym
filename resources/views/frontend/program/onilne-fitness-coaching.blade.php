@extends('layouts.app')

@section('content')
    <div class="wrap-body">
        <div class="one-on-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pb-4 text-center">
                        <h2>Online Fitness Coaching for General</h2>
                    </div>
                    <div class="col-md-12 text-center">
                        <h4>Customize Workout Diet, Diet Plan, Weekly Check-in, 2 Consultation Session</h4>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-3 text-center monthly-package">
                        <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="/images/6.jpg" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">1 Month Package</h5>
                              <ul>
                                <li class="card-text">1 Month- <span>5000 tk</span></li>
                              </ul>
                              <a href="#" class="btn btn-primary">More Package</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3 text-center pl-4 yearly-package">
                        <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="/images/6.jpg" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">3 Month Package</h5>
                              <ul>
                                <li class="card-text">3 Month- <span>12000 tk</span></li>
                              </ul>
                              <a href="#" class="btn btn-primary">More Package</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3 text-center yearly-package">
                        <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="/images/6.jpg" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">6 Month Package</h5>
                              <ul>
                                <li class="card-text">6 Month- <span>22000 tk</span></li>
                              </ul>
                              <a href="#" class="btn btn-primary">More Package</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3 text-center yearly-package">
                        <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="/images/6.jpg" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">1 Yearly Package</h5>
                              <ul>
                                <li class="card-text">1 Year- <span>40000 tk</span></li>
                              </ul>
                              <a href="#" class="btn btn-primary">More Package</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>


        <!--////////////////////////////////////Footer-->
        <footer>
            <div class="zerogrid wrap-footer">
                <div class="row">
                    <div class="col-1-4 col-footer-1">
                        <div class="wrap-col">
                            <h3 class="widget-title">About Me</h3>
                            <p>Professional & personal fitness trainer,to assist clients in all fitness levels to get into shape & achieve goal.  <br>I offer clients with customized meal plan,workout program,supplement guideline<br>& progress monitoring for achieving the perfect desired shape!
                        </div>
                    </div>
                    <div class="col-1-4 col-footer-2">
                        <div class="wrap-col">
                            <h3 class="widget-title">Recent Post</h3>
                            <ul>
                                <li><a href="#">BEST WORKOUT VIDEOS</a></li>
                                <li><a href="#">5 WAYS TO BE FIT</a></li>
                                <li><a href="#">HOW TO START</a></li>
                                <li><a href="#">SUPPLEMENTS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-1-4 col-footer-3">
                        <div class="wrap-col">
                            <h3 class="widget-title">Tag Cloud</h3>
                            <a href="#">trainer</a>
                            <a href="#">workout</a>
                            <a href="#">countries</a>
                            <a href="#">healthy</a>
                            <a href="#">food</a>
                            <a href="#">home</a>
                            <a href="#">traing</a>
                            <a href="#">photo</a>
                            <a href="#">fit</a>
                            <a href="#">law</a>
                            <a href="#">fitness</a>
                            <a href="#">skate</a>
                            <a href="#">scholl</a>
                            <a href="#">video</a>
                            <a href="#">travel</a>
                            <a href="#">images</a>
                            <a href="#">gym</a>
                        </div>
                    </div>
                    <div class="col-1-4 col-footer-4">
                        <div class="wrap-col">
                            <h3 class="widget-title">Where to Find Me</h3>
                            <div class="row">
                                <address>
                                    <strong>sector 4, Uttara,</strong>
                                    <br>
                                    Dhaka
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="zerogrid wrapper">
                    Copyright @ AB Shiddique Fitness - Designed by <a href="https://www.abshiddique.com">AB</a></a>
                    <ul class="quick-link">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <!-- carousel -->
        <script src="{{ asset('js/owl-carousel/owl.carousel.js') }}"></script>
        <script>
        $(document).ready(function() {
            $("#owl-slide").owlCarousel({
            autoPlay: 3000,
            items : 1,
            itemsDesktop : [1199,1],
            itemsDesktopSmall : [979,1],
            itemsTablet : [768, 1],
            itemsMobile : [479, 1],
            navigation: true,
            navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
            pagination: false
            });
        });
        </script>
    </div>
@endsection
