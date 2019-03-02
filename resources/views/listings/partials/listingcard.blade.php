@isset($listing)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card listing-card shadow-sm mb-4">
                {{--  CAROUSEL  --}}
                <div id="carouselListing{{ $listing->id }}" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/506/380/?random&{{ rand() }}" alt="Home for sale by owner in {{ $listing->city->name }}">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/506/380/?random&{{ rand() }}" alt="Home for sale by owner in {{ $listing->city->name }}">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded" src="https://picsum.photos/506/380/?random&{{ rand() }}" alt="Home for sale by owner in {{ $listing->city->name }}">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselListing{{ $listing->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselListing{{ $listing->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                {{-- <img src="https://picsum.photos/308/231/?random&{{ rand() }}" class="card-img-top img-fluid" alt="{{ $listing->street_address }}"> --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item location pt-2 text-truncate">
                        <a href="{{ route('cities.show', $listing->city->slug ) }}">
                            {{ $listing->city->name }}, {{ $listing->city->state }}
                        </a>
                    </li>
                    <li class="list-group-item price">
                        ${{ number_format($listing->price) }}
                    </li>
                    <li class="list-group-item mb-2">
                        <ul class="detail-list-group">
                            <li class="detail-list-group-item flex-fill">{{ $listing->beds }} <span class="text-muted">bd</span></li>
                            <li class="detail-list-group-item flex-fill">{{ $listing->baths }} <span class="text-muted">ba</span></li>
                            <li class="detail-list-group-item flex-fill">{{ number_format($listing->sqft) }} <span class="text-muted">sqft</span></li>
                        </ul>
                    </li>
                    {{-- <li class="list-group-item id py-2">
                        Web ID: <span class="text-muted">ERG-00{{ $listing->id }}</span>
                    </li> --}}
                </ul>
                <a href="{{ route('listings.show', $listing->id) }}" class="btn btn-details py-2">More Details</a>
            </div>

        </div>
@endisset
