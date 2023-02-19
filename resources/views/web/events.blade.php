@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>Our Events</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Our Events</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->


    <!-- About Section -->
    <section class="blog-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">Update Activities and Events</div>
                <h2>Recent Events</h2>
                <div class="text">Dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                    proident
                    <br> sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>

            <div class="row clearfix">

                <!-- News Block -->
                @if(!empty($event_list))
                @foreach($event_list as $r)
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="{{ url('events-details/'.$r->id)}}"><img src="{{ url('uploads/events/'.$r->image) }}" alt="" /></a>
                             @php
                             $datetime = new DateTime($r->created_at);
                            @endphp
                            <div class="post-date"> {{ strtoUpper($datetime->format('d F Y')); }}</div>
                        </div>
                        <div class="lower-content">

                            <h4><a href="{{ url('events-details/'.$r->id)}}">{{ $r->title }}</a></h4>
                            <div class="text">{{\Illuminate\Support\Str::limit(strip_tags($r->description, 20))}}</div>
                            <a href="{{ url('events-details/'.$r->id) }}" class="read-more theme-btn">View More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </div>
        </div>
    </section>
    <!-- End About Section -->






    <!-- Call To Action Section Two -->
    <section class="call-to-action-section-two">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url({{ url('web/images/background/pattern-2.png') }})">
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
