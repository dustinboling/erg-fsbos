@extends('layouts.app')

@section('title', 'Browse by City - Willamette Valley FSBOs')

@section('content')
<div class="container">
    <div class="row">
        <div class="col mb-4">
            <h1>Browse by City - Willamette Valley Homes For Sale by Owner</h1>
        </div>
    </div>

    @isset($cities)
    <div class="row">
        @foreach ($cities as $city)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card listing-card shadow-sm mb-4">
                <a href="{{ route('cities.show', $city->slug) }}" class="card-link">
                    <img src="https://picsum.photos/506/380/?random&{{ rand() }}" class="card-img-top img-fluid" alt="Homes For Sale by Owner {{ $city->name }} OR">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $city->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Oregon</h6>
                </div>
                <a href="{{ route('cities.show', $city->slug) }}" class="btn btn-details py-2">Browse {{ $city->name }}</a>
            </div>
        </div>
        @endforeach
    </div>
    @endisset

</div>
@endsection
