@extends('admin.layouts.app')

@section('content')

				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Campaign</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('campaigns.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="" method="post" id="campaignform" name="campaignform">
                            <div class="card">
                                <div class="card-body">								
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lname">Category</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Select a Category</option>
                                                    @if ($categories->isNotEmpty())
                                                        @foreach ($categories as $category)
                                                            <option {{($campaign->category == $category->id) ?  'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fname">Campaign Name</label>
                                                <input type="text"  name="name" id="name" class="form-control" placeholder="Campaign Name" value="{{($campaign->name)}}">
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mname">Description</label>
                                                <textarea  class="form-control" name="description" id="description" placeholder="ex. Description" value="{{($campaign->description)}}"></textarea>
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="amount">Target Amount</label>
                                                <input type="number"  name="amount" id="amount" class="form-control" placeholder="ex. 20,000.00" value="{{($campaign->amount)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="dline">Deadline</label>
                                                <input type="date"  name="deadline" id="deadline" class="form-control" value="{{($campaign->deadline)}}">
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option {{($campaign->status == 1) ?  'selected' : ''}} value="1">Active</option>
                                                    <option {{($campaign->status == 0) ?  'selected' : ''}} value="0">Block</option>
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
                                <a href="{{route('campaigns.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			
@endsection

@section('customjs')

<script>

$("#campaignform").submit(function(event){
        event.preventDefault();
        var element = $(this)
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("campaigns.store")}}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('campaigns.index')}}";

                    

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#description").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#amount").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#deadline").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    
                }
                else{

                    var errors =response['errors']
                if(errors['category']){
                    $("#category").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['category']);
                }else{
                    $("#category").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['name']){
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['name']);
                }else{
                    $("#name").removeClass('is-invalid')
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

                if(errors['amount']){
                    $("#amount").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['amount']);
                }else{
                    $("#amount").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['deadline']){
                    $("#deadline").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['deadline']);
                }else{
                    $("#deadline").removeClass('is-invalid')
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