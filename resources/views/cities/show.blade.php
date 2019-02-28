@extends('layouts.app')

@section('title', $city->title.' - WillametteValleyFSBOs.com')

@section('content')
<div class="container">

    {{--  LISTINGS BLOCK  --}}
    @isset($city->listings)
    <div class="row my-5">
        <div class="col-md text-center">
            <h3 class="text-muted">
                Here are <span style="font-weight:700">{{ $city->listings->count() }} </span> of the Latest Homes For Sale by Owner in {{ $city->name }}, Oregon
            </h3>
        </div>
    </div>
    <div class="row">
        @each('listings.partials.listingcard', $city->listings, 'listing')
    </div>
    @endisset

    <div class="row my-5">
        <div class="col">
            <h1>{{ $city->name }}, Oregon Homes For Sale by Owner</h1>
            {!! $city->content !!}
        </div>
    </div>
</div>
@endsection
