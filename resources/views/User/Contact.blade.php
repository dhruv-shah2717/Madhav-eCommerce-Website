@extends('User/Master')

@section('section')

<!-- Start of Address, Contact Form, and Map Section -->

    <section class="contact-section Dhruv">
        <div class="container Size">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4">
                <div class="col">
                    <div class="contact-address">
                        <h4 class="address-heading">Contact Info</h4>
                        <ul class="address-details">

                            @foreach($data['Information'] as $row)
                            
                            <li>
                                <h6><i class="{{ $row->Information_icon }}"></i>{{ $row->Information_heading }}</h6>
                                <p>{{ $row->Information_description }}</p>
                            </li>
                            
                            @endforeach

                        </ul>
                    </div>

                    <div class="contact-form">
                        <h4 class="form-heading">Send Message</h4>
                        <form action="{{ URL::to('/') }}/contact_action" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="text" placeholder="Enter your Name" name="fname" value="{{ old('fname') }}" 
                                class="form-input Dinput">
                                <div class="error">
                                    @error('fname')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Enter your Email" name="email" value="{{ old('email') }}"
                                class="form-input Dinput">
                                <div class="error">
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Enter your Phone" name="phone" value="{{ old('phone') }}"
                                class="form-input Dinput">
                                <div class="error">
                                    @error('phone')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea placeholder="Enter your Message" name="com" class="form-textarea Dinput">{{ old('com') }}</textarea>
                                <div class="error">
                                    @error('com')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn submit-button Dbutton">Send Message</button>
                        </form>
                    </div>
                </div>

                <div class="col">
                    <div class="contact-map">
                        <iframe src="{{ $data['Map']->Map_link }}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- End of Address, Contact Form, and Map Section -->

@endsection