<!-- Banner carousel-->
<div id="promotionsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($promotions as $promotion)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <a href="{{ route('viewpromotion', $promotion->slug) }}">
                    <img src="{{ asset($promotion->image) }}" class="d-block w-100 carousel-image" alt="{{ $promotion->name }}">
                </a>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#promotionsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#promotionsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
