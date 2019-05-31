{{-- A small carousel for grid of cards --}}
<div id="carouselListing{{ $listing->id }}" class="carousel slide">
    <div class="carousel-inner rounded">
        @foreach ($images as $image)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                {{-- Adds the blurrable class to secondary images --}}
                @php $blurrable = $loop->first ? '' : 'blurrable'; @endphp
                {{ $image('square', [
                    'class' => "d-block w-100 $blurrable",
                    'alt' => "{$listing->city->name}, {$listing->state} home for sale by owner"
                ]) }}

                {{-- Show the overlay to guests on secondary images --}}
                @if (!$loop->first && Auth::guest())
                    <div class="carousel-caption d-block px-4" style="right:0;left:0;background-color:rgba(255,255,255,0.8)">
                        <p class="mb-0 font-weight-normal text-dark" style="font-size: 1.125rem">
                            <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a>
                            <br>to View All Photos
                        </p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselListing{{ $listing->id }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselListing{{ $listing->id }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>{{--/ .carousel --}}
