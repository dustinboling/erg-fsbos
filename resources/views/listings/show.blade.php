@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Home For Sale in {{ $listing->city }}')

@section('content')
<div class="container listing">
   <div class="row mb-4">
       <div class="col text-center">
           <h2 style="color:#26A7DE;font-weight:400;">Call <span style="color:#43C143;font-weight:700">1-855-555-1212</span> and enter code <span style="color:#43C143;font-weight:700">ERG{{ $listing->id }}</span> for a description of this property</h2>
       </div>
   </div>
   <div class="row">
       <div class="col-9">
           <div class="row">
               <div class="col-9">
                   <img src="https://picsum.photos/627/470/?random&{{ rand() }}" alt="">
               </div>
               <div class="col-3">
                   <img class="mb-3" src="https://picsum.photos/147/110/?random&{{ rand() }}" alt="">
                   <img class="mb-3" src="https://picsum.photos/147/110/?random&{{ rand() }}" alt="">
                   <img class="mb-3" src="https://picsum.photos/147/110/?random&{{ rand() }}" alt="">
                   <img src="https://picsum.photos/147/110/?random&{{ rand() }}" alt="">
               </div>
           </div>
       </div>
       <div class="col-3">
           <div class="row">
                <div class="col-12 price text-center py-2" style="color:#43C143;font-size:1.875rem">$239,000</div>
                <div class="col-6 beds text-center py-4">3<br />Beds</div>
                <div class="col-6 baths text-center py-4">2<br />Baths</div>
                <div class="col-6 sqft text-center py-4">1,538<br />sqft</div>
                <div class="col-6 per-sqft text-center py-4">$155<br />$/sqft</div>
                <div class="col-12">
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
                <div class="col-6">Share</div>
                <div class="col-6">Favorite</div>
                <div class="col-12">
                    <a href="#" class="btn btn-details">Request more information</a>
                </div>
           </div>
       </div>
   </div>
</div>
@endsection
