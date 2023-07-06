@extends('layouts.app')

@section('content')

@foreach ($cars as $car)
    <ul> {{$car}}</ul>
@endforeach


@endsection
