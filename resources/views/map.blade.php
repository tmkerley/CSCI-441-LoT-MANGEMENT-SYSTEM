@extends('layouts.app')

@section('content')
<div class="container">
    <div id="map" class="row justify-content-center">
        <style>
        /* Set the height and width of the map container */
        #map {
        height: 600px;
        width: 50%;
        }
    </style>
    <!-- Map container -->
    <div id="map">test</div>

    <!-- Include the Google Maps API script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl8gRTJ0813a2ptI5ZaGSQopmRRIfhfLo&callback=initMap" async defer></script>

    <script>
        // Initialize and display the map
        function initMap() {
            /*
            // Specify the coordinates of the location
            //  Example car location coordinates
            var location = {lat: 40.554375104615126, lng: -111.89389577685698}; 
            */
            // Create a map object and set the center and zoom level
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 40.554651780371145, lng: -111.89301195749745},
                zoom: 18,
                mapTypeId: 'satellite' // Set the map type to satellite view
            });

            // Create a marker to represent the location
            var marker = new google.maps.Marker({
                position: $location,
                map: map,
                title: 'Car Location'
            });
        }
    </script>
    </div>
</div>
@endsection