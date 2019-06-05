@extends('layouts.app')

@section('title', $city->title.' - WillametteValleyFSBOs.com')

@section('content')
<div class="container">

    {{--  LISTINGS BLOCK  --}}
    @isset($listings)
    <div class="row my-5">
        <div class="col-md text-center">
            <h3 class="text-muted">
                Here are <span style="font-weight:700">{{ $listings->count() }} </span> of the Latest Homes For Sale by Owner in {{ $city->name }}, {{ $city->state }}
            </h3>
        </div>
    </div>
    <div class="row">
        @each('listings.partials.listingcard', $listings, 'listing')
    </div>
    @endisset

    <div class="row my-5">
        <div class="col">
            @if ($image = $city->getFirstMedia('main'))
            {{ $image('slide', ['class' => 'w-100 rounded shadow-sm']) }}
            @endif
            <h1>{{ $city->name }}, {{ $city->state }} For Sale by Owner</h1>
            {!! $city->content !!}
        </div>
    </div>
</div>
@endsection
