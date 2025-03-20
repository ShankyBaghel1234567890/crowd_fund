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
							<span class="info-box-number">{{$campaign}}</span>
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
							<span class="info-box-number">{{$donation}}</span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
						</div>
						<!-- ./col -->
					</div>
					<div class="row">
						<h3 class="mt-5">Your Donation Statistics</h3>
						<canvas id="donationChart"></canvas>

						<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
						<script>
							document.addEventListener("DOMContentLoaded", function () {
								var ctx = document.getElementById("donationChart").getContext("2d");

								var donationChart = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: ["Today", "This Week", "This Month", "This Year"],
										datasets: [{
											label: 'Total Donations',
											data: [
												{{ $donationStats['daily'] }},
												{{ $donationStats['weekly'] }},
												{{ $donationStats['monthly'] }},
												{{ $donationStats['yearly'] }}
											],
											backgroundColor: [
												'rgba(75, 192, 192, 0.6)',
												'rgba(54, 162, 235, 0.6)',
												'rgba(255, 206, 86, 0.6)',
												'rgba(255, 99, 132, 0.6)'
											],
											borderColor: [
												'rgba(75, 192, 192, 1)',
												'rgba(54, 162, 235, 1)',
												'rgba(255, 206, 86, 1)',
												'rgba(255, 99, 132, 1)'
											],
											borderWidth: 1
										}]
									},
									options: {
										responsive: true,
										scales: {
											y: {
												beginAtZero: true
											}
										}
									}
								});
							});
						</script>
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