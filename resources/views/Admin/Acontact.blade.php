@extends('Admin/Master')

@section('section')

<!-- Start of Information Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Information</h4>
                <form action="{{ URL::to('/') }}/aaddinformation_action" method="POST" class="d-flex">
                    @csrf
                    <input type="text" class="form-control me-3" name="ico" placeholder="Icon" required>
                    <input type="text" class="form-control me-3" name="hea" placeholder="Heading" required>
                    <input type="text" class="form-control me-3" name="des" placeholder="Description" required>
                    <Button class="btn btn-primary btn-sm" type="submit">Add</Button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Icon</th>
                            <th class="text-center">Heading</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Information'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Information_icon }}</td>
                                <td class="text-center">{{ $row->Information_heading }}</td>
                                <td class="text-center">{{ $row->Information_description }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview-{{ $row->Information_id }}" data-review-id="{{ $row->Information_id }}">Update</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview-{{ $row->Information_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Information_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <form action="{{ URL::to('/') }}/auptinformation_action" method="POST">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" name="ico" placeholder="icon" class="form-control" value="{{ $row->Information_icon }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <input type="text" name="hea" placeholder="Heading" class="form-control" value="{{ $row->Information_heading }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <input type="text" name="des" placeholder="Description" class="form-control" value="{{ $row->Information_description }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->Information_id }}" value="{{ $row->Information_id }}" class="form-control">
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
                                    <a href="{{ URL::to('/') }}/adelinformation_action/{{ $row->Information_id }}">
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

<!-- End of Information Table -->

<!-- Start of Complain Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Complain</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Resolve</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Complain'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Complain_name }}</td>
                                <td class="text-center">{{ $row->Complain_email }}</td>
                                <td class="text-center">{{ $row->Complain_phone }}</td>
                                <td class="text-center">{{ $row->Complain_message }}</td>
                                <td class="text-center">
                                    <a href="{{ URL::to('/') }}/adelcomplain_action/{{ $row->Complain_id }}">
                                        <Button class="btn btn-danger btn-sm">Resolve</Button>
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

<!-- End of Complain Table -->

<!-- Start of Map -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Map</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Link</th>
                            <th class="text-center">Update</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Map'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Map_link }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview1-{{ $row->Map_id }}" data-review-id="{{ $row->Map_id }}">Update</button>
                                        
                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview1-{{ $row->Map_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Map_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Map</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ URL::to('/') }}/auptmap_action" method="POST">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" class="form-control" name="map" value="{{ $row->Map_link }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->Map_id }}" value="{{ $row->Map_id }}" class="form-control">
                                                                <button class="btn btn-primary" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

<!-- End of Map -->

@endsection