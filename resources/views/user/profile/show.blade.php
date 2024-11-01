@extends('user.layouts.app')

@section('content')


<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1><span class="fa fa-user"></span> Profile</h1>
							</div>
							
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info elevation-2">
                  <br>
                  <div class="col-md-12 table-responsive">
                     <div class="card-body">
                     @foreach ($users as $user)
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <img src="{{asset('uploads/users/'.$user->image)}}" width="150" style="border-radius: 5px"><br><br>
                                 <label for="exampleInputFile">Profile</label>
                                 
                              </div>
                           </div>
                           <div class="col-md-9">
                              <div class="card-header">
                                 <span class="fa fa-user"> Profile Information</span>
                              </div>
                              
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Name : &nbsp;</label>  
                                       {{$user->name}}
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">ID Type : &nbsp;</label>
                                    {{$user->id_type}}
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">ID No. : &nbsp;</label>
                                    {{$user->idno}}
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Gender : &nbsp;</label>
                                    {{$user->gender}}
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Date Of Birth : &nbsp;</label>
                                       {{$user->dob}}
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Contact : &nbsp;</label>
                                       {{$user->phone}}
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Email : &nbsp;</label>
                                       {{$user->email}}
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Address : &nbsp;</label>
                                       {{$user->address}}
                                    </div>
                                 </div>
                                 <div class="pb-5 pt-3">
                                    <a href="{{route('profile.update',$user->id)}}" class="btn btn-outline-dark ml-3">Edit</a>
                                </div>
                                
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                     
                  </div>
               </div>
            </div>
         </section>

@endsection

@section('customjs')
   
<script>
	function deleteCampaign(id){
		var url = '';
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

						window.location.href="";
					}
				}
			});
		}
	}
</script>

@endsection