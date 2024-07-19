<div id="categoryCarousel" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner px-4">
        @if (isset($trending_category) && count($trending_category) > 0)
            @foreach ($trending_category->chunk(6) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} d-none d-lg-block">
                    <div class="row">
                        @foreach ($chunk as $tcate)
                            <div class="col-6 col-lg-2 col-md-3 g-2">
                                <a href="{{ route('viewcategory', $tcate->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset($tcate->image) }}" class="card-img-small"
                                            alt="{{ $tcate->name }}">
                                        <div class="card-body font-small-card text-center">
                                            {{ $tcate->name }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            @foreach ($trending_category->chunk(8) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} d-lg-none">
                    <div class="row">
                        @foreach ($chunk as $tcate)
                            <div class="col-3 col-md-3 g-2">
                                <a href="{{ route('viewcategory', $tcate->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset($tcate->image) }}" class="card-img-small"
                                            alt="{{ $tcate->name }}">
                                        <div class="card-body font-small-card text-center">
                                            {{ $tcate->name }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <p>No featured categories available.</p>
        @endif
    </div>
    <button id="carouselPrev" class="carousel-control-prev custom-carousel-control" type="button"
        data-bs-target="#categoryCarousel" data-bs-slide="prev" disabled>
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button id="carouselNext" class="carousel-control-next custom-carousel-control" type="button"
        data-bs-target="#categoryCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carouselPrev = document.getElementById('carouselPrev');
        var carouselNext = document.getElementById('carouselNext');
        var categoryCarousel = document.getElementById('categoryCarousel');
        var carouselItems = categoryCarousel.querySelectorAll('.carousel-item');
        var bsCarousel = new bootstrap.Carousel(categoryCarousel, {
            interval: false
        });

        categoryCarousel.addEventListener('slide.bs.carousel', function(event) {
            carouselPrev.disabled = event.to === 0;
            carouselNext.disabled = event.to === carouselItems.length - 1;
        });

        // Initially check the state of the carousel controls
        carouselPrev.disabled = true; // Disable previous button on load
        if (carouselItems.length <= 1) {
            carouselNext.disabled = true;
        }
    });
</script>

<style>
    .custom-carousel-control {
        width: 30px;
        height: 30px;
        background-color: #ffffff;
        /* Dark background color */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-control-prev.custom-carousel-control {
        left: -30px;
        /* Positioning outside the carousel */
    }

    .carousel-control-next.custom-carousel-control {
        right: -30px;
        /* Positioning outside the carousel */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
        /* Makes the icon white */
    }
</style>
