<style>
a {
    color: white;
}
a:hover {
    color: black;
}

tr {
    color: white;
}

th {
    color: black;
}
</style>

<a href='map/{{ $space_id }}' class="link-warning"> <button>Show on Map</button> </a>
<a href='edit/car/{{ $vinNo }}' class="link-warning"> <button>Edit Car</button> </a>
{{  Form::open(array('route' => array('cars.destroy', $vinNo), 'method' => 'post'))    }}
    {{  Form::token()   }}
    @method('delete')
        <div>
            <button type="submit"> Delete </button>
        </div>
{{  Form::close() }}

@if ($isBeingMoved == 0 )

    <form method="POST" action= 'cars/registerMove/{{$vinNo}}'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type='hidden' name='carId' value='{{$vinNo}}'>
                    <input type='submit' value='Move Car'>
    </form>
@endif 

@if ($isBeingMoved == 1 )
    <form method="GET" action= 'cars/registerPark/{{$vinNo}}'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type='hidden' name='carId' value='{{$vinNo}}'>
                    <input type='hidden' name='spaceId' value='{{$space_id}}'>
                    <input type='submit' value='Park Car'>
    </form>
@endif 