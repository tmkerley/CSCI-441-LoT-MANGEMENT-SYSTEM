@extends('layouts.app')

@section('content')

{{  Form::open(array('route' => array('spaces.create'), 'method' => 'post'))    }}
    {{  Form::token()   }}
            <div>
                <label for="latitude">latitude</label><br>
            </div>
            <input type= "text" id="latitude" name="latitude">
            <div>
                <label for="longitude">longitude</label><br>
            </div>
            <input type="text" id="longitude" name="longitude">

        <div>
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
{{  Form::close() }}

@endsection