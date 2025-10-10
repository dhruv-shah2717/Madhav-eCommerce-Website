@extends('User/Master')

@section('section')

<!-- Start of Product Section -->

    <section class="product-section Dhruv">
        <div class="container Size">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-images">
                        <div class="image-display">
                            <div class="image-showcase">
                                <img src="{{ asset('Images/Products/' . $data['Product']->Product_image1) }}" alt="product image">
                                <img src="{{ asset('Images/Products/' . $data['Product']->Product_image2) }}" alt="product image">
                                <img src="{{ asset('Images/Products/' . $data['Product']->Product_image3) }}" alt="product image">
                                <img src="{{ asset('Images/Products/' . $data['Product']->Product_image4) }}" alt="product image">
                            </div>
                        </div>
                        <div class="image-select">
                            <div class="image-item">
                                <a href="#" data-id="1">
                                    <img src="{{ asset('Images/Products/' . $data['Product']->Product_image1) }}" alt="product image">
                                </a>
                            </div>
                            <div class="image-item">
                                <a href="#" data-id="2">
                                    <img src="{{ asset('Images/Products/' . $data['Product']->Product_image2) }}" alt="product image">
                                </a>
                            </div>
                            <div class="image-item">
                                <a href="#" data-id="3">
                                    <img src="{{ asset('Images/Products/' . $data['Product']->Product_image3) }}" alt="product image">
                                </a>
                            </div>
                            <div class="image-item">
                                <a href="#" data-id="4">
                                    <img src="{{ asset('Images/Products/' . $data['Product']->Product_image4) }}" alt="product image">
                                </a>
                            </div>
                        </div>
                    </div>

                    <script>
                        const imgs = document.querySelectorAll('.image-select a');
                        const imgBtns = [...imgs];
                        let imgId = 1;

                        imgBtns.forEach((imgItem) => {
                            imgItem.addEventListener('click', (event) => {
                                event.preventDefault();
                                imgId = imgItem.dataset.id;
                                slideImage();
                            });
                        });

                        function slideImage() {
                            const displayWidth = document.querySelector('.image-showcase img:first-child').clientWidth;
                            document.querySelector('.image-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
                        }

                        window.addEventListener('resize', slideImage);
                    </script>

                </div>
                
                <div class="col-lg-6">
                    <div class="product-details">
                        <h4>{{ $data['Product']->Product_name }}
                            <span>Brand: {{ $data['Product']->Product_brand }}</span>
                        </h4>
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <span>({{ $data['Product']->Product_review }} Reviews)</span>
                        </div>
                        <div class="price">
                            ₹ {{ $data['Product']->Product_price }}
                            <span>₹ {{ $data['Product']->Product_exprice }}</span>
                        </div>
                        <p>
                            {{ $data['Product']->Product_about }}
                        </p>
                        <div class="buttons">
                            <a href="{{ URL::to('/') }}/buynow_action">
                                <button type="submit" class="btn btn-buy-now Dbutton"> <i class="bi bi-bag-check"></i> Buy Now</button>
                            </a>
                            <a href="{{ URL::to('/') }}/addcart_action/{{ $data['Product']->Product_id }}">
                                <button type="submit" class="btn btn-add-to-cart Dbutton"> <i class="bi bi-cart3"></i> Add to Cart</button>
                            </a>
                            </div>
                        <div class="widget">
                            <ul>
                                <li>
                                    <span>Category:</span>
                                    <label>{{ $data['Product']->Product_category }}</label>
                                    <span>Availability:</span>
                                    <label>In Stock</label>
                                    <span>Available Color:</span>
                                    <label>{{ $data['Product']->Product_color }}</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- End of Product Section -->

<!-- Start of Description and Review Section -->

    <section class="description-review-section Dhruv">
        <div class="container Size">
            <div class="row">
                <div class="col">
                    <div class="description">
                        <h5>Description</h5>
                        <p>
                            {{ $data['Product']->Product_description }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="review-section">
                <div class="row">
                    <div class="col">
                        <h5>Reviews</h5>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                    @foreach($data['Review'] as $row)

                        <div class="col">
                            <div class="card review-card">
                                <div class="row">
                                    <div class="col-3 p-0">
                                        <img src="{{ asset('Images/Reviews/' . $row->Review_pphoto) }}" alt="" class="review-img">
                                    </div>
                                    <div class="col-9 p-0">
                                        <div class="card-body review-body">
                                            <p>{{ $row->Review_name }}</p>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                    <div class="col p-0">
                                        <div class="comment">
                                            <p>{{ $row->Review_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach

                </div>
            </div>
        </div>
    </section>

<!-- End of Description and Review Section -->

<!-- Start of Product Card Section -->

    <section class="product-section Dhruv">
        <div class="container Size">
            <!-- <div class="row g-4">
                <div class="col">
                    <div class="product-heading">
                        <h4>New Product</h4>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col">
                    <div class="related-heading">
                        <h4>Related Products</h4>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                @foreach($data['Related']->take(4) as $row)

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

@endsection