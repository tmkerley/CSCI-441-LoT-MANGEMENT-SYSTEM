@extends('layouts.app')

@section('content')

<b>Space No: {{$data->id}}</b>
{{  Form::open(array('route' => array('spaces.update', $data->id), 'method' => 'post'))    }}
    {{  Form::token()   }}
    {{ method_field('PUT') }}
    @foreach ($data->toArray() as $column => $value)
        @if ($column !== 'id' && $column !== 'status')
            <input type="hidden" name="_method" value="PUT">
            <div>
                <label for="{{$column}}">{{$column}}</label><br>
            </div>
            <input type="text" id="{{$column}}" name="{{$column}}" value="{{$value}}">
        @endif
    @endforeach
        <div>
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
        </form>
{{  Form::close() }}

@endsection
