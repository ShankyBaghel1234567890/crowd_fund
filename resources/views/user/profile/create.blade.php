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
            <form action="" method="post" id="userform" name="userform">
               @csrf
               <div class="card card-info elevation-2">
                  <br>
                  <div class="col-md-12 table-responsive">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="mb-3">
                                    <label for="image">Profile</label>
                                    <div id="image" class="dropzone dz-clickable">
                                       <div class="dz-message needsclick">
                                          <br>Drop files here or click to upload.<br><br>
                                       </div>
                                    </div>
                                 <p></p>	
                              </div>
                           </div>
                           <div class="col-md-9">
                              <div class="card-header">
                                 <span class="fa fa-user"> Profile Information</span>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"> Name</label>
                                       <input type="text" id="name" name="name" class="form-control" placeholder=" name" value="{{$users->name}}">
                                    </div>
                                    <p></p>
                                 </div>
                                 
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Gender</label>
                                       <select class="form-control"  id="gender" name="gender" value="{{$users->gender}}">
                                          <option>Male</option>
                                          <option>Female</option>
                                       </select>
                                    </div>
                                    <p></p>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Date of Birth</label>
                                       <input type="date"  id="dob" name="dob" class="form-control" placeholder="last name" value="{{$users->dob}}">
                                    </div>
                                    <p></p>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Contact</label>
                                       <input type="number" id="phone" name="phone" class="form-control" placeholder="contact" value="{{$users->phone}}">
                                    </div>
                                    <p></p>
                                 </div>
                                 <div class="form-group">
                                    <label>ID</label>
                                    <select class="form-control"  id="id_type" name="id_type">
                                       <option>Aadhaar</option>
                                       <option>PAN</option>
                                       <option>Voter's ID</option>
                                       <option>Driving License</option>
                                       <p></p>
                                    </select>
                                    <input type="text" id="idno" name="idno" class="form-control" placeholder="ID No." value="{{$users->idno}}">
                                    <p></p>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Address</label>
                                       <input type="text" id="address" name="address" class="form-control" placeholder="address" value="{{$users->address}}">
                                    </div>
                                    <p></p>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="pb-5 pt-3">
                           <button type="submit" class="btn btn-primary">Save</button>
                           <a href="{{route('user.profile')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </form>
            </div>
         </section>

@endsection

@section('customjs')
   
<script>

$("#userform").submit(function(event){
        event.preventDefault();
        var element = $("#userform")
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("profile.store",$users->id)}}',
            type: 'put',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('user.profile')}}";

                    

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#gender").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#dob").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#phone").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#id_type").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#idno").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#address").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    
                    
                }
                else{

                    var errors =response['errors']
                if(errors['name']){
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['name']);
                }else{
                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['gender']){
                    $("#gender").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['gender']);
                }else{
                    $("#gender").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['dob']){
                    $("#dob").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['dob']);
                }else{
                    $("#dob").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['phone']){
                    $("#phone").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['phone']);
                }else{
                    $("#phone").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

               if(errors['id_type']){
                  $("#id_type").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback').html(errors['id_type']);
               }else{
                  $("#id_type").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback').html("");
               }

                if(errors['idno']){
                    $("#idno").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['idno']);
                }else{
                    $("#idno").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['address']){
                    $("#address").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['address']);
                }else{
                    $("#address").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                
                }
                
            }, error:function(jqXHR,exception){
                console.log("Something went wrong")
            }
        })
    });

    Dropzone.autoDiscover = false;    
    const dropzone = $("#image").dropzone({ 
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url:  "{{route('temp-images.create')}}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, success: function(file, response){
            $("#image_id").val(response.image_id);
            //console.log(response)
        }
    });
</script>

@endsection