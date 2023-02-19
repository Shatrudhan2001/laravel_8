@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>Chairman Message</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Chairman Message</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->


    <!-- About Section -->
    <section class="team-detail-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image">
                            @if(!empty($data['image']))
                             <img src="{{ url('uploads/abouts/'.$data['image']) }}" alt="" />
                            @else
                            <img src="{{ url('web/images/resource/team-8.jpg') }}" alt="" />
                            @endif
                        </div>

                        <!-- Info Contact Box -->
                        <div class="info-contact-box">
                            <div class="inner-box">
                                <h5>Quick Contact</h5>
                                <ul class="contact-list">
                                    <li>Phone: <a href="tel:+91876543221">+91 9876543210 </a></li>
                                    <li>Email: <a href="mailto:#">info@bsrs.in</a></li>
                                </ul>
                                <!-- Social Nav -->

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--<div class="title">Chariman Name</div>-->
                        <!--<h2>Chairman Message</h2>-->
                             @if(!empty($data['description']))
                             <?= $data['description']; ?>
                             @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->






    <!-- Call To Action Section Two -->
    <section class="call-to-action-section-two">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url({{ url('images/background/pattern-2.png') }}">
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
