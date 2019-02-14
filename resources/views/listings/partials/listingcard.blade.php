@isset($listing)
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
@endisset