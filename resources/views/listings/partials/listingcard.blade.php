@isset($listing)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card listing-card shadow-sm mb-4">
                {{--  CAROUSEL  --}}
                @includeWhen($listing->hasMedia('gallery'), 'listings.partials.carousel-small', ['images' => $listing->getMedia('gallery')])
                {{-- <img src="https://picsum.photos/308/231/?random&{{ rand() }}" class="card-img-top img-fluid" alt="{{ $listing->street_address }}"> --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item location pt-2 text-truncate">
                        <a href="{{ route('cities.show', $listing->city->slug ) }}">
                            {{ $listing->city->name }}, {{ $listing->city->state }}
                        </a>
                    </li>
                    <li class="list-group-item price">
                        @if ($listing->status == 'pending')
                            <span class="text-warning">Pending Sale</span>
                        @else
                            ${{ number_format($listing->price) }}
                        @endif
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
            <a href="{{ route('listings.show', $listing->id) }}" class="btn {{ $listing->status == 'pending' ? 'btn-warning' : 'btn-primary' }} btn-details py-2">More Details</a>
            </div>

        </div>
@endisset
