@extends('layouts.app')

@section('content')




<div class="container">
        <style>
        /* Set the height and width of the map container */
        #map {
        height: 600px;
        width: 50%;
        }
        </style>
        <div id="map"></div>
</div>

<script type="text/javascript">
    // Initialize and display the map
    let map;

    async function initMap() {

        const position = {lat: {{$space->latitude}}, lng: {{$space->longitude}}};
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");


        map = new Map(document.getElementById("map"), {
            center: {lat: 40.554651780371145, lng: -111.89301195749745},
            zoom: 18,
            mapTypeId: 'satellite' // Set the map type to satellite view
        });
        // The marker, positioned at Uluru
        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
            title: 'test'
        });
        console.log("init")
    }
    
    initMap();
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoLVBpyaKrV9QpoOpC-5GANzwO254w_mM&callback=initMap" async defer></script>
@endsection