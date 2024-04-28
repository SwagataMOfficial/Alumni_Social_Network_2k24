@include('sub_admin.sub_sidenavbar')
<!DOCTYPE html>
<html lang="en">

<body>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><b>Dashboard</b></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row mb-4">
                    <!-- Total User -->
                    <div class="col-lg-6 col-12 mb-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$totalUser}}</h3>
                                <p class="mb-3">Total User</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Sub-Admin -->
                    <div class="col-lg-6 col-12 mb-4" >
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$totalSubAdmin}}</h3>
                                <p class="mb-3">Total Sub-Admin</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
               
                    <div class="col-lg-6 col-12 mb-4">
                      <!-- Total Posts -->
                      <div class="small-box bg-danger mb-4" style="height: 140px;">
                          <div class="inner">
                              <h3>{{$totalPost}}</h3>
                              <p><b>Total Posts</b></p>
                          </div>
                          <div class="icon">
                              <i class="bi bi-check-circle" style="font-size: 4rem;"></i>
                          </div>
                      </div>

                        <!-- Total Reported User -->
                        <div class="card mb-4" style="height: 140px; background-color:#F07857">
                            <div class="card-body">
                                <div class="inner">
                                    <h2>{{$totalReportedUsers}}</h2>
                                    <p class="mb-3"><b>Total Reported User</b></p>
                                    <div class="icon">
                                        <i class="fas fa-exclamation-circle fa-3x"
                                            style="color: rgba(255, 255, 255, 0.5); position: absolute; right:20px; top:40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <div class="card">
                          <div class="card-body">
                              <h1>Recent join Alumni</h1>
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                        $count = 1;
                                    @endphp

                                    @foreach ($recentUsers as $user )
                                        <tr>
                                          <td>{{$count}}</td>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->email}}</td>
                                        </tr>
                                        @php
                                             $count++;
                                        @endphp
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
  </div>
  <!-- Main content -->

  <!-- ./wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
      $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>




  <!-- REQUIRED SCRIPTS -->
  <!-- Bootstrap 4 -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the current URL
    var currentUrl = window.location.href;

    // Get all the navbar link elements
    var navLinks = document.querySelectorAll('.nav-link');

    // Loop through each navbar link to check if the current URL matches its href
    navLinks.forEach(function(link) {
        if (currentUrl.includes(link.href)) {
            // Add the "active" class to the navbar link
            link.classList.add('active');

            // If the navbar link is inside a dropdown menu, add the "menu-open" class to its parent
            var parentLi = link.parentElement;
            if (parentLi.classList.contains('nav-item') && parentLi.querySelector('.nav-treeview')) {
                parentLi.classList.add('menu-open');
            }
        } else {
            // Remove the "active" class from the navbar link
            link.classList.remove('active');
        }
    });
});
</script>
</body>

</html>
