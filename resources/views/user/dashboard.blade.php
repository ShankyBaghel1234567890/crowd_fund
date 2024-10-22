@extends('user.layouts.app')

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
					<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-12 col-sm-6 col-md-4 offset-md-2">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-flag"></i></span>
			
							<div class="info-box-content">
							<span class="info-box-text">Total Campaign</span>
							<span class="info-box-number">10</span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
						</div>
						<div class="col-12 col-sm-6 col-md-4">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>
			
							<div class="info-box-content">
							<span class="info-box-text">Total Donations</span>
							<span class="info-box-number">10</span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
						</div>
						<!-- ./col -->
					</div>

					</div><!-- /.container-fluid -->
				</section>
				<!-- /.content -->
@endsection

@section('customjs')

<script> 
    console.log("hello") 
 </script>

@endsection