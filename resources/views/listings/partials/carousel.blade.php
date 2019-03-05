@if ($listing->hasMedia('gallery'))
    <?php $images = $listing->getMedia('gallery'); ?>
    <div id="carouselListing{{ $listing->id }}" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $isActive = 'active' ?>
            @foreach ($images as $image)
            <div class="carousel-item {{ $isActive }}">
                {{ $image('slide', ['class' => 'd-block w-100 rounded']) }}
            </div>
            <?php $isActive = '' ?>
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
@else
    <img class="card-img-top img-fluid" src="https://picsum.photos/1920/1080/?random&{{ rand() }}">
@endif
