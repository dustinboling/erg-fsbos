@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Search Listings')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Listings</div>

                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quos voluptate illo ab, non ratione reiciendis quis repudiandae eos quasi voluptatibus ad quia sapiente dolores, vero. Accusantium, placeat a veritatis!</p>

                    <ul>
                        @foreach($listings as $listing)
                            <li>
                                <ul>
                                    <li>ERG-00{{ $listing->id }}</li>
                                    <li>{{ $listing->street_address }}</li>
                                    <li>{{ $listing->city }}</li>
                                    <li>{{ $listing->state }}</li>
                                    <li>{{ $listing->zip }}</li>
                                    <li>{{ money_format('$%i', $listing->price) }}</li>
                                    <li>{{ $listing->beds }}</li>
                                    <li>{{ $listing->baths }}</li>
                                    <li>{{ $listing->half_baths }}</li>
                                    <li>{{ $listing->sqft }}</li>
                                    <li>{{ $listing->community }}</li>
                                    <li>{{ $listing->neighborhood }}</li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection