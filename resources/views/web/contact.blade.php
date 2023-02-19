@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>{{  $title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{  $title }}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
   <section class="about-section">
       
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12">
                   <div class="faq-form">
                     
                     <!-- Contact Form -->
                    @if(session('status'))
                        <div class="alert alert-success text-center">
                            <b>{{ session('status') }}</b>
                        </div>
                     @endif
                     <form method="post" action="{{ url('SaveEnquiry') }}" id="formData">
                     @csrf
                        <div class="row clearfix">
                        
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" id="name" name="name" placeholder="Your Name*" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                              @error('name')
                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                           </div>
                           
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="email" name="email" id="email" placeholder="Email*" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                               @error('email')
                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                           </div>
                           
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" name="mobile" id="mobile" placeholder="Mobile No." class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}">
                               @error('mobile')
                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                           </div>
                           
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" name="address" id="address" placeholder="Address" value="{{ old('address') }}">
                           </div>
                           
                           
                           <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                              <textarea name="message" id="message" placeholder="Message">{{ old('message') }}</textarea>
                           </div>
                           
                           <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                              <button class="theme-btn btn-style-one" type="submit"><span class="txt">Submit</span></button>
                           </div>
                           
                        </div>
                     </form>
                     
                     <!--End Contact Form -->
                  </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">
                         <div class="sidebar-widget category-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                <h5>Contact us</h5>
                                </div>

                                <ul class="cat-list">
                                <li><a href="#">+91 9632587414</a></li>
                                <li><a href="#">infogsj@gmai.com</a></li>
                                {{-- <li><a href="#">H-12, Rajiv Chok Delhi -110022</a></li> --}}
                                </ul>
                            </div>
                        </div>  
                    </aside>
                </div>
            </div>
        </div>
    </section>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55984.327868542445!2d77.11190332765504!3d28.7189336005275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0142b26feebf%3A0xa2c1e84000b80b9f!2sBluemaps%20Infratel%20Pvt%20Ltd.!5e0!3m2!1sen!2sin!4v1640626071097!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
@endsection
