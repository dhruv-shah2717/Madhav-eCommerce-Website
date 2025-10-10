@extends('User/Master')

@section('section')

<!-- Start of Checkout Section -->

    <section class="checkout-section Dhruv">
        <div class="container Size">

            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form">
                        <h4>Billing Details</h4>
                        
                        <form action="">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="first-name">First Name:</label>
                                        <input type="text" id="first-name" placeholder="Dhruv" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="last-name">Last Name:</label>
                                        <input type="text" id="last-name" placeholder="Shah" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" id="country" placeholder="India" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" id="address" placeholder="Haveli Street Jalaram chowk" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" id="city" placeholder="Kodinar" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="state">State:</label>
                                        <input type="text" id="state" placeholder="Gujarat" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="pincode">Pincode:</label>
                                        <input type="text" id="pincode" placeholder="362720" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" id="phone" placeholder="9054536831" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" placeholder="Dhruvshah2717@gmail.com" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="checkout-summary">
                        <h4>Your Order</h4>
                        <div class="summary-items">
                            <ul>
                                <li>
                                    <span class="item-title">Product</span>
                                    <span class="item-total float-end">Total</span>
                                </li>

                                @php
                                    $i = 1; 
                                @endphp

                                @foreach($data['Cart'] as $row)

                                <li>
                                    {{ $i }}. {{ $row->Product_name }} 
                                    <span class="float-end">₹ {{ $row->Product_price  * $row->Product_qty }}</span>
                                </li>

                                @php 
                                    $i++;
                                @endphp

                                @endforeach

                            </ul>
                        </div>

                        <div class="summary-total">
                            <ul>
                                <li>
                                    SubTotal
                                    <span>₹ {{ session('subtotal') }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="summary-button">
                            <form action="/checkout_action" method="POST">
                                @csrf
                                <script
                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ $data['key'] }}"
                                    data-amount="{{ $data['amount'] * 100 }}"
                                    data-currency="INR"
                                    data-order_id="{{ $data['razorpayOrderId'] }}"
                                    data-buttontext="Proceed to Pay"
                                    data-name=""
                                    data-description="Test Transaction"
                                    data-image="{{ asset('path/to/your/logo.png') }}"
                                    data-prefill.name="Dhruv"
                                    data-prefill.email="shah"
                                    data-theme.color="#3399cc"
                                ></script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

<!-- End of Checkout Section -->

@endsection