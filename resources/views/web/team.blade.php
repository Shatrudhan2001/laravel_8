@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>{{ $title; }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{ $title; }}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->


    <!-- About Section -->
    <section class="team-page-section">
        <div class="auto-container">
            <div class="row clearfix">
                @if(!empty($data))
                @foreach($data as $r)
                <div class="team-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ url('uploads/teams/'.$r->image) }}" alt="" />
                            <!-- Overlay Box -->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="{{ url('/contact') }}" class="theme-btn btn-style-one"><span class="txt">Get
                                                in Touch</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h5><a href="#">{{ $r->name; }}</a></h5>
                            <div class="designation">{{ $r->designation }}</div>
                            <!-- Social Nav -->

                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- Team Block Two -->
               

            </div>
        </div>
    </section>
    <!-- End About Section -->






    <!-- Call To Action Section Two -->
    <section class="call-to-action-section-two">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url({{ url('web/images/background/pattern-2.png') }}">
                <h3>Feel free to contact us with any questions or concerns <br> you may have. We’ll always be happy
                    to assist.</h3>
                <ul>
                    <li><span class="icon flaticon-phone-call"></span>+91 9876543210</li>
                    <li><span class="icon flaticon-email-1"></span>info@bsrs.in</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Call To Action Section Two -->
@endsection
