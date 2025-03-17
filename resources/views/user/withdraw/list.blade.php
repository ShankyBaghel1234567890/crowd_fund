@extends('user.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6  fa fa-heart">
								<h1>Withdrawls</h1>
							</div>
							
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        @include('account.message')
						<div class="card">
						
						<form action="{{ route('withdraw.store') }}" method="post" id="withdrawform-{{ $campaigns->id }}" name="withdrawform"></form>
							@csrf
                                <div class="card-header">
                                    <div class="card-title">
                                        <button type="button" onclick="window.location.href='{{ route("user.withdraw")}}'" class="btn btn-default btn-sm">Reset</button>
                                    </div>
                                    <div class="card-tools">
                                        <div class="input-group input-group" style="width: 250px;">
                                            <input value="{{Request::get('keyword')}}" type="text" name="keyword" class="form-control float-right" placeholder="Search">
                        
                                            <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="card-body table-responsive p-0">								
									<table class="table table-hover text-nowrap">
										<thead>
											<tr>
												<th>Campaign Name</th>
												<th>Date of Approval</th>
												<th>Total Amount</th>
												<th>Status</th>
												<th width="130">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>@foreach ($campaigns as $campaign)
												
												<th>{{ $campaign->name }}</th>
												<th>{{ $campaign->last_updated ? $campaign->last_updated->format('Y-m-d H:i:s') : 'N/A' }}</th>
												<th>{{ number_format($campaign->total_donated, 2) }}</th>
												<th>
													@php
														// Check if there's a pending withdrawal for this campaign
														$withdrawal = $withdraws->where('campaign_id', $campaign->id)->first();
													@endphp
													@if ($withdrawal)
														
															@if ($withdrawal->status == 'completed')
															<span class="badge bg-danger">withdrawn</span>
															@elseif($withdrawal->status == 'rejected')
															<span class="badge bg-red">Rejected</span>
															@else
															<span class="badge bg-green">Pending</span>
															@endif
														
													@else
															<span class="badge bg-blue">Approve</span>
													@endif
												</th>
												<th>
												@if ($withdrawal->status == 'completed')
													<span class="badge bg-danger">Completed</span>
													@elseif($withdrawal->status == 'rejected')
													<span class="badge bg-red">Abort</span>
													@elseif($withdrawal->status == 'pending')
													<span class="badge bg-green">Requested</span>
												@else
													<input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
													<button type="submit" onclick="submitWithdrawForm({{ $campaign->id }})" class="btn btn-primary">Request Withdrawl</button>
												@endif
												</th>
											
											@endforeach	
							 				</tr>
										</tbody>
									</table>
                            											
							</div>
							<div class="card-footer clearfix">
                                
								
							</div>
							</form>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			
@endsection

@section('customjs')

<script>
	function submitWithdrawForm(campaignId) {
    var form = $("#withdrawform-" + campaignId);
    form.submit(function(event) {
        event.preventDefault();
        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: '{{ route("withdraw.store") }}',
            type: 'post',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response.success) {
                    alert(response.success);
                    window.location.href = "{{ route('user.withdraw') }}";
                }
            },
            error: function(jqXHR, exception) {
                $("button[type=submit]").prop('disabled', false);
                alert(jqXHR.responseJSON.error);
            }
        });
    });
}
</script>

@endsection