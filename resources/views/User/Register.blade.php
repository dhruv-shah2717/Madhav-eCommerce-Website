@extends('User/Master')

@section('section')

<!-- Start of Register Form Section -->

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
                                    <h4>Sign Up</h4>
                                </div>

                                <form action="{{ URL::to('/') }}/register_action" method="post" class="user-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter your First Name:" name="fname" value="{{ old('fname') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('fname')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="Enter your Last Name:" name="lname" value="{{ old('lname') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('lname')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="Enter your Email:" name="email" value="{{ old('email') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="Enter your Phone" name="phone" value="{{ old('phone') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('phone')
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

                                    <div class="form-group">
                                        <input type="password" placeholder="Enter your Confirm Password" name="password_conf" value="{{ old('password_conf') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('password_conf')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="date" name="date" value="{{ old('date') }}" class="form-input Dinput">
                                        <div class="error">
                                            @error('date')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-5">
                                        <input type="file" name="pphoto" value="{{ old('pphoto') }}" class="form-control Dinput" style="padding-top: 12px">
                                        <div class="error">
                                            @error('pphoto')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn submit-button Dbutton">Register</button>
                                    </div>
                                </form>

                                <div class="row sign">
                                    <small>Already have an account? <a href="{{ URL::to('/') }}/login">Sign in</a></small>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- End of Register Form Section -->

@endsection