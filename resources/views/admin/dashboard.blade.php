@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Dashboard</h1>
							</div>
							<div class="col-sm-6">
								
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
							
							
							<div class="col-12 col-sm-6 col-md-4 offset-md-2">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
					
									<div class="info-box-content">
									<span class="info-box-text">Total Users</span>
									<span class="info-box-number">{{$user}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<div class="col-12 col-sm-6 col-md-4">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-week"></i></span>
					
									<div class="info-box-content">
									<span class="info-box-text">Total Donation</span>
									<span class="info-box-number">{{$donor}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<div class="col-12 col-sm-6 col-md-4 offset-md-2">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-flag"></i></span>
					
									<div class="info-box-content">
									<span class="info-box-text">Total Campaign</span>
									<span class="info-box-number">{{$campaign}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<div class="col-12 col-sm-6 col-md-4">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
					
									<div class="info-box-content">
									<span class="info-box-text">Total Volunteer</span>
									<span class="info-box-number">{{$volunteer}}</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							
					</div>					
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection

@section('customjs')

<script> 
    console.log("hello") 
 </script>

@endsection