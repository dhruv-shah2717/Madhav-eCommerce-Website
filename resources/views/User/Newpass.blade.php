@extends('User/Master')

@section('section')

<!-- Start of New Password Form Section -->

    <section class="LR-section Dhruv">
        <div class="container Size">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 image-container">
                            <div class="image">
                                <img src="{{ asset('Images/Backgrounds/LR.png') }}" class="img-fluid">
                            </div>
                        </div> 

                        <div class="col-md-6 form-container">
                            <div class="row align-items-center">
                                <div class="heading mb-4">
                                    <h4>New Password</h4>
                                </div>

                                <form action="{{ URL::to('/') }}/newpass_action" method="post" class="user-form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="password" placeholder="Enter your New Password" name="newpass" value="{{ old('newpass') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('newpass')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" placeholder="Enter your Confirm New Password" name="password_conf" value="{{ old('password_conf') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('password_conf')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn submit-button Dbutton" type="submit" name="btn">Submit</button>
                                    </div>
                                </form>

                                <div class="form-group mb-5 d-flex justify-content-end">
                                    <div class="forgot-password">
                                        <small><a href="{{ URL::to('/') }}/forgotpass">Resend Otp</a></small>
                                    </div>
                                </div>

                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- End of New Password Form Section -->

@endsection