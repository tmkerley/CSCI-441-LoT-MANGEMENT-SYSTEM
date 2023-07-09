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
            center: position,
            zoom: 4,
            mapTypeId: 'satellite'
        });
        // The marker, positioned at Uluru
        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
        });
        console.log("init")
    }
    
    initMap();
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoLVBpyaKrV9QpoOpC-5GANzwO254w_mM&callback=initMap" async defer></script>
@endsection