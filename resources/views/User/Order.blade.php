@extends('User/Master')

@section('section')

<!-- Start of Order Table and Add Review Modal Section -->

    <section class="order-section Dhruv">
        <div class="container Size">

            @if(count($data['Order']) > 0)

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-borderless order-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Order Id</th>
                                        <th class="text-center">Review</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($data['Order'] as $row)

                                        <tr class="order-item">
                                            <td class="product-info">
                                                <img src="{{ asset('Images/Products/'.$row->Order_image) }}" alt="Product Image">
                                                <div class="product-details">
                                                    <h6 class="product-name">{{ $row->Order_name }}</h6>
                                                    <div class="product-rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="date text-center">
                                                <p>{{ $row->Order_qty }}</p>
                                            </td>

                                            <td class="quantity text-center">
                                                <p>{{ $row->Order_price * $row->Order_qty }}</p>
                                            </td>

                                            <td class="price text-center">
                                                <p>{{ $row->Order_date }}</p>
                                            </td>

                                            <td class="status text-center">
                                                <p>{{ $row->Order_status }}</p>
                                            </td>

                                            <td class="status text-center">
                                                <p>{{ $row->Order_paymentid }}</p>
                                            </td>

                                            <td class="review text-center">
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#addreview-{{ $row->Order_pid }}" data-review-id="{{ $row->Order_pid }}">Add Review</button>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="addreview-{{ $row->Order_pid }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Order_pid }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Review</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ URL::to('/') }}/addreview_action" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <input type="text" placeholder="Enter your Full Name" name="name" value="{{ old('name') }}" class="Dinput">
                                                                        <div class="error">
                                                                            @error('name')
                                                                                <span>{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <textarea placeholder="Enter your Description" name="des" value="{{ old('des') }}" class="form-contorl Dinput" style="height: 130px; padding-top: 12px; font-size: 14px; resize: none;"></textarea>
                                                                        <div class="error">
                                                                            @error('des')
                                                                                <span>{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="file" name="pphoto" value="{{ old('pphoto') }}" class="form-control Dinput" style="padding-top: 12px">
                                                                        <div class="error">
                                                                            @error('pphoto')
                                                                                <span>{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                    
                                                                    <input type="hidden" name="rid" id="reviewId-{{ $row->Order_pid }}" value="{{ $row->Order_pid }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn Dbutton">Upload</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            @else

                <center>
                    <img src="{{ asset('Images/Backgrounds/Orderempty.png') }}" alt="" style="height: 450px; width: 450px;" class="img-fluid">
                </center>
            
            @endif

        </div>
    </section>

<!-- End of Order Table and Add Review Modal Section -->

@endsection