@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Home For Sale in {{ $listing->city }}')

@section('content')
<div class="container listing-show">
   <div class="row call-code mb-4">
       <div class="col text-center">
           <h2 style="color:#26A7DE;font-weight:400;">Call <span style="color:#43C143;font-weight:700">1-855-555-1212</span> and enter code <span style="color:#43C143;font-weight:700">ERG{{ $listing->id }}</span> for a description of this property</h2>
       </div>
   </div>
    <div class="row listing">
       <div class="col">
           <div class="listing-inner d-flex flex-column bg-white rounded px-3 py-3 mb-4 shadow-sm">
                <ul class="listing-details d-flex flex-column flex-md-row text-center list-unstyled p-3 mb-2 rounded">
                    <li class="price d-flex listing-detail rounded px-4">
                        <div class="align-self-center">${{ number_format($listing->price) }}</div>
                    </li>
                    <li class="beds d-flex listing-detail rounded px-4">
                        <div class="align-self-center">{{ $listing->beds }} <small>Beds</small></div>
                    </li>
                    <li class="baths d-flex listing-detail rounded px-4">
                        <div class="align-self-center">{{ $listing->baths }} <small>Baths</small></div>
                    </li>
                    <li class="sqft d-flex listing-detail rounded px-4">
                        <div class="align-self-center">{{ number_format($listing->sqft) }} <small>sqft</small></div>
                    </li>
                    <li class="per-sqft d-flex listing-detail rounded px-4">
                        <div class="align-self-center">${{ intdiv($listing->price, $listing->sqft) }} <small>$/sqft</small></div>
                    </li>
                    {{-- <li class="location d-flex listing-detail rounded px-4 px-0">
                        <ul class="d-flex flex-column list-unstyled">
                            <li class="location-area d-flex bg-light">
                                <div class="mr-auto">Area</div>
                                <div class="ml-auto">{{ $listing->community }}</div>
                            </li>
                            <li class="location-city d-flex">
                                <div class="mr-auto">City</div>
                                <div class="ml-auto">{{ $listing->city }}</div>
                            </li>
                            <li class="location-county d-flex bg-light">
                                <div class="mr-auto">County</div>
                                <div class="ml-auto">{{ $listing->county }}</div>
                            </li>
                        </ul>
                    </li> --}}
                </ul>{{-- Flex Container End --}}
                {{-- IMAGES Start--}}
                <div class="listing-media mb-2">
                    {{--  CAROUSEL Start  --}}
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/825/470/?random&{{ rand() }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/825/470/?random&{{ rand() }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/825/470/?random&{{ rand() }}" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/825/470/?random&{{ rand() }}" alt="Fourth slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/825/470/?random&{{ rand() }}" alt="Fifth slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    {{-- CAROUSEL End --}}
                </div>
                <div class="description">
                    {!! $listing->description !!}
                </div>
                {{-- IMAGES End --}}
           </div>
           <div class="card listing-contact">
                <div class="card-header font-weight-bolder">Request More About this Property</div>
                <div class="card-body">
                        <form action="{{ route('contact') }}" method="post">
                                @csrf
                                <div class="form-row form-group">
                                    <div class="col"><input class="form-control" type="name" name="name" id="inputName" placeholder="Enter your name"></div>
                                    <div class="col"><input class="form-control" type="tel" name="phone" id="inputPhone" placeholder="Enter your phone number"></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <input class="form-control" type="email" name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter your email address">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <textarea class="form-control" class="w-100" name="message" id="inputMessage" cols="30" rows="5" placeholder="Type your message"></textarea>
                                    </div>
                                </div>
                                <div class="form-row text-right">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Send Request</button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>{{-- .col end --}}
    </div>
   <div class="row py-5">
        <div class="col-md text-center">
            <h3 class="text-muted">
                @isset($similarListings)
                    Here are <span style="font-weight:700">{{ $similarListings->count() }} </span>
                @endisset
                More Homes For Sale by Owner in {{ $listing->city }}, Oregon
            </h3>
        </div>
    </div>

    <div class="row">
        @each('listings.partials.listingcard', $similarListings, 'listing')
    </div>
</div>
@endsection
