<!DOCTYPE html>
<html lang="en">
  @include('admin.layout.header')
<body>
    <div class="wrapper d-flex">
        <!-- Sidebar -->
         @include('admin.layout.sidebar')

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
              @include('admin.layout.nav')

            <!-- Main Content -->
            <div class="container-fluid p-4">
               
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="m-0">Dashboard</h2>
                        <p class="text-muted">Welcome back! Here's what's happening with your business today.</p>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                {{-- <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card dashboard-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Total Revenue</h5>
                                        <h2 class="mt-2">$24,582</h2>
                                        <p class="card-text"><span class="text-success"><i class="fas fa-arrow-up"></i> 18.2%</span> from last week</p>
                                    </div>
                                    <div class="card-icon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card dashboard-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Customers</h5>
                                        <h2 class="mt-2">1,846</h2>
                                        <p class="card-text"><span class="text-success"><i class="fas fa-arrow-up"></i> 12.8%</span> from last week</p>
                                    </div>
                                    <div class="card-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card dashboard-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Orders</h5>
                                        <h2 class="mt-2">428</h2>
                                        <p class="card-text"><span class="text-success"><i class="fas fa-arrow-up"></i> 7.5%</span> from last week</p>
                                    </div>
                                    <div class="card-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card dashboard-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Conversion Rate</h5>
                                        <h2 class="mt-2">4.28%</h2>
                                        <p class="card-text"><span class="text-danger"><i class="fas fa-arrow-down"></i> 1.2%</span> from last week</p>
                                    </div>
                                    <div class="card-icon">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                
                <!-- Charts Row -->
                {{-- <div class="row mb-4">
                    <div class="col-xl-8 col-lg-7">
                        <div class="card dashboard-card">
                            <div class="card-header bg-white">
                                <h5 class="m-0">Revenue Overview</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="revenueChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-5">
                        <div class="card dashboard-card">
                            <div class="card-header bg-white">
                                <h5 class="m-0">Traffic Sources</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="trafficChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                 @yield('content')
                <!-- Recent Activity & Top Products -->
                {{-- <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card dashboard-card">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="m-0">Recent Activity</h5>
                                <a href="#" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Activity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sarah Johnson</td>
                                                <td>Placed an order</td>
                                                <td>10 min ago</td>
                                            </tr>
                                            <tr>
                                                <td>Michael Brown</td>
                                                <td>Completed payment</td>
                                                <td>30 min ago</td>
                                            </tr>
                                            <tr>
                                                <td>Amanda Miller</td>
                                                <td>Created an account</td>
                                                <td>1 hour ago</td>
                                            </tr>
                                            <tr>
                                                <td>John Smith</td>
                                                <td>Submitted a review</td>
                                                <td>2 hours ago</td>
                                            </tr>
                                            <tr>
                                                <td>Emma Wilson</td>
                                                <td>Requested a refund</td>
                                                <td>5 hours ago</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-lg-12">
                        <div class="card dashboard-card">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="m-0">Top Products</h5>
                                <a href="#" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Wireless Headphones</td>
                                                <td>$199.99</td>
                                                <td>182</td>
                                                <td><span class="badge bg-success">In Stock</span></td>
                                            </tr>
                                            <tr>
                                                <td>Smart Watch Series 5</td>
                                                <td>$279.99</td>
                                                <td>124</td>
                                                <td><span class="badge bg-warning">Low Stock</span></td>
                                            </tr>
                                            <tr>
                                                <td>Bluetooth Speaker</td>
                                                <td>$89.99</td>
                                                <td>95</td>
                                                <td><span class="badge bg-success">In Stock</span></td>
                                            </tr>
                                            <tr>
                                                <td>Phone Charging Dock</td>
                                                <td>$49.99</td>
                                                <td>74</td>
                                                <td><span class="badge bg-success">In Stock</span></td>
                                            </tr>
                                            <tr>
                                                <td>Fitness Tracker</td>
                                                <td>$69.99</td>
                                                <td>62</td>
                                                <td><span class="badge bg-danger">Out of Stock</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            
        </div>
    </div>


    
  @include('admin.layout.footer')
</body>
</html>