@extends('User/Master')

@section('section')

<!-- Start of Cart Table, Discount, and Total Section -->

    <section class="cart-section Dhruv">
        <div class="container Size">

            @if(count($data['Cart']) > 0)

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-borderless cart-table">
                                
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @php 
                                        $price = 0;
                                        $total = 0;
                                        $subtotal = 0;
                                        $coupeen = session('coupeen');
                                    @endphp

                                    @foreach($data['Cart'] as $row)

                                        <tr class="cart-item">
                                            <td class="product-info">
                                                <img src="{{ asset('Images/Products/' . $row->Product_image) }}" alt="Product Image">
                                                <div class="product-details">
                                                    <h6 class="product-name">{{ $row->Product_name }}</h6>
                                                    <div class="product-rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price text-center">₹ {{ $row->Product_price }}</td>
                                            <td class="quantity text-center">
                                                <div class="pro-qty quantity-controls">
                                                    <span class="dec decrement">-</span>
                                                    <input type="text" readonly value="{{ $row->Product_qty }}" class="quantity-input" min="1" max="5" name="qty" data-pid="{{ $row->Product_id }}">                                                
                                                    <input type="hidden" value="{{ $row->Product_id }}" name="pid">
                                                    <span class="inc increment">+</span>
                                                </div>
                                            </td>
                                            <td class="total text-center">₹ {{ $row->Product_price * $row->Product_qty }}</td>
                                            <td class="delete text-center">
                                                <button class="btn btn-sm btn-outline-danger" onclick="window.location.href='{{ URL::to('/') }}/deletecart_action/{{ $row->Product_id }}'">Remove</button>
                                            </td>
                                        </tr>
    
                                        @php 
                                            $price = $row->Product_price * $row->Product_qty;
                                            $total = $price + $total;
                                        @endphp

                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        var proQty = $('.pro-qty');
                
                        // Handling click events on increment and decrement buttons
                        proQty.on('click', '.inc, .dec', function() {
                            var $button = $(this);
                            var $input = $button.siblings('input.quantity-input');
                            var oldValue = parseInt($input.val(), 10);
                            var minValue = parseInt($input.attr('min'), 10);
                            var maxValue = parseInt($input.attr('max'), 10);
                            var newVal;
                
                            // Increment or decrement value based on button click
                            if ($button.hasClass('inc')) {
                                newVal = oldValue < maxValue ? oldValue + 1 : maxValue;
                            } else {
                                newVal = oldValue > minValue ? oldValue - 1 : minValue;
                            }
                
                            // Update the input field with the new value
                            $input.val(newVal).change(); // Trigger the onchange event
                        });
                
                        // Handling the onchange event to update the cart
                        $('.quantity-input').on('change', function() {
                            var newValue = $(this).val();
                            var productId = $(this).data('pid'); // Get the product ID from the data attribute
                            window.location.href = '{{ URL::to('/') }}/updatecart_action/' + newValue + ',' + productId;
                        });
                    });
                </script>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-discount">
                            <h5>Discount Code</h5>
                            <form action="{{ URL::to('/') }}/applydis_action" class="discount-form" method="POST">
                                @csrf
                                <input type="text" placeholder="Enter your Coupon Code" class="discount-input Dinput" name="discount" value="{{ old('discount') }}">
                                
                                @if(!session()->has('coupeen'))
                                    <button type="submit" class="btn discount-button Dbutton">Apply</button>
                            
                                @else
                                    <a href="{{ URL::to('/') }}/removedis_action" class="btn discount-button Dbutton">Remove</a>
                                @endif 

                            </form>
                            <div class="error"><br>
                                @error('discount')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="cart-total">
                            <h4>Cart Total</h4>
                            <ul class="total-summary">
                                <li>Total
                                    <span>₹ {{ $total }}</span>
                                </li>
                                <li>Delivery Charge
                                    <span>Free</span>
                                </li>

                                @if($coupeen)

                                <li>Discount
                                    <span style="color: red;">-₹ {{ session('coupeen') }}</span>
                                </li>

                                @endif

                                <li>SUB Total
                                    <span>₹ {{ $subtotal=$total-$coupeen }}</span>
                                </li>
                            </ul>
                            <form action="{{ URL::to('/') }}/setsubtotal" method="POST">
                                @csrf
                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                <button type="submit" class="btn checkout-button Dbutton">Proceed To Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            @else

                <center>
                    <img src="{{ asset('Images/Backgrounds/Cartempty.png') }}" alt="" style="height: 450px; width: 450px;" class="img-fluid">
                </center>
            
            @endif

        </div>
    </section>

<!-- End of Cart Table, Discount, and Total Section -->

@endsection