@extends('user.layouts.app')

@section('content')

				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Gallery</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('usergalleries.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="" method="post" id="galleryform" name="galleryform">
                            <div class="card">
                                <div class="card-body">								
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lname">Campaigns</label>
                                                <select name="campaign" id="campaign" class="form-control">
                                                    <option value="">Select a Campaign</option>
                                                    @if ($campaigns->isNotEmpty())
                                                        @foreach ($campaigns as $campaign)
                                                            <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <p></p>
                                            </div>
                                        </div>
                                        	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mname">Description</label>
                                                <textarea  class="form-control" name="description" id="description" placeholder="ex. Description"></textarea>
                                                <p></p>	
                                            </div>
                                        </div>
                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="hidden" id="image_id" name="image_id" value="">
                                                <label for="image">Banner</label>
                                                <div id="image" class="dropzone dz-clickable">
                                                    <div class="dz-message needsclick">
                                                        <br>Drop files here or click to upload.<br><br>
                                                    </div>
                                                </div>
                                                <p></p>	
                                            </div>
                                        </div>
                                       									
                                    </div>
                                </div>							
                            </div>
                            <div class="pb-5 pt-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{route("usergalleries.index")}}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			
@endsection

@section('customjs')

<script>

$("#galleryform").submit(function(event){
        event.preventDefault();
        var element = $("#galleryform")
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("usergalleries.store")}}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('galleries.index')}}";

                    

                    $("#image").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#description").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    
                    
                }
                else{

                    var errors =response['errors']
                if(errors['campaign']){
                    $("#campaign").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['campaign']);
                }else{
                    $("#campaign").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['image']){
                    $("#image").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['image']);
                }else{
                    $("#image").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['description']){
                    $("#description").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['description']);
                }else{
                    $("#description").removeClass('is-invalid')
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