@extends('User/Master')

@section('section')

<!-- Start of Search and Product Card Section -->

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
                <div class="col-md-5">
                    <div class="search">
                        <form action="{{ URL::to('/') }}/shop">
                            <input type="text" placeholder="Search for Product, Search, and More" class="search-input Dinput" name="search" value="{{ $search }}">
                            <button type="submit" class="btn search-button Dbutton">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7"></div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                @foreach($data['Shoproduct'] as $row)  

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

<!-- End of Search and Product Card Section -->

@endsection