@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Home For Sale in {{ $listing->city }}')

@section('content')
<div class="container">
    <div class="row">

    </div>
    <div class="row py-5">
        <div class="col-md text-center">
            {{ $media('slide') }}
        </div>
    </div>

    <div class="row">
        Similar For Sale by Owner Listings:
    </div>
</div>
@endsection
