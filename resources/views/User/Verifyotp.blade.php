@extends('User/Master')

@section('section')

<!-- Start of Verify OTP Form Section -->

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
                                    <h4>Verify Otp</h4>
                                </div>

                                <form action="{{ URL::to('/') }}/verifyotp_action" method="post" class="user-form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter your Otp" name="otp" value="{{ old('otp') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('otp')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn submit-button Dbutton" type="submit" name="btn">Verify</button>
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

<!-- End of Verify OTP Form Section -->

@endsection