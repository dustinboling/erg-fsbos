{{--
    "id": 5,
    "agent_id": 1,
    "city_id": 8,
    "street_address": "903 Linda Tunnel",
    "state": "OR",
    "zip": "97738",
    "price": 102000,
    "beds": 3,
    "baths": 2,
    "sqft": 2704,
    "description": "Magni odio tempore at iusto iure. Nostrum nihil possimus velit perferendis. Eveniet sunt doloribus saepe eum.\n\nAliquid hic dolores ut repudiandae veniam aut. Sed veritatis suscipit inventore ratione nemo ut vitae. Aut et debitis nisi velit repellat.",
    "call_code": "1346",
    "text_code": "WVHOME25",
    "status": null,
    "live": 1,
    "featured": 0,
    "created_at": "2019-04-19 14:41:56",
    "updated_at": "2019-04-19 14:41:56"
    --}}
    @extends('layouts.agent')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center text-secondary mb-4">My FSBOs</h1>

                @if ($listingsGroupedByStatus->isEmpty())
                    <p>You don't have any FSBOs.</p>
                @else
                    @foreach ($listingsGroupedByStatus as $status => $listings)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header" style="letter-spacing:0.1em">{{ $listings->count() }} {{ strtoupper($status) }}</div>
                        <div class="card-body p-0">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Street Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Zip</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Updated</th>
                                        <th scope="col" class="text-center">Live?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listings as $listing)
                                    <tr>
                                        <td>{{ $listing->id }}</td>
                                        <th scope="row">
                                            <a href="{{ route('agent.listings.show', ['listing' => $listing]) }}">
                                                {{ $listing->street_address }}
                                            </a>
                                        </th>
                                        <td>{{ $listing->city->name }}</td>
                                        <td>{{ $listing->zip }}</td>
                                        <td>{{ date_format($listing->created_at, 'M dS, Y') }}</td>
                                        <td>{{ date_format($listing->updated_at, 'M dS, Y \a\t g:i A') }}</td>
                                        <td class="text-center">{{ $listing->live ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @endsection
