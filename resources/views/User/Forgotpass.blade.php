@extends('User/Master')

@section('section')

<!-- Start of Forgot Password Form Section -->

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
                                    <h4>Forgot Password</h4>
                                </div>

                                <form action="{{ URL::to('/') }}/forgotpass_action" method="post" class="user-form">
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
                                        <button class="btn submit-button Dbutton" type="submit" name="btn">Forget</button>
                                    </div>
                                </form>

                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- End of Forgot Password Form Section -->

@endsection