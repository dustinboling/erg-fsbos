@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{--  CAROUSEL  --}}
            <div id="carouselHomeIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselHomeIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselHomeIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselHomeIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 rounded" src="https://picsum.photos/1280/600/?random&{{ rand() }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 rounded" src="https://picsum.photos/1280/600/?random&{{ rand() }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 rounded" src="https://picsum.photos/1280/600/?random&{{ rand() }}" alt="Third slide">
                    </div>
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
