@extends('layouts.app')

@section('content')

@foreach ($cars as $car)
    <h1> {{$car}}</h1>
@endforeach


@endsection
