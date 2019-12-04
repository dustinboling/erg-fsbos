@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 mb-4 md-mb-0">
            {{--  CAROUSEL  --}}
            <div id="carouselHomeIndicators" class="carousel slide carousel-fade" data-ride="carousel">
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
                                <a href="{{ route('listings.show', $featuredListing->id) }}">
                                    <img class="d-block w-100" src="{{ $featuredListing->getFirstMediaUrl('gallery','slide') }}" alt="{{ $featuredListing->city->name }}, {{ $featuredListing->state }} home for sale by owner">
                                </a>
                                <div class="carousel-caption px-4" style="right:0;left:0;background-color:rgba(255,255,255,0.8)">
                                    <h5 class="font-weight-bolder mb-0 d-none d-sm-block">
                                        {{ $featuredListing->beds }} Bed <span>&#8226;</span> {{ $featuredListing->baths }} Bath <span>&#8226;</span> {{ number_format($featuredListing->sqft) }}SF <span>&#8226;</span>
                                        @if ($featuredListing->status == 'pending')
                                            <span class="text-warning">Pending Sale</span>
                                        @else
                                            ${{ number_format($featuredListing->price) }}
                                        @endif
                                    </h5>
                                    <h6 class="text-dark font-weight-normal mb-0 mb-md-3">Home For Sale by Owner in {{ $featuredListing->city->name }}, {{ $featuredListing->state }}</h6>
                                    <h5 class="text-dark font-weight-normal shadow-sm mb-0 mx-4 d-none d-md-block">Text <span class="text-primary font-weight-bold">{{ $featuredListing->text_code }}</span> to <span class="text-primary font-weight-bold">88000</span> for an instant tour on your mobile device!</h5>
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

        {{-- CALLOUTS --}}
        <div class="col-md-3">
            <div class="row">
                <div class="col-sm-6 col-md-12 text-center">
                    <div class="card mb-4 shadow-sm">
                        {{-- <img src="//via.placeholder.com/348" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">For Buyers</h5>
                            <p class="card-text">We scout our area for new and active FSBOs and invite them to be included on this website.</p>
                            <a href="{{ route('buyers') }}" class="btn btn-primary">Buyer Information</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-12 text-center">
                    <div class="card shadow-sm">
                        {{-- <img src="//via.placeholder.com/348" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">For Sellers</h5>
                            <p class="card-text">You probably know that most buyers begin their home search online, but the question is how do you best reach them?</p>
                        <a href="{{ route('sellers') }}" class="btn btn-primary">Seller Information</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  LISTINGS BLOCK  --}}
    @isset($listings)
    <div class="row py-4">
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
