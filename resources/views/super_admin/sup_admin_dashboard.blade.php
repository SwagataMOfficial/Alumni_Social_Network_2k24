<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- other sidebar content -->
    </div>
    <!-- /.sidebar -->
  </aside>


    @include('super_admin.sidenavbar')
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6 mb-8">
            <!-- small box -->
            <div class="small-box bg-info total-user" >
              <div class="inner">
                <h3>150</h3>
                <p class="mb-3">Total User</p>    
              </div>
              <div class="icon style=right">
                <i class="icon fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6 col-md-12">
            <!-- small box -->
            <div class="small-box bg-success bounce-rate">
              <div class="inner">
                <h3>10</h3>
                <p class="mb-3">Total Sub-Admin</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6 col-md-12 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>10032</h3>
                <p>Total Posts</p>
              </div>
              <div class="icon">
                <i class="bi bi-check-circle"style="font-size: 4rem;"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- User Registrations and Additional Card -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning registration-section" style="height: 150px;">
              <div class="inner">
                <h3>205</h3>
                <p><b>Visitors</b></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            <div class="card">
              <div class="card-body" style="height: 150px; background-color:#F07857" >
              <div class="inner">
                <h2>15</h2>
                <p class="mb-3"><b>Total Repoted User</b></p>   <div class="icon">
                <i class="fas fa-exclamation-circle fa-3x" style="color: rgba(255, 255, 255, 0.5); position: absolute; right:20px; top:40px;"></i>


              </div>  
              </div>
             
              </div>
            </div>
          </div>
          <!-- Table -->
          <div class="col-lg-8 col-md-6 col-sm-12 col-12">
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
                    <tr>
                      <td>1</td>
                      <td>Mcneil, Burke Q.</td>
                      <td>samarpita@gmaicom</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Burris, Lesley T.</td>
                      <td>samarpita@gmaicom</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Sears, Drew G.</td>
                      <td>samarpita@gmaicom</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Oconnor, Jocelyn A.</td>
                      <td>samarpita@gmaicom</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Stewart, Anika M.</td>
                      <td>samarpita@gmaicom</td>
                    </tr>
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
  <!-- ./wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>




<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>



