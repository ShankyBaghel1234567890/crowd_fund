@extends('user.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6  fa fa-heart">
								<h1>Donations</h1>
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
							<form action="" method="get">
                                <div class="card-header">
                                    <div class="card-title">
                                        <button type="button" onclick="window.location.href='{{ route("campaign.index")}}'" class="btn btn-default btn-sm">Reset</button>
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
                            </form>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>Campaign Name</th>
											<th>Donated by</th>
                                            <th>Amount</th>
                                            <th>Date</th>
										</tr>
									</thead>
									<tbody>
										@if ($donations->isNotEmpty())
											@foreach ($donations as $donation)
												
													<tr>
														<td>{{$donation->campaign->name}}</td>
														<td>{{$donation->name}}</td>
														<td>{{$donation->amount}}</td>
														<td>{{ $donation->created_at }}</td>
														
													</tr>
												
											@endforeach
											@else
											<p>No donations found.</p>
										@endif
									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
                                
								
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			
@endsection

@section('customjs')

<script>
	
</script>

@endsection