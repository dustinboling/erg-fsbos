{{-- A large carousel for full-width display --}}
<div id="carouselListing{{ $listing->id }}" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($images as $image)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}"  data-interval="8500">
            <img class="d-block w-100" src="{{ $image->getUrl('slide') }}" alt="{{ $listing->city->name }}, {{ $listing->state }} home for sale by owner">
            {{-- $image('slide', ['class' => 'd-block w-100 rounded shadow-sm']) --}}
            @if ($loop->first)
                <div class="carousel-caption d-none d-sm-block px-4" style="right:0;left:0;background-color:rgba(255,255,255,0.8)">
                    <h4 class="shadow-sm mb-0 font-weight-normal">Text the code <span style="font-family: 'futura-pt-condensed;font-weight:700;">{{ $listing->text_code }}</span> to the number <span style="font-family: 'futura-pt-condensed;font-weight:700;">88000</span> for an instant tour on your phone!</h4>
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
