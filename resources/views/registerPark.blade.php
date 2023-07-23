<div class="container">
    <style>
        /* Set the height and width of the map container */
        #map {
        height: 250px;
        width: 250px;
        }
        #mapcard {
            height: 300px;
            weidth: 300px;
        }
    </style>

    @foreach ($spaces as $space)
        <div class= container id="mapcard">
            <div class="container">
                <div id="map">
                </div>
            </div>

            <script type="text/javascript">
                // Initialize and display the map
                let map;

                async function initMap() {

                    // Will have to enter this manually for all fake data. Will pull from space 
                    const position = {lat: {{$space->latitude}}, lng: {{$space->longitude}}};

                    //object lat/long associated with car object in the same row as the link on the cars page
                    const { Map } = await google.maps.importLibrary("maps");                   
                    const { Marker } = await google.maps.importLibrary("marker");


                    map = new Map(document.getElementById("map"), {
                        center: {lat: 40.554651780371145, lng: -111.89301195749745},
                        zoom: 18,
                        // Set the map type to satellite view
                        mapTypeId: 'satellite' 
                    });

                    // The marker, positioned at center of frame
                    const marker = new Marker({
                        map: map,
                        position: position,
                        title: 'Dealership'
                    });
                }
                
                initMap();
            </script>

            <script type="text/javascript" src=
            "https://maps.googleapis.com/maps/api/js?key=AIzaSyAoLVBpyaKrV9QpoOpC-5GANzwO254w_mM&callback=initMap" async defer>
            </script>
            <form method="POST" action= '{{ $space->id}}'>
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <input type='hidden' name='carId' value='{{$car->vinNo}}'>
                            <input type='hidden' name='spaceId' value='{{$space->id}}'>
                            <input type='submit' value='{{$space->id}}'>
            </form>
        </div>
    @endforeach
</div>
