@extends('admin.layouts.app')

@section('content')

				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('categories.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="" method="post" id="categoryform" name="categoryform">
                            <div class="card">
                                <div class="card-body">								
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <textarea  class="form-control" name="description" id="description" placeholder="ex. Describe shortly your category"></textarea>
                                                <p></p>	
                                            </div>
                                        </div>	
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Block</option>
                                                </select>	
                                            </div>
                                        </div>									
                                    </div>
                                </div>							
                            </div>
                            <div class="pb-5 pt-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{route('categories.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			
@endsection

@section('customjs')

<script> 
    $("#categoryform").submit(function(event){
        event.preventDefault();
        var element = $(this)
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("categories.store")}}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('categories.index')}}";

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#description").removeClass('is-invalid')
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

    
    
    
 </script>

@endsection