@extends('Admin/Master')

@section('section')

<!-- Start of Order Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Order</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Payment id</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Uid</th>
                            <th class="text-center">Cancle</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Order'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Order_name }}</td>
                                <td class="text-center">{{ $row->Order_price }}</td>
                                <td class="text-center">{{ $row->Order_qty }}</td>
                                <td class="text-center">{{ $row->Order_date }}</td>
                                <td class="text-center">{{ $row->Order_paymentid }}</td>
                                <td class="text-center">{{ $row->Order_status }}</td>
                                <td class="text-center">{{ $row->Order_uid }}</td>
                                <td class="text-center">
                                    <a href="{{ URL::to('/') }}/adelorder_action/{{ $row->Order_id }}">
                                        <Button class="btn btn-danger btn-sm">Cancle</Button>
                                    </a>
                                </td>
                            </tr>

                        @php
                            $i++;
                        @endphp

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </section>

<!-- End of Order Table -->

<!-- Start of Review Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Review</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Pid</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Review'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Review_rid }}</td>
                                <td class="text-center"><img src="{{ asset('Images/Reviews/' . $row->Review_pphoto) }}" alt=""
                                    style="height: 60px; width:60px; border-radius:50%"></td>
                                <td class="text-center">{{ $row->Review_name }}</td>
                                <td class="text-center">{{ $row->Review_email }}</td>
                                <td class="text-center">{{ $row->Review_description }}</td>
                                <td class="text-center">
                                    <a href="{{ URL::to('/') }}/adelreview_action/{{ $row->Review_id }}">
                                        <Button class="btn btn-danger btn-sm">Delete</Button>
                                    </a>
                                </td>
                            </tr>

                        @php
                            $i++;
                        @endphp

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </section>

<!-- End of Review Table -->

@endsection