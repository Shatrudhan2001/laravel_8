@extends('admin.layouts.main') @section('main.container')
    <!-- Container Start -->
    <div class="page-wrapper">
        <div class="main-content">
            <!-- Page Title Start -->
            <div class="row">
                <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-title-wrapper">
                        <div class="page-title-box">
                            <h4 class="page-title">{{ $title }}</h4>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li class="breadcrumb-link">
                                    <a href="{{ url('/dashboard') }}"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                </li>
                                <li class="breadcrumb-link active">{{ $title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="from-wrapper">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div style="border: 1px solid; padding: 10px; margin-right: 20px;">
                                        <p><b>Name :</b> {{ $memberData->name;}}</p>
                                        <p><b>Email :</b> {{ $memberData->email;}}</p>
                                        <p><b>Mobile :</b> {{ $memberData->phone;}}</p>
                                    
                                    </div>
                                    <a href="{{ url('ToPayment/'.$member_id) }}" class="btn btn-success btn-sm" style="float: right;"> To Pay <a>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                @error('image')
                                    <div class="alert alert-danger mb-2 col-lg-6 offset-3 text-center">{{ $message }}</div>
                                    @enderror 
                                    @if (session('status'))
                                        <div class="alert alert-success mb-2 col-lg-6 offset-3 text-center">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="chart-holder">
                                        <div class="table-responsive">
                                            <table class="table table-styled mb-0">
                                                <thead>
                                                    <tr>
                                                      <th scope="col">S.No</th>
                                                      <th scope="col">Month</th>
                                                      <th scope="col">Opening Balance</th>
                                                      <th scope="col">Monthly Subscription</th>
                                                      <th scope="col">Amount Paid</th>
                                                      <th scope="col">Closing Balance</th>
                                                      <th scope="col">Mode of Payment</th>
                                                      <th scope="col">Payment Date</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @if(!empty($data))
                                                        <?php $i = 1; ?>
                                                        @foreach($data as $r)
                                                            <?php $date = date_create($r->created_on); ?>
                                                            <tr>
                                                              <th scope="row"><?= $i++; ?></th>
                                                              <td style="width:120px"><?= date_format($date,"d-F"); ?></td>
                                                              <td>{{ $r->opening_balance; }}</td>
                                                              <td>{{ $r->subscriptions; }}</td>
                                                              <td>{{ $r->amount; }}</td>
                                                              <td>{{ $r->closing_balance; }}</td>
                                                              <td>{{ $r->payment_mode; }}</td>
                                                              <td>{{ $r->created_on; }}</td>
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
                    </div>
                </div>
                <!-- Products view Start -->
            @endsection
        </div>
    </div>
