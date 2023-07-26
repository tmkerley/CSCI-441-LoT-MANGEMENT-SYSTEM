<div class="container">
    <div class=container id="parking">
        @foreach ($spaces as $space)
            <div class=container id="mapcard">
                <form method="POST" action= '{{ $space->id}}'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type='hidden' name='carId' value='{{$car->vinNo}}'>
                    <input type='hidden' name='spaceId' value='{{$space->id}}'>
                    <input type='submit' value='{{$space->id}}'>
                </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
