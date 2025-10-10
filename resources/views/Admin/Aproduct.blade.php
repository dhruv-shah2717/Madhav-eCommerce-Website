@extends('Admin/Master')

@section('section')

<!-- Start of Product Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Product</h4>
                <Button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</Button>
            </div>

            <!-- Moadl -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        
                            <form action="{{ URL::to('/') }}/aaddproduct_action" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="file" class="form-control" name="imgae1" required>
                                    </div>
                                    <div class="col">
                                        <input type="file" class="form-control" name="image2" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="file" class="form-control" name="image3" required>
                                    </div>
                                    <div class="col">
                                        <input type="file" class="form-control" name="image4" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Brand" name="bra" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Name" name="nam" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Review" name="rev" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Price" name="pri" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Ex price" name="exp" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="About" name="abo" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Color" name="col" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Category" name="cat" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-select" name="new" required>
                                            <option selected>Select New</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-select" name="tre" required>
                                            <option selected>Select Trending</option>
                                            <option value="User">Yes</option>
                                            <option value="Admin">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" name="des" placeholder="Description" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
              </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Trending</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Product'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Product_name }}</td>
                                <td class="text-center">{{ $row->Product_brand }}</td>
                                <td class="text-center">{{ $row->Product_price }}</td>
                                <td class="text-center">{{ $row->Product_category }}</td>
                                <td class="text-center">{{ $row->Product_trending }}</td>
                                <td class="text-center">
                                    <a href=""><Button class="btn btn-success btn-sm">Update</Button></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ URL::to('/') }}/adelproduct_action/{{ $row->Product_id }}">
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

<!-- End of Product Table -->

@endsection