@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>{{ $title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{ $title }}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->


    <!-- About Section -->
    <section class="about-section">
        <div class="icon-one" style="background-image: url({{ url('web/images/icons/covid.png') }})"></div>
        <div class="icon-two" style="background-image: url({{ url('web/images/icons/icon-1.png') }})"></div>
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Images Column -->
                <div class="images-column col-lg-12 col-md-12 col-sm-12">
                     <h3 class="text-center">Default Members</h3>
                    <div class="inner-column">
                        <div class="row clearfix">
                           
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">S.No</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if(!empty($member_list))
                                <?php $i = 1; ?>
                                @foreach($member_list as $r)
                                <tr>
                                  <th scope="row"><?= $i++; ?></th>
                                  <td>{{ $r->name; }}</td>
                                  <td>{{ $r->email; }}</td>
                                  <td>{{ $r->phone; }}</td>
                                </tr>
                                @endforeach
                                @endif
                                
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->


@endsection
