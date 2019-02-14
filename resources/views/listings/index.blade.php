@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Search Listings')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="card text-center">
                {{-- <div class="card-header bg-primary" style="color:#ffffff">
                    Search For Sale by Owner Listings
                </div> --}}
                <div class="card-body">
                    {{-- <h5 class="card-title">Search For Sale by Owner listings in Lane County, Oregon</h5> --}}
                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                    <form class="" method="get" action="/listings">
                        <div class="form-row">
                            <div class="col">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect01" name="bedrooms">
                                        <option selected>1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect01">Min Beds</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect02" name="bathrooms">
                                        <option selected>1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Min Baths</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="1500" aria-label="1500" aria-describedby="basic-addon2"  name="sqft">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Min SqFt</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect03" name="min_price">
                                        <option selected>$0+</option>
                                        <option value="100000">100,000+</option>
                                        <option value="200000">200,000+</option>
                                        <option value="300000">300,000+</option>
                                        <option value="400000">400,000+</option>
                                        <option value="500000">500,000+</option>
                                        <option value="600000">600,000+</option>
                                        <option value="700000">700,000+</option>
                                        <option value="800000">800,000+</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect03">Min Price</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04" name="max_price">
                                        <option selected>$900,000+</option>
                                        <option value="800000">$800,000</option>
                                        <option value="700000">$700,000</option>
                                        <option value="600000">$600,000</option>
                                        <option value="500000">$500,000</option>
                                        <option value="400000">$400,000</option>
                                        <option value="300000">$300,000</option>
                                        <option value="200000">$200,000</option>
                                        <option value="100000">$100,000</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect04">Max Price</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-auto text-right">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="col"><a href="#">Save this search</a></div>
                        </div> --}}
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row py-5">
        <div class="col-md text-center">
            <h3 class="text-muted">Showing <span style="font-weight:900">{{ $listings->count() }}</span> matching For Sale by Owner Listings in the Willamette Valley</h3>
        </div>
    </div>

    <div class="row">

            @foreach($listings as $listing)
                <div class="col-md-4">

                    <div class="card" style="margin-bottom:30px;">
                        <a href="/listings/{{ $listing->id }}">
                            <img src="https://picsum.photos/308/231/?random&{{ rand() }}" class="card-img-top img-fluid" alt="{{ $listing->street_address }}">
                        </a>

                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $listing->community }} | {{ $listing->city }}</h6>
                            <h5 class="card-title" style="color:#43C143">${{ number_format($listing->price) }}</h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ number_format($listing->sqft) }} sqft</li>
                            <li class="list-group-item">{{ $listing->beds }} Bedrooms</li>
                            <li class="list-group-item">{{ $listing->baths }} Bathrooms</li>
                            <li class="list-group-item">{{ $listing->half_baths }} Half Baths</li>
                            <li class="list-group-item text-center">
                                <a href="/listings/{{ $listing->id }}" class="btn btn-primary px-5">More Details</a>
                            </li>
                        </ul>

                        <div class="card-footer text-muted">Web ID: ERG-00{{ $listing->id }}</div>
                    </div>
                </div>
                
            @endforeach 
    </div>
</div>
@endsection