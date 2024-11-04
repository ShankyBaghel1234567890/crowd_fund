@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6  ">
								<h1>Report</h1>
							</div>
							
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
                <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           
                           <div class="container mt-5">
                              <h1 class="text-center">Total Raised Funds for {{ $year }}</h1>
                              <canvas id="fundsChart" width="400" height="200"></canvas>
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
        // Prepare monthly totals data for Chart.js
        const monthlyTotals = @json($monthlyTotals);
        const ctx = document.getElementById('fundsChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'January', 'February', 'March', 'April', 'May', 'June', 
                    'July', 'August', 'September', 'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Total Raised Funds (₹)',
                    data: monthlyTotals,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Amount in INR'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Monthly Total Raised Funds for ' + '{{ $year }}'
                    }
                }
            }
        });
    </script>

 

@endsection