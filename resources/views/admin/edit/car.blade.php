@extends('layouts.app')

@section('content')
{{  Form::open(array('route' => array('cars.update', $data->vinNo), 'method' => 'post'))    }}
    {{  Form::token()   }}
    {{ method_field('PUT') }}
    @foreach ($data->toArray() as $column => $value)
            <input type="hidden" name="_method" value="PUT">
            <div>
                <label for="{{$column}}">{{$column}}</label><br>
            </div>
            <input type="text" id="{{$column}}" name="{{$column}}" value="{{$value}}">
    @endforeach
        <div>
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
        </form>
{{  Form::close() }}

@endsection

