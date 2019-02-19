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

       <div class="col-9 listing-media">
           <div class="row py-3">
               <div class="col-10">
                   <img src="https://picsum.photos/680/480/?random&{{ rand() }}" alt="">
               </div>
               <div class="col-2">
                   <img class="mb-2" src="https://picsum.photos/112/?random&{{ rand() }}" alt="">
                   <img class="mb-2" src="https://picsum.photos/112/?random&{{ rand() }}" alt="">
                   <img class="mb-2" src="https://picsum.photos/112/?random&{{ rand() }}" alt="">
                   <img src="https://picsum.photos/112/?random&{{ rand() }}" alt="">
               </div>
           </div>
       </div>
       <div class="col-3 listing-summary">
           <div class="row">
                <div class="col-12 price text-center py-4" style="">$239,000</div>
                <div class="col-6 beds text-center py-4">3<small>Beds</small></div>
                <div class="col-6 baths text-center py-4">2<small>Baths</small></div>
                <div class="col-6 sqft text-center py-4">1,538<small>sqft</small></div>
                <div class="col-6 per-sqft text-center py-4">$155<small>$/sqft</small></div>
                <div class="col-12 location">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Area</th>
                                <td class="text-right">{{ $listing->community }}</td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td class="text-right">{{ $listing->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">County</th>
                                <td class="text-right">{{ $listing->county }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 call-to-action py-3">
                    <a href="#" class="btn btn-details">Request more information</a>
                </div>
           </div>
       </div>
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
