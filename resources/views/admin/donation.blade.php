@extends('admin.layouts.app')

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
											<th width="130">Action</th>
										</tr>
									</thead>
									<tbody>
                                        
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
	function deleteCampaign(id){
		var url = '{{route("campaign.delete","ID")}}';
		var newUrl = url.replace("ID",id);
		if(confirm('Are you sure want to delete')){
			$.ajax({
				url: newUrl,
				type: 'delete',
				data: {},
				dataType: 'json',
				headers: {
                	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		},
				success:function(response){

					if(response['status'] == true){

						window.location.href="{{route('campaign.index')}}";
					}
				}
			});
		}
	}
</script>

@endsection