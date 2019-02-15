@extends('layouts.app')

@section('title', '{{ $city->name }} Homes For Sale by Owner - Willamette Valley FSBOs')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{ $city->name }}</h1>
        </div>
    </div>
</div>
@endsection
