@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h2 class="text-center">Volunteer Registration Form</h2>
        <form action="" method="post" id="volunteerform" name="volunteerform">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="id_type">ID Type</label>
                <select class="form-control" id="id_type" name="id_type" >
                    <option value="">Select ID Type</option>
                    <option value="passport">Passport</option>
                    <option value="driver_license">Driver's License</option>
                    <option value="national_id">National ID</option>
                </select>
            </div>
            <div class="form-group">
                <label for="uid">UID</label>
                <input type="text" class="form-control" id="uid" name="uid" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" id="zip" name="zip" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="mother_name">Mother's Name</label>
                <input type="text" class="form-control" id="mother" name="mother" >
                <p></p>
            </div>
            <div class="form-group">
                <label for="father_name">Father's Name</label>
                <input type="text" class="form-control" id="father" name="father" >
                <p></p>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

 @endsection

 @section('customjs')
 
 <script>
 $("#campaignform").submit(function(event){
        event.preventDefault();
        var element = $(this)
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("volunteer.store")}}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('home')}}";

                    

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

                    $("#zip").removeClass('is-invalid')
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

                if(errors['zip']){
                    $("#zip").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['zip']);
                }else{
                    $("#zip").removeClass('is-invalid')
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
</script>
 @endsection