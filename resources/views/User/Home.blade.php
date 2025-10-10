@extends('User/Master')

@section('section')

<!-- Start of Slider Image Section -->

    <section class="slider-section">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">

                @foreach($data['Slider'] as $index=>$row)

                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"></button>
                
                @endforeach
            </div>

            <div class="carousel-inner">

                @foreach($data['Slider'] as $index=>$row)

                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('Images/Sliders/' . $row->Slider_image) }}" alt="Slide">
                    </div>

                @endforeach

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

<!-- End of Slider Image Section -->

<!-- Start of Product Card Section -->

    <section class="product-section Dhruv">
        <div class="container Size">
            <div class="row g-4">
                <div class="col">
                    <div class="product-heading">
                        <h4>New Product</h4>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                @foreach($data['Newproduct'] as $row)  

                    <div class="col" onclick="window.location.href='{{ URL::to('/') }}/product/{{ $row->Product_id }}'">
                        <div class="card product-card h-100">
                            <img src="{{ asset('Images/Products/' . $row->Product_image1) }}" class="card-img product-img" alt="Product Image 1">
                            <div class="card-body product-body">
                                <p class="product-name">{{ $row->Product_name }}</p>
                                <p class="product-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </p>
                                <p class="product-price">₹ {{ $row->Product_price }}</p>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

<!-- End of Product Card Section -->

<!-- Start of Hero Image Section -->

    <section class="hero-section Dhruv">

        <img src="{{ asset('Images/Heros/' . $data['Heroimage']->Heroimage_image) }}" alt="Hero Image" class="hero-image">
    
    </section>

<!-- End of Hero Image Section -->

<!-- Start of Product Card Section -->

    <section class="product-section Dhruv">
        <div class="container Size">
            <div class="row g-4">
                <div class="col">
                    <div class="product-heading">
                        <h4>Trending Product</h4>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                @foreach($data['Treproduct'] as $row)  

                    <div class="col" onclick="window.location.href='{{ URL::to('/') }}/product/{{ $row->Product_id }}'">
                        <div class="card product-card h-100">
                            <img src="{{ asset('Images/Products/' . $row->Product_image1) }}" class="card-img product-img" alt="Product Image 1">
                            <div class="card-body product-body">
                                <p class="product-name">{{ $row->Product_name }}</p>
                                <p class="product-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </p>
                                <p class="product-price">₹ {{ $row->Product_price }}</p>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

<!-- End of Product Card Section -->  

<!-- Start of Slide Image and Content Section -->

    <section class="slide-section Dhruv">
        <div class="container Size">
            <div class="row">

                <div class="col-lg-6">
                    <div class="slide-image">
                        <img class="image" src="{{ asset('Images/Slides/' . $data['Slideimage']->Slideimage_image) }}" alt="Slide Image">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="slide-content">
                        <h2 class="slide-heading">{{ $data['Slideimage']->Slideimage_heading }}</h2>
                        <p class="slide-text">{{ $data['Slideimage']->Slideimage_description }}</p>
                        <button class="btn Dbutton">Read More</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- End of Slide Image and Content Section -->

<!-- Start of Feature Card Section -->

    <section class="feature-section Dhruv">
        <div class="container Size">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                @foreach($data['Feature'] as $row)
                
                    <div class="col">
                        <div class="feature-card">
                            <div class="row">
                                <div class="col-2 p-0">
                                    <div class="feature-icon">
                                        <i class="{{ $row->Feature_icon }}"></i>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="card-body feature-body">
                                        <h6 class="feature-title">{{ $row->Feature_name }}</h6>
                                        <p class="feature-text">{{ $row->Feature_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                
            </div>
        </div>
    </section>

<!-- End of Feature Card Section -->

@endsection