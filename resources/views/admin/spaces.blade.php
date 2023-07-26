@extends('layouts.app')
 
@section('content')
    <div style="margin: auto;
                width: 43.5%;
                padding: 10px;"><a href='create/space' class="link-warning"> <button>Create Space</button> </a></div>
    <div class="container">
        <div class="card">
            <div class="card-header">Admin Spaces</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
