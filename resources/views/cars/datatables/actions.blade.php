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
</style>

<a href='map/{{ $space_id }}' class="link-warning"> Show on Map </a>

@if ($isBeingMoved == 0 )

    <form method="POST" action= 'cars/registerMove/{{$vinNo}}'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type='hidden' name='carId' value='{{$vinNo}}'>
                    <input type='submit' value='Move Car'>
    </form>
@endif 

@if ($isBeingMoved == 1 )
    <form method="POST" action= 'cars/registerPark/{{ $vinNo }}'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type='hidden' name='carId' value='{{$vinNo}}'>
                    <input type='hidden' name='spaceId' value='{{$space_id}}'>
                    <input type='submit' value='Park Car'>
    </form>
@endif 