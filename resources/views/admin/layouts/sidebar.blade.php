

<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="{{route('admin.dashboard')}}" class="brand-link">
					<img src="{{asset('login-assets/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">Crowd Funding</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="{{route('admin.dashboard')}}" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Dashboard</p>
								</a>																
							</li>
							<li class="nav-item">
								<a href="{{route('categories.index')}}" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>Campaign Category</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('campaigns.index')}}" class="nav-link">
									<i class="nav-icon fas fa-flag-checkered"></i>
									<p>Campaign List</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('galleries.index')}}" class="nav-link">
									<!-- <i class="nav-icon fas fa-tag"></i> -->
									<i class="fas fa-image nav-icon"></i>
									<p>Gallery</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('admin.donation')}}" class="nav-link">
									<i class="nav-icon fas fa-money-bill"></i>
									<p>Donation</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{route('volunteers.index')}}" class="nav-link">
									<i class="nav-icon  fas fa-users" aria-hidden="true"></i>
									<p>Volunteers</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('admin.withdrawlogs')}}" class="nav-link">
									<i class="nav-icon fas fa-file-invoice "></i>
									<p>Withdraw Logs</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('usermanagement.index')}}" class="nav-link">
									<i class="nav-icon  far fa-user"></i>
									<p>User Management</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('report')}}" class="nav-link">
									<i class="nav-icon  fas fa-chart-pie"></i>
									<p>Report</p>
								</a>
							</li>							
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>