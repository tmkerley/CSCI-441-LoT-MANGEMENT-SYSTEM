@extends('layouts.app')

@section('content')

<b>User ID: {{$data->id}}</b>
{{  Form::open(array('route' => array('users.update', $data->id), 'method' => 'post'))    }}
    {{  Form::token()   }}
    {{ method_field('PUT') }}
    @foreach ($data->toArray() as $column => $value)
        @if ($column !== 'remember_token' && 
             $column !== 'status' &&
             $column !== 'created_at' &&
             $column !== 'updated_at' &&
             $column !== 'password' &&
             $column !== 'email_verified_at' &&
             $column !== 'id')
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
