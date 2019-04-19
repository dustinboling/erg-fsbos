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
                            @if ($featuredListing->hasMedia('gallery'))
                                <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                                    <img class="d-block w-100" src="{{ $featuredListing->getFirstMediaUrl('gallery','slide') }}" alt="{{ $featuredListing->city->name }}, {{ $featuredListing->state }} home for sale by owner">
                                    <div class="carousel-caption d-none d-md-block rounded" style="background-color:rgba(255,255,255,0.8)">
                                        <h2 class="font-weight-bolder">{{ $featuredListing->beds }} Bed, {{ $featuredListing->baths }} Bath, {{ $featuredListing->sqft }}SF, ${{ number_format($featuredListing->price) }}</h2>
                                        <h4 class="text-dark font-weight-normal">Home For Sale by Owner in {{ $featuredListing->city->name }}, {{ $featuredListing->state }}</h4>
                                    </div>
                                </div>
                            @endif
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
            <div class="col-md-3 text-center">
                <div class="card mb-4 shadow-sm">
                    {{-- <img src="//via.placeholder.com/348" class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">For Buyers</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('buyers') }}" class="btn btn-primary">Buyer Information</a>
                    </div>
                </div>
                <div class="card shadow-sm">
                    {{-- <img src="//via.placeholder.com/348" class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">For Sellers</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ route('sellers') }}" class="btn btn-primary">Seller Information</a>
                    </div>
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
