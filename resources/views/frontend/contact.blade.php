@extends('layouts.app')

@section('content')
    <div class="wrap-body">
        <section id="container">
			<div class="wrap-container">
				<!-----------------Content-Box-------------------->
				<section class="content-box zerogrid">
					<div class="row wrap-box"><!--Start Box-->
						<h3 class="t-center" style="font-size: 30px;margin: 10px 0 30px">Contact Form</h3>

						<!--Start Map-->
						<div id="map" style="height: 450px;"></div>
						<!--End Map-->

						<div id="contact_form">
                            <form action="{{ route('contact.post') }}" name="form1" id="ff" method="POST" >
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
										<textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required"
										placeholder="Message"></textarea>
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
    	<!-- Google Map -->
	<script>
        var marker;
        var image = 'images/map-marker.png';
        function initMap() {
          var myLatLng = {lat: 23.8624, lng: 90.4043};

          // Specify features and elements to define styles.
          var styleArray = [
            {
              featureType: "all",
              stylers: [
               { saturation: -80 }
              ]
            },{
              featureType: "road.arterial",
              elementType: "geometry",
              stylers: [
                { hue: "#000000" },
                { saturation: 50 }
              ]
            },{
              featureType: "poi.business",
              elementType: "labels",
              stylers: [
                { visibility: "off" }
              ]
            }
          ];

          var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            scrollwheel: false,
             // Apply the map style array to the map.
            styles: styleArray,
            zoom: 7
          });

          var directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
          });

          // Create a marker and set its position.
          marker = new google.maps.Marker({
            map: map,
            icon: image,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: myLatLng
          });
          marker.addListener('click', toggleBounce);
        }

        function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7V-mAjEzzmP6PCQda8To0ZW_o3UOCVCE&callback=initMap" async defer></script>
@endsection
