@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>News and Updates</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>News and Updates</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->


    <!-- About Section -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="our-blogs">
                        @if(!empty($news_details))
                        <!-- News Block Two -->
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image">
                                  <img src="{{ url('uploads/news/'.$news_details->image) }}" alt="" />
                                @php
                             $datetime = new DateTime($news_details->created_at);
                            @endphp        
                            <div class="post-date"> 
                            {{ $datetime->format('d');  }}<br><span>{{ strtoUpper($datetime->format('F')); }}</span></div>
                                </div>
                                <div class="lower-content">

                                    <h3>{{ $news_details->title }}</h3>
                                    <div class="text" align="justify">
                                        <?= $news_details->description; ?>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                       
                        @endif
                       
                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">



                        <!-- category -->
                        <div class="sidebar-widget category-widget-two">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h5>Latest News</h5>
                                </div>

                                <ul class="cat-list-two">
                                    @if(!empty($news_list))
                                    @foreach($news_list as $r)
                                    <li><a href="{{ url('news-details/'.$r->id)}}">{{ $r->title }}</a></li>
                                   @endforeach
                                   @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Popular Posts -->




                    </aside>
                </div>

            </div>
        </div>
    </div>
    <!-- Call To Action Section Two -->
    <section class="call-to-action-section-two">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url({{ url('images/background/pattern-2.png') }})">
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
