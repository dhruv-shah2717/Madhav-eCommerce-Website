<!-- Shree Ganashi Nam -->
<!-- Mahek -->

@php
    use App\Models\Register_user;
    $url = request()->path();
    $parts = explode('/', $url);
    $name = Register_user::where('User_email',session('Uemail'))->first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" 
    integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" 
    rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('Css/Default.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Home.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Shop.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Contact.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Cart.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/LR.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Profile.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Order.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Product.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/Checkout.css') }}">

    <!-- Cart qty Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Title Logo -->
    <link rel="icon" href="{{ asset('Images/Logo/Logoc.png') }}" type="image/png">
    
    <title>Online Shopping site in india</title>
</head>
<body>

    <!-- Bootstrap Popper and Js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <!-- Start of Navbar Section -->

        <section class="navbar-section fixed-top">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="navbar-logo">
                        <a href="{{ URL::to('/') }}/home">
                            <img src="{{ asset('Images/Logo/Logo.png') }}" alt="Logo">
                        </a>
                    </div>

                    <!-- Responsive Button -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                        <i class="bi bi-list-stars" style="color: white; font-size: 28px;"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav mx-auto gap-0 gap-md-3">
                            <li class="nav-item">
                                <a class="nav-link @if($parts[0] == 'home') active @endif
                                ms-2 ms-md-0" href="{{ URL::to('/') }}/home"><i class="bi bi-house-fill"></i> Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link @if($parts[0] == 'shop') active @endif 
                                ms-2 ms-md-0" href="{{ URL::to('/') }}/shop"><i class="bi bi-bag-check-fill"></i> Shop</a>
                            </li>

                            <li class="nav-item dropdown" data-bs-theme="dark">
                                <a class="nav-link ms-2 ms-md-0" class="dropdown-toggle" href="#" id="navbarDropdown" 
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-list"></i> Category
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    @php
                                        use App\Models\Product_product;
                                        $categorys = Product_product::select('Product_category')->distinct()->get();
                                    @endphp

                                    @foreach($categorys as $category)

                                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/shop?search={{ $category->Product_category }}">{{ $category->Product_category }}</a></li>

                                    @endforeach

                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link @if($parts[0] == 'contact') active @endif
                                ms-2 ms-md-0" href="{{ URL::to('/') }}/contact"><i class="bi bi-headset"></i> Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link @if($parts[0] == 'cart') active @endif 
                                ms-2 ms-md-0" href="{{ URL::to('/') }}/cart"><i class="bi bi-cart-dash-fill"></i> Cart</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav icon gap-0 gap-md-2">

                            @if(session()->has('Uemail'))

                                <li class="nav-item">
                                    <a class="nav-link @if($parts[0] == 'profile') active @endif 
                                    ms-2 ms-md-0" href="{{ URL::to('/') }}/profile"><i class="bi bi-person-fill"></i> <span class="user-name">{{ $name->User_fname }}</span></a>
                                </li>

                            @else

                                <li class="nav-item">
                                    <a class="nav-link @if($parts[0] == 'login' or $parts[0] == 'register' or $parts[0] == 'forgotpass' or $parts[0] == 'verifyotp' or $parts[0] == 'newpass') active @endif 
                                    ms-2 ms-md-0" href="{{ URL::to('/') }}/login"><i class="bi bi-person-fill"></i> <small>Login/Regsiter</small></a>
                                </li>

                            @endif
                            
                            <li class="nav-item">
                                <a class="nav-link ms-2 ms-md-0" onclick="openSearch()"><i class="bi bi-search"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($parts[0] == 'order') active @endif
                                ms-2 ms-md-0" href="{{ URL::to('/') }}/order"><i class="bi bi-box-seam-fill"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Search Overlay -->
            <div id="searchOverlay" class="nav-search-overlay">
                <span class="close-btn" onclick="closeSearch()" title="Close Overlay">×</span>
                <div class="nav-search-form">
                    <form action="{{ URL::to('/') }}/shop">
                        <input type="text" placeholder="Search for Products, Brands and More" name="search">
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>

            <script>
                function openSearch() {
                    document.getElementById("searchOverlay").style.display = "block";
                }

                function closeSearch() {
                    document.getElementById("searchOverlay").style.display = "none";
                }
            </script>
            
            <!-- Success and Error Message -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>

            @if(session('success'))
            
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{ session("success") }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        {{ session("error") }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif
            
        </section>

        <div class="Space-section" style="padding-top: 81px"></div>

    <!-- End of Navbar Section -->

    <!-- Start of Body Section -->
        
        @yield('section')

    <!-- End of Body Section -->

    <!-- Start of Footer Section -->

        <section class="footer-section">
            <footer class="footer">
                <div class="container">
                    <div class="footer-top">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-box">
                                    <img src="{{ asset('Images/Logo/Logo.png') }}" alt="Logo">
                                    <p>Your one-stop online shopping experience. Discover a wide range of high-quality products, from the latest fashion and electronics to home essentials and more.</p>
                                    <h2>We Accept</h2>
                                    <div class="payment-icons">
                                        <i class="fa fa-cc-visa"></i>
                                        <i class="fa fa-credit-card"></i>
                                        <i class="fa fa-cc-mastercard"></i>
                                        <i class="fa fa-cc-paypal"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-box">
                                    <h2>Make Money With Us</h2>
                                    <ul>
                                        <li><a href="#">Sell On Madhav</a></li>
                                        <li><a href="#">Protect and Build Your Brand</a></li>
                                        <li><a href="#">Become an Affiliate</a></li>
                                        <li><a href="#">Fulfilment by Madhav</a></li>
                                        <li><a href="#">Advertise Your Products</a></li>
                                        <li><a href="#">Madhav Pay on Merchants</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-box">
                                    <h2>Let Us Help You</h2>
                                    <ul>
                                        <li><a href="#">COVID-19 and Madhav</a></li>
                                        <li><a href="#">Your Account</a></li>
                                        <li><a href="#">Return Center</a></li>
                                        <li><a href="#">Recalls and Product Safety Alerts</a></li>
                                        <li><a href="#">100% Purchase Protection</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-box">
                                    <h2>About Us</h2>
                                    <p>Madhav delivers the largest selection of products to Prime members in India, same day or faster.</p>
                                    <h2>Follow us on</h2>
                                    <p class="social-icons">
                                        <i class="bi bi-facebook"></i>
                                        <i class="bi bi-instagram"></i>
                                        <i class="bi bi-whatsapp"></i>
                                        <i class="bi bi-twitter"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="row">
                            <div class="col">
                                <div class="footer-copyright">
                                    Conditions of Use & Sale Privacy Notice Interest-Based Ads. <br>
                                    © 2000-2024, Madhav.com, Inc. or its affiliates. <br>
                                    Created by Dhruv M Shah.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>

    <!-- End of Footer Section -->

</body>
</html>