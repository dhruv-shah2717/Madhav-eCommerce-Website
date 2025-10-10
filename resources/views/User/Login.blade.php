@extends('User/Master')

@section('section')

<!-- Start of Login Form Section -->

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
                                    <h4>Sign In</h4>
                                </div>

                                <form action="{{ URL::to('/') }}/login_action" method="post" class="user-form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter your Email" name="email" value="{{ old('email') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" placeholder="Enter your Password" name="password" value="{{ old('password') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-5 d-flex justify-content-end">
                                        <div class="forgot-password">
                                            <small><a href="{{ URL::to('/') }}/forgotpass">Forgot password</a></small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn submit-button Dbutton" type="submit" name="btn">Login</button>
                                    </div>
                                </form>

                                <div class="row sign">
                                    <small>Don't have an account? <a href="{{ URL::to('/') }}/register">Sign Up</a></small>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- End of Login Form Section -->

@endsection