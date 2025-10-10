@extends('User/Master')

@section('section')

<!-- Start of Profile Section -->

    <section class="profile-section Dhruv">
        <div class="container Size">
            <div class="row">
                
                <div class="col-lg-4">
                    <div class="card info-card">
                        <div class="profile-info">
                            <img src="{{ asset('Images/Profiles/' . $data['User']->User_pphoto) }}" alt="Profile Picture" class="info-img">
                            <h5 class="info-name">{{ $data['User']->User_fname." ".$data['User']->User_lname }}</h5>
                            <div class="info-buttons">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                                <a href="{{ URL::to('/') }}/logout_action"><button type="button" class="btn btn-outline-danger">Logout</button></a><br><br>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card details-card">
                        <div class="profile-details">
                            <div class="row detail-row">
                                <div class="col-sm-3">
                                    <p class="detail-heading">First Name:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="detail-text">{{ $data['User']->User_fname }}</p>
                                </div>
                            </div>
                            <div class="row detail-row">
                                <div class="col-sm-3">
                                    <p class="detail-heading">Last Name:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="detail-text">{{ $data['User']->User_lname }}</p>
                                </div>
                            </div>
                            <div class="row detail-row">
                                <div class="col-sm-3">
                                    <p class="detail-heading">Email:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="detail-text">{{ $data['User']->User_email }}</p>
                                </div>
                            </div>
                            <div class="row detail-row">
                                <div class="col-sm-3">
                                    <p class="detail-heading">Phone:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="detail-text">{{ $data['User']->User_phone }}</p>
                                </div>
                            </div>
                            <div class="row detail-row">
                                <div class="col-sm-3">
                                    <p class="detail-heading">Password:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="detail-text">******</p>
                                </div>
                            </div>
                            <div class="row detail-row">
                                <div class="col-sm-3">
                                    <p class="detail-heading">Date of Birth:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="detail-text">{{ $data['User']->User_date }}</p>
                                </div>
                            </div>
                            <div class="row detail-row">
                                <div class="col-sm-3">
                                    <p class="detail-heading">Status:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="detail-text">{{ $data['User']->User_status }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- End of Profile Section -->

<!-- Start of Edit Profile and Change Password Modal -->

    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editprofile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="editprofile">Edit Profile</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ URL::to('/') }}/eprofile_action" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pimage">
                                    <img src="{{ asset('Images/Profiles/' . $data['User']->User_pphoto) }}" alt="">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter your First Name" name="fname" value="{{ $data['User']->User_fname }}"
                                    class="Dinput">
                                    <div class="error">
                                        @error('fname')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" placeholder="Enter your Last Name" name="lname" value="{{ $data['User']->User_lname }}"
                                    class="Dinput">
                                    <div class="error">
                                        @error('lname')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <input type="text" placeholder="Phone" name="phone" value="{{ $data['User']->User_phone }}"
                                    class="Dinput">
                                    <div class="error">
                                        @error('phone')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="date" placeholder="Date" name="date" value="{{ $data['User']->User_date }}"
                                    class="Dinput">
                                    <div class="error">
                                        @error('date')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="file" placeholder="" name="pphoto" value="{{ old('pphoto') }}"
                                    class="Dinput form-control" style="padding-top: 12px">
                                    <div class="error">
                                        @error('pphoto')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn Dbutton">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->

    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="changePasswordModalLabel">Change Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ URL::to('/') }}/cpass_action" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <input type="password" placeholder="Enter your Old Password" name="opassword" value="{{ old('opassword') }}" class="form-input Dinput">
                                <div class="error">
                                    @error('opassword')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Enter your New Password" name="npassword" value="{{ old('npassword') }}" class="form-input Dinput">
                                <div class="error">
                                    @error('npassword')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn Dbutton">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- End of Edit Profile and Change Password Modal -->    

@endsection