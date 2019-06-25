@extends('layouts.agent')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-between">
            <a href="{{ route('agent.listings.index') }}" class="text-decoration-none">
                <svg style="height:1.4em" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="arrow-circle-left" class="svg-inline--fa fa-arrow-circle-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zM256 472c-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216zm-12.5-92.5l-115.1-115c-4.7-4.7-4.7-12.3 0-17l115.1-115c4.7-4.7 12.3-4.7 17 0l6.9 6.9c4.7 4.7 4.7 12.5-.2 17.1L181.7 239H372c6.6 0 12 5.4 12 12v10c0 6.6-5.4 12-12 12H181.7l85.6 82.5c4.8 4.7 4.9 12.4.2 17.1l-6.9 6.9c-4.8 4.7-12.4 4.7-17.1 0z"></path></svg>
                <span class="d-inline-block ml-2" style="line-height:2em;vertical-align: middle;">Back to listings</span>
            </a>
            @if ($listing->live)
                <a href="{{ route('listings.show', $listing) }}" class="text-decoration-none">
                    <span class="d-inline-block mr-2" style="line-height:2em;vertical-align: middle;">View live on the website</span>
                    <svg style="height:1.1em" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="external-link-alt" class="svg-inline--fa fa-external-link-alt fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M544 0h-.056l-96.167.167c-28.442.049-42.66 34.539-22.572 54.627l35.272 35.272L163.515 387.03c-4.686 4.686-4.686 12.284 0 16.97l8.484 8.485c4.687 4.686 12.285 4.686 16.971 0l296.964-296.964 35.272 35.272c20.023 20.023 54.578 5.98 54.627-22.572L576 32.055C576.03 14.353 561.675 0 544 0zm-.167 128.167l-96-96L544 32l-.167 96.167zM448 227.681V464c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h323.976c3.183 0 6.235 1.264 8.485 3.515l8 8c7.56 7.56 2.206 20.485-8.485 20.485H48c-8.837 0-16 7.163-16 16v352c0 8.837 7.163 16 16 16h352c8.837 0 16-7.163 16-16V235.68c0-3.183 1.264-6.235 3.515-8.485l8-8c7.559-7.559 20.485-2.205 20.485 8.486z"></path></svg>
                </a>
            @else
                <span class="text-muted">This FSBO is not live on the website</span>
            @endif
        </div>
    </div>
    <div class="row">
        {{-- Property Details --}}
        <div class="col-6 py-3">
            <div class="card" style="">
                <div class="card-header d-flex justify-content-between">
                    <span>Details</span>
                <span>Status: <span class="badge badge-pill badge-primary">{{ $listing->status }}</span></span>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0" style="">
                        <tbody>
                            <tr>
                                <th class="p-2" scope="row" colspan="2">
                                    <h5 class="card-title mb-0">
                                        {{ $listing->street_address }}
                                        <small class="text-muted">{{ $listing->city->name }}, {{ $listing->state }} {{ $listing->zip }}</small>
                                    </h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="p-2" scope="row">Beds</th>
                                <td class="p-2">{{ $listing->beds }}</td>
                            </tr>
                            <tr>
                                <th class="p-2" scope="row">Baths</th>
                                <td class="p-2">{{ $listing->beds }}</td>
                            </tr>
                            <tr>
                                <th class="p-2" scope="row">SqFt</th>
                                <td class="p-2">{{ number_format($listing->sqft) }}</td>
                            </tr>
                            @if (!empty($listing->created_at))
                            <tr>
                                <th class="p-2" scope="row">Created</th>
                                <td class="p-2">{{ date_format($listing->created_at, 'M dS, Y') }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <p class="card-text">{!! $listing->description !!}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ date_format($listing->updated_at, 'M dS, Y \a\t g:i A') }}</small></p>
                </div>
            </div>
        </div>
        {{-- Seller --}}
        <div class="col-6 py-3">
            <div class="card" style="">
                <div class="card-header">Property Owner</div>
                <div class="card-body">
                    <table class="table table-borderless mb-0" style="">
                        <tbody>
                            <tr>
                                <th class="p-2" scope="row" colspan="2">
                                <h5 class="card-title mb-0">{{ $seller->name }}</h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="p-2" scope="row">Phone</th>
                                <td class="p-2">{{ $seller->phone }}</td>
                            </tr>
                            <tr>
                                <th class="p-2" scope="row">Email</th>
                                <td class="p-2">{{ $seller->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Property Photos</div>
                <div class="card-body py-0">
                    <div class="row">
                        @if (count($images))
                        @foreach ($images as $img)
                        <div class="col-3 py-3">
                            <img class="w-100" src="{{ $img->getUrl('square') }}" alt="">
                        </div>
                        @endforeach
                        @else
                        <p class="card-text p-3">0 photos uploaded for this property.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <pre>{{-- $listing->toJson(JSON_PRETTY_PRINT) --}}</pre>
</div>
@endsection
