@extends('Admin/Master')

@section('section')

<!-- Start of Slider Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Slider</h4>
                <form action="{{ URL::to('/') }}/aaddslider_action" enctype="multipart/form-data" method="POST" class="d-flex">
                    @csrf
                    <input type="file" class="form-control me-3" name="slider" required>
                    <Button class="btn btn-primary btn-sm" type="submit">Add</Button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Slider'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center"><img src="{{ asset('Images/Sliders/' . $row->Slider_image) }}" alt=""
                                    style="height: 100px; width:200px;"></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview-{{ $row->Slider_id }}" data-review-id="{{ $row->Slider_id }}">Update</button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview-{{ $row->Slider_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Slider_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Slider</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <form action="{{ URL::to('/') }}/auptslider_action" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="file" class="form-control" name="slider" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->Slider_id }}" value="{{ $row->Slider_id }}" class="form-control">
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
                                    <a href="{{ URL::to('/') }}/adelslider_action/{{ $row->Slider_id }}">
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

<!-- End of Slider Table -->

<!-- Start of Feature Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Feature</h4>
                <form action="{{ URL::to('/') }}/aaddfeature_action" method="POST" class="d-flex">
                    @csrf
                    <input type="text" class="form-control me-3" name="ico" placeholder="Icon" required>
                    <input type="text" class="form-control me-3" name="nam" placeholder="Name" required>
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Feature'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center">{{ $row->Feature_icon }}</td>
                                <td class="text-center">{{ $row->Feature_name }}</td>
                                <td class="text-center">{{ $row->Feature_description }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview1-{{ $row->Feature_id }}" data-review-id="{{ $row->Feature_id }}">Update</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview1-{{ $row->Feature_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Feature_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Feature</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <form action="{{ URL::to('/') }}/auptfeature_action" method="POST">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" name="ico" placeholder="icon" class="form-control" value="{{ $row->Feature_icon }}" required/>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <input type="text" name="nam" placeholder="Name" class="form-control" value="{{ $row->Feature_name }}" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="col">
                                                                    <input type="text" name="des" placeholder="Description" class="form-control" value="{{ $row->Feature_description }}" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->Feature_id }}" value="{{ $row->Feature_id }}" class="form-control">
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
                                    <a href="{{ URL::to('/') }}/adelfeature_action/{{ $row->Feature_id }}">
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

<!-- End of Feature Table -->

<!-- Start of Slide Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Slide Image</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Heading</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Update</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Slide'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center"><img src="{{ asset('Images/Slides/' . $row->Slideimage_image) }}" alt=""
                                    style="width: 250px; height:130px;"></td>
                                <td class="text-center">{{ $row->Slideimage_heading }}</td>
                                <td class="text-center">{{ $row->Slideimage_description }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview2-{{ $row->Slideimage_id }}" data-review-id="{{ $row->Slideimage_id }}">Update</button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview2-{{ $row->Slideimage_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Slideimage_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Slide Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <form action="{{ URL::to('/') }}/auptslide_action" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="file" class="form-control" name="sli" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" class="form-control" name="hea" placeholder="Heading" value="{{ $row->Slideimage_heading }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="text" class="form-control" name="des" placeholder="Description" value="{{ $row->Slideimage_description }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->Slideimage_id }}" value="{{ $row->Slideimage_id }}" class="form-control">
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

<!-- End of Slide Image Table -->

<!-- Start of Hero Image Table -->

    <section class="User-section Dhruv">
        <div class="container Size">

            <div class="d-flex justify-content-between mb-3">
                <h4>Hero Image</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Update</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php 
                            $i = 1;
                        @endphp

                        @foreach($data['Hero'] as $row)
                        
                            <tr>
                                <td class="text-center">{{ $i; }}</td>
                                <td class="text-center"><img src="{{ asset('Images/Heros/' . $row->Heroimage_image) }}" alt=""
                                    style="width: 350px; height:150px;"></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addreview3-{{ $row->Heroimage_id }}" data-review-id="{{ $row->Heroimage_id }}">Update</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addreview3-{{ $row->Heroimage_id }}" tabindex="-1" aria-labelledby="addreviewLabel-{{ $row->Heroimage_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Hero Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <form action="{{ URL::to('/') }}/aupthero_action" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="file" class="form-control" name="her" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="hidden" name="id" id="reviewId-{{ $row->Heroimage_id }}" value="{{ $row->Heroimage_id }}" class="form-control">
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

<!-- End of Hero Image Table -->

@endsection