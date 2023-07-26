@extends('layouts.app')

@section('content')

{{  Form::open(array('route' => array('cars.create'), 'method' => 'post'))    }}
    {{  Form::token()   }}
            <div>
                <label for="vinNo">Vin Number</label><br>
            </div>
            <input type= "text" id="vinNo" name="vinNo">
            <div>
                <label for="make">Make</label><br>
            </div>
            <input type="text" id="make" name="make">
            <div>
                <label for="model">model</label><br>
            </div>
            <input type="text" id="model" name="model">
            <div>
                <label for="year">year</label><br>
            </div>
            <input type="text" id="year" name="year">
        <div>
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
{{  Form::close() }}

@endsection