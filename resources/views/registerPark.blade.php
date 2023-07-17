@foreach ($spaces as $space)
    <form method="POST" action= 'confirmPark/{{ $space->id}}'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type='hidden' name='carId' value='{{$car->vinNo}}'>
                    <input type='hidden' name='spaceId' value='{{$space->id}}'>
                    <input type='submit' value='{{$space->id}}'>
    </form>
@endforeach

