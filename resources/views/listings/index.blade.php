@extends('layouts.app')

@section('title', 'Willamette Valley Homes For Sale by Owner - Willamette Valley FSBOs')

@section('content')
<div class="container">
    <div class="row">
        @include('listings.partials.quicksearch')
    </div>
    <div class="row py-5">
        <div class="col-md text-center">
            <h3 class="text-muted">
                @isset($listings)
                    Here are <span style="font-weight:700">{{ $listings->count() }} </span>
                @endisset
                For Sale by Owner Listings in the Willamette Valley
            </h3>
        </div>
    </div>

    <div class="row">
        @each('listings.partials.listingcard', $listings, 'listing')
    </div>
</div>
@endsection
