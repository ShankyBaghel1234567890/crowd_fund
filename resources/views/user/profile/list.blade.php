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
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <img src="assets/img/profile.png" width="150" style="border-radius: 5px"><br><br>
                                 <label for="exampleInputFile">Choose Profile</label>
                                 <div class="input-group">
                                    <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="exampleInputFile">
                                       <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-9">
                              <div class="card-header">
                                 <span class="fa fa-user"> Profile Information</span>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">First Name</label>
                                       <input type="email" class="form-control" placeholder="first name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Middle Name</label>
                                       <input type="email" class="form-control" placeholder="middle name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Last Name</label>
                                       <input type="email" class="form-control" placeholder="last name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Gender</label>
                                       <select class="form-control">
                                          <option>Male</option>
                                          <option>Female</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Birthday</label>
                                       <input type="date" class="form-control" placeholder="last name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Contact</label>
                                       <input type="number" class="form-control" placeholder="contact">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Email</label>
                                       <input type="email" class="form-control" placeholder="email">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Address</label>
                                       <input type="email" class="form-control" placeholder="address">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="card-header">
                                       <span class="fa fa-key"> Account</span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Username</label>
                                       <input type="email" class="form-control" placeholder="username">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Password</label>
                                       <input type="email" class="form-control" placeholder="**********">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
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