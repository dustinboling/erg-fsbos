@extends('layouts.app')

@section('title',
    'Willamette Valley FSBOs - Home For Sale in ' . $listing->city->name . ', ' . $listing->city->state)

@section('content')
<div class="container listing-show">
    <div class="row listing">
        <div class="col-md position-relative">
            <div class="listing-inner d-flex flex-column bg-white rounded px-3 py-3 mb-4 shadow-sm blurrable">
                <ul class="listing-details d-flex flex-column flex-md-row justify-content-between text-center list-unstyled p-3 mb-2 rounded">
                    <li class="price d-flex listing-detail rounded px-4">
                        <div class="align-self-center">
                            @if ($listing->status == 'pending')
                                <span class="text-warning">Pending Sale</span>
                            @else
                                ${{ number_format($listing->price) }}
                            @endif
                        </div>
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
                        <div class="align-self-center">
                            <a href="{{ route('cities.show', $listing->city->slug ) }}">
                                {{ $listing->city->name }}<small>, {{ $listing->city->state }}</small>
                            </a>
                        </div>
                    </li>
                </ul>{{--/ .listing-details --}}

                <div class="listing-media mb-3">
                    {{--  CAROUSEL  --}}
                    @includeWhen($listing->hasMedia('gallery'), 'listings.partials.carousel-large', ['images' => $listing->getMedia('gallery')])
                </div>{{--/ .listing-media --}}

                <div class="row">
                    <div class="col">
                        <div class="description pl-3 pt-3 mb-3">
                            {!! $listing->description !!}
                        </div>
                    </div>
                </div>
            </div>{{--/ .listing-inner --}}

            {{-- Login Modal --}}
            @guest
                <div class="modal show d-block position-absolute text-center" id="loginModalCenter" role="dialog" aria-modal="true">
                    <div class="modal-dialog shadow-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center border-light">
                                <h5 class="modal-title" id="loginModalCenterTitle">Login or Register</h5>
                            </div>
                            <div class="modal-body" style="font-size: 1.125rem">
                                Please log in or register to view all listing information.
                            </div>
                            <div class="modal-footer justify-content-center border-light">
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
        </div>{{--/ .col --}}

        {{-- Call & Text Code and Agent Info --}}
        <div class="col-12 col-lg-3 text-center">
            <div class="row">
                @if (isset($listing->call_code) || isset($listing->text_code))
                    <div class="col-sm col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-light py-2">Get More Details</div>
                            <ul class="list-group list-group-flush">
                                @isset($listing->call_code)
                                    <li class="list-group-item">Call <strong>800-757-8019</strong> and enter code <strong>{{ $listing->call_code }}</strong> for an audio tour</li>
                                @endisset

                                @isset($listing->text_code)
                                    <li class="list-group-item">Text code <strong>{{ $listing->text_code }}</strong> to <strong>88000</strong> for a mobile tour</li>
                                @endisset
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="col-sm col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light py-2">Talk to a Live Person</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>{{ $listing->agent->name }}</strong></li>
                            <li class="list-group-item"><strong>{{ $listing->agent->phone }}</strong></li>
                            <li class="list-group-item d-flex justify-content-around">
                                <a class="btn btn-outline-secondary btn-sm" href="mailto:{{ $listing->agent->email }}">Email Me</a>
                                <a class="btn btn-outline-secondary btn-sm" href="tel:{{ $listing->agent->phone }}">Call Me</a>
                            </li>
                        </ul>
                        {{--
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                <div class="form-row form-group">
                                    <div class="col">
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" id="inputName" placeholder="Enter your name" required>
                                    </div>
                                    <div class="col">
                                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="tel" name="phone" value="{{ old('phone') }}" id="inputPhone" placeholder="Enter your phone number" required>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <textarea class="form-control w-100" name="message" id="inputMessage" cols="30" rows="5" placeholder="Type your message">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-row text-right">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Send Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        --}}
                        {{-- /.card-body --}}
                    </div>{{-- /.card --}}
                </div>
            </div>
        </div>

    </div>{{--/ .row.listing --}}

    @if($similarListings->count())
    <div class="row py-5">
        <div class="col-md text-center">
            <h3 class="text-muted">More Homes For Sale by Owner in {{ $listing->city->name }}, Oregon</h3>
        </div>
    </div>{{--/ .row --}}

    <div class="row">
        @each('listings.partials.listingcard', $similarListings, 'listing')
    </div>{{--/ .row --}}
    @endif
</div>{{--/ .container.listing-show --}}
@endsection
