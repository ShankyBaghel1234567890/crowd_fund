@extends('admin.layouts.app')

@section('content')

				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Volunteer</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('volunteers.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="" method="post" id="volunteerform" name="volunteerform">
                            <div class="card">
                                <div class="card-body">								
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name">Volunteer Name</label>
                                                <input type="text"  name="name" id="name" class="form-control" placeholder="Volunteer Name" value="{{($volunteer->name)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="text"  name="email" id="email" class="form-control" placeholder="email" value="{{($volunteer->email)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="id_type">ID Type</label>
                                                <input type="text"  name="id_type" id="id_type" class="form-control" placeholder="id_type" value="{{($volunteer->id_type)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="uid">UID</label>
                                                <input type="text"  name="uid" id="uid" class="form-control" placeholder="uid" value="{{($volunteer->uid)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone">Phone</label>
                                                <input type="text"  name="phone" id="phone" class="form-control" placeholder="Campaign Name" value="{{($volunteer->phone)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="occupation">Occupation</label>
                                                <input type="text"  name="occupation" id="occupation" class="form-control" placeholder="occupation" value="{{($volunteer->occupation)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="address">Address</label>
                                                <input type="text"  name="address" id="address" class="form-control" placeholder="address" value="{{($volunteer->address)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="city">City</label>
                                                <input type="text"  name="city" id="city" class="form-control" placeholder="city" value="{{($volunteer->city)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="state">State</label>
                                                <input type="text"  name="state" id="state" class="form-control" placeholder="ex. 20,000.00" value="{{($volunteer->state)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="country">Country</label>
                                                <input type="text"  name="country" id="country" class="form-control" value="{{($volunteer->country)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="zip_code">Zip Code</label>
                                                <input type="text"  name="zip_code" id="zip_code" class="form-control" value="{{($volunteer->zip_code)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mother">Mother Name</label>
                                                <input type="text"  name="mother" id="mother" class="form-control" value="{{($volunteer->mother)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="father">Father Name</label>
                                                <input type="text"  name="father" id="father" class="form-control" value="{{($volunteer->father)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option {{($volunteer->status == 1) ?  'selected' : ''}} value="1">Active</option>
                                                    <option {{($volunteer->status == 0) ?  'selected' : ''}} value="0">Block</option>
                                                </select>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="image">Banner</label>
                                                <div id="image" class="dropzone dz-clickable">
                                                    <div class="dz-message needsclick">
                                                        <br>Drop files here or click to upload.<br><br>
                                                    </div>
                                                </div>
                                                	
                                            </div>
                                        </div>
                                       									
                                    </div>
                                </div>							
                            </div>
                            <div class="pb-5 pt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('volunteers.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			
@endsection

@section('customjs')

<script>

$("#volunteerform").submit(function(event){
        event.preventDefault();
        var element = $(this)
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("volunteers.update", $volunteer->id)}}',
            type: 'put',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('volunteers.index')}}";

                    

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#id_type").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#uid").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#phone").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#occupation").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");


                    $("#address").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#city").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#state").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#country").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#zip_code").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#mother").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#father").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    
                }
                else{

                if(errors['name']){
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['name']);
                }else{
                    $("#name").removeClass('is-invalid')
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

                if(errors['uid']){
                    $("#uid").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['uid']);
                }else{
                    $("#uid").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['email']){
                    $("#email").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['email']);
                }else{
                    $("#email").removeClass('is-invalid')
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

                if(errors['occupation']){
                    $("#occupation").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['occupation']);
                }else{
                    $("#occupation").removeClass('is-invalid')
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

                if(errors['city']){
                    $("#city").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['city']);
                }else{
                    $("#city").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['state']){
                    $("#state").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['state']);
                }else{
                    $("#state").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['country']){
                    $("#country").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['country']);
                }else{
                    $("#country").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['zip_code']){
                    $("#zip_code").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['zip_code']);
                }else{
                    $("#zip_code").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['mother']){
                    $("#mother").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['mother']);
                }else{
                    $("#mother").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['father']){
                    $("#father").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['father']);
                }else{
                    $("#father").removeClass('is-invalid')
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
        url:  "#",
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