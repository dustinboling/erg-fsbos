@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Home For Sale in {{ $listing->city }}')

@section('content')
<div class="container listing-show">
    <div class="row listing">
       <div class="col">
            <div class="listing-inner d-flex flex-column bg-white rounded px-3 py-3 mb-4 shadow-sm">
                <ul class="listing-details d-flex flex-column flex-md-row justify-content-between text-center list-unstyled p-3 mb-2 rounded">
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
                    <div class="col-12 col-md-4">
                        <div class="request-form card">
                            <div class="card-header font-weight-bolder">Request More About this Property</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Contact <strong>{{ $listing->agent->name }}</strong> at <strong>{{ $listing->agent->phone }}</strong></li>
                                <li class="list-group-item">Call <strong>800-757-8019</strong> and enter code <strong>{{ $listing->call_code }}</strong></li>
                                <li class="list-group-item">Text <strong>{{ $listing->text_code }}</strong> to 88000</li>
                                <li class="list-group-item"><a class="btn btn-primary w-100" href="mailto:{{ $listing->agent->email }}">Email {{ $listing->agent->name }}</a></li>
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
            </div>{{--/ .listing-inner --}}
        </div>{{--/ .col --}}
    </div>{{--/ .row.listing --}}

    <div class="row py-5">
        <div class="col-md text-center">
            <h3 class="text-muted">More Homes For Sale by Owner in {{ $listing->city->name }}, Oregon</h3>
        </div>
    </div>{{--/ .row --}}

    <div class="row">
        @each('listings.partials.listingcard', $similarListings, 'listing')
    </div>{{--/ .row --}}
</div>{{--/ .container.listing-show --}}
@endsection
