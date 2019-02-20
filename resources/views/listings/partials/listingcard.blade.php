@isset($listing)
        <div class="col-md-3">
            <div class="card listing-card" style="margin-bottom:30px;">
                <a href="{{ route('homes.show', $listing->id) }}">
                    <img src="https://picsum.photos/308/231/?random&{{ rand() }}" class="card-img-top img-fluid" alt="{{ $listing->street_address }}">
                </a>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item location pt-2">
                        {{ $listing->community }} | {{ $listing->city }}
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
                    <li class="list-group-item">
                        <a href="{{ route('homes.show', $listing->id) }}" class="btn btn-details">More Details</a>
                    </li>
                </ul>
            </div>

        </div>
@endisset
