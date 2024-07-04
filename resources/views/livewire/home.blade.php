<!-- Start Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/society1.jpg') }}" class="d-block w-100 p-2" alt="Lake Dhudhani" height="500px"
                loading="lazy">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/society2.jpg') }}" class="d-block w-100 p-2" alt="Dadra Garden" height="500px"
                loading="lazy">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/society3.jpg') }}" class="d-block w-100 p-2" alt="River Front Silvassa"
                height="500px">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/society4.jpg') }}" class="d-block w-100 p-2" alt="Nakshatra Garden"
                height="500px" loading="lazy">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- End Carousel -->
