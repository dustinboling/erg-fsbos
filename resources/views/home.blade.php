@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{--  CAROUSEL  --}}
            <div id="carouselHomeIndicators" class="carousel slide" data-ride="carousel">
                {{--
                <ol class="carousel-indicators">
                    <li data-target="#carouselHomeIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselHomeIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselHomeIndicators" data-slide-to="2"></li>
                </ol>
                --}}
                <div class="carousel-inner shadow-sm rounded">
                    @foreach ($featured as $featuredListing)
                        <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                            <img class="d-block w-100" src="{{ $featuredListing->getFirstMediaUrl('gallery','slide') }}" alt="{{ $featuredListing->city->name }}, {{ $featuredListing->state }} home for sale by owner">
                            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(255,255,255,0.85)">
                                <h2>{{ $featuredListing->beds }} Bed, {{ $featuredListing->baths }} Bath, {{ $featuredListing->sqft }}SF, ${{ number_format($featuredListing->price) }}</h2>
                                <h4 class="text-dark">Home For Sale by Owner in {{ $featuredListing->city->name }}, {{ $featuredListing->state }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselHomeIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselHomeIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{--  LISTINGS BLOCK  --}}
    @isset($listings)
    <div class="row py-5">
        <div class="col-md text-center">
            <h3 class="text-muted">
                Here are <span style="font-weight:700">{{ $listings->count() }} </span> of the Latest Homes For Sale by Owner in the Willamette Valley
            </h3>
        </div>
    </div>
    <div class="row">
        @each('listings.partials.listingcard', $listings, 'listing')
    </div>
    @endisset
</div>
@endsection
