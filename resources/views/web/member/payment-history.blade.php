@extends('web.member.layouts.main')
@section('main.container')
  <section class="team-detail-section" style="margin-bottom: 190px;">
		<div class="auto-container">
			<div class="row clearfix">
				 @if(session('status'))
                    <div class="alert alert-success text-center">
                    <b>{{ session('status') }}</b>
                    </div>
                @endif

                <h3 class="text-center" style="background: #e5e5e5;">{{ $title }}</h3>
               
				<div class="content-column col-lg-12 col-md-12 col-sm-12 card p-4 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">S.No</th>
                          <th scope="col">Month</th>
                          <th scope="col">Opening Balance</th>
                          <!--<th scope="col">Monthly Subscription</th>-->
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
                                  <td><?= date_format($date,"d-F"); ?></td>
                                  <td>{{ $r->opening_balance; }}</td>
                                  <!--<td>{{ $r->subscriptions; }}</td>-->
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
	</section>
@endsection
