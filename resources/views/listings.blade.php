@extends('layout')

@section('title', 'Willamette Valley FSBOs - Search Listings')

@section('content')
    <h1>Search Listings</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quos voluptate illo ab, non ratione reiciendis quis repudiandae eos quasi voluptatibus ad quia sapiente dolores, vero. Accusantium, placeat a veritatis!</p>

    <ul>
        @foreach($listings as $listing)
            <li>ID: {{ $listing["id"] }}, Price: {{ $listing['price'] }}, Bedrooms: {{ $listing['beds'] }}, Baths: {{ $listing['baths'] }}</li>
        @endforeach
    </ul>
@endsection