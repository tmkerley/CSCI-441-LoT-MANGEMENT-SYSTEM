@extends('layouts.app')

<style>

    

</style>

@section('content')

<div class="container">
    <b>Choose an empty Space</b>
    <div class="container" id="parking">
        @foreach ($spaces as $space)
                <form method="POST" action= '{{ $space->id}}'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type='hidden' name='carId' value='{{$car->vinNo}}'>
                    <input type='hidden' name='spaceId' value='{{$space->id}}'>
                    <input type='submit' value='{{$space->id}}'>
                </form>
        @endforeach
    </div>
</div>
@endsection
