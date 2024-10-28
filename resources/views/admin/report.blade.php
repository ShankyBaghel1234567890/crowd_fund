@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6  ">
								<h1>Users</h1>
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
                           <div class="chart-title">
                              <h4>Raise per Month</h4><br>
                           </div>
                           <canvas id="bargraph"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </section>
   </div>
   </div>
   <!-- jQuery -->
   <script src="login-assets/jquery.min.js"></script>
   <script src="login-assets/js/adminlte.js"></script>
   <script src="login-assets/js/chart.js"></script>
   <script>
      document.addEventListener("DOMContentLoaded", function () {
         // Bar Chart
         var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novermber", "December"],
            datasets: [{
               label: 'Income',
               backgroundColor: 'rgb(79,129,189)',
               borderColor: 'rgba(0, 158, 251, 1)',
               borderWidth: 1,
               data: [15000, 2300, 5500, 17000, 25000, 30000, 2000, 15000, 22000, 34000, 35000, 55000]
            }]
         };

         var ctx = document.getElementById('bargraph').getContext('2d');
         window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
               responsive: true,
               legend: {
                  display: false,
               }
            }
         });

      });
   </script>
			
@endsection

@section('customjs')

<script>
	function deleteCampaign(id){
		var url = '{{route("campaign.delete","ID")}}';
		var newUrl = url.replace("ID",id);
		if(confirm('Are you sure want to delete')){
			$.ajax({
				url: newUrl,
				type: 'delete',
				data: {},
				dataType: 'json',
				headers: {
                	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		},
				success:function(response){

					if(response['status'] == true){

						window.location.href="{{route('campaign.index')}}";
					}
				}
			});
		}
	}
</script>

@endsection