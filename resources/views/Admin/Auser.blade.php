@extends('Admin/Master')

@section('section')

<!-- Start of User Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>User</h4>
                <Button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</Button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ URL::to('/') }}/aadduser_action" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="First name" name="fnam" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Last name" name="lnam" required>
                                    </div>    
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Email" name="ema" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Number" name="pho" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="password" name="pas" required>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="dat" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-select" name="rol" required>
                                            <option selected>Select Role</option>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-select" name="sta" required>
                                            <option selected>Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="file" class="form-control" name="pphoto" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <Button type="submit" class="btn btn-primary">Add</Button>
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
                            <th class="text-center">Photo</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['User'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center"><img src="{{ asset('Images/Profiles/' . $row->User_pphoto) }}" 
                                    alt="" style="height: 40px; width:40px; border-radius:50%"></td>
                                <td class="text-center">{{ $row->User_fname }}</td>
                                <td class="text-center">{{ $row->User_email }}</td>
                                <td class="text-center">{{ $row->User_date }}</td>
                                <td class="text-center">{{ $row->User_role }}</td>
                                <td class="text-center">{{ $row->User_status }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview-{{ $row->User_id }}" data-review-id="{{ $row->User_id }}">Update</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview-{{ $row->User_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->User_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <form action="{{ URL::to('/') }}/auptuser_action" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="First name" name="fnam" value="{{ $row->User_fname }}" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="Last name" name="lnam" value="{{ $row->User_lname }}" required>
                                                            </div>    
                                                        </div>
                        
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="Email" name="ema" value="{{ $row->User_email }}" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="Number" name="pho" value="{{ $row->User_phone }}" required>
                                                            </div>
                                                        </div>
                        
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="password" name="pas" value="{{ $row->User_password }}" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="date" class="form-control" name="dat" value="{{ $row->User_date }}" required>
                                                            </div>
                                                        </div>
                        
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" value="{{ $row->User_role }}" name="rol" placeholder="role" class="form-control" required>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" value="{{ $row->User_status }}" name="sta" placeholder="role" class="form-control" required>
                                                            </div>
                                                        </div>
                        
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="file" class="form-control" name="pphoto" required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->User_id }}" value="{{ $row->User_id }}" class="form-control">
                                                                <button class="btn btn-primary" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                
                                                </div>
                                          </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ URL::to('/') }}/adeluser_action/{{ $row->User_id }}">
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

<!-- End of User Table -->

<!-- Start of Discount Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Coupeen</h4>
                <form action="{{ URL::to('/') }}/aaddcoupeen_action" method="POST" class="d-flex">
                    @csrf
                    <input type="text" class="form-control me-3" name="cod" placeholder="code" required>
                    <input type="text" class="form-control me-3" name="pri" placeholder="price" required>
                    <Button class="btn btn-primary btn-sm" type="submit">Add</Button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Discount'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Discount_code }}</td>
                                <td class="text-center">{{ $row->Discount_price }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview1-{{ $row->Discount_id }}" data-review-id="{{ $row->Discount_id }}">Update</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview1-{{ $row->Discount_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Discount_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Feature</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <form action="{{ URL::to('/') }}/auptcoupeen_action" method="POST">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" name="cod" placeholder="Code" class="form-control" value="{{ $row->Discount_code }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <input type="text" name="pri" placeholder="Price" class="form-control" value="{{ $row->Discount_price }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->Discount_id }}" value="{{ $row->Discount_id }}" class="form-control">
                                                                <button class="btn btn-primary" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                
                                                </div>
                                          </div>
                                        </div>
                                    </div>

                                </td>
                                <td class="text-center">
                                    <a href="{{ URL::to('/') }}/adelcoupeen_action/{{ $row->Discount_id }}">
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

<!-- End of Discount Table -->

@endsection