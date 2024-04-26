<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">

                <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i
                        class="fas fa-bars"></i></a>
                <span>
                    <h2>Sub Admin</h2>
                </span>
            </ul>

            <!-- Right navbar links -->
           
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            <a href="{{ route('sub.admin.dashboard') }}" class="brand-link">
                <img src="../dist\img\Admin.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Sub Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class-->

                        <li class="nav-item menu-open  mb-3">
                            <a id="dashboard-link" href="{{ route('sub.admin.dashboard') }}"
                                class="nav-link "id="dashboard-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        

                        <li class="nav-item mb-3">
                            <a href="{{ route('subadmin.verification')}}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                </svg>
                              <p>
                                User Verification
                              </p>
                            </a>
                      
                </li>
                              
                        
                        <li class="nav-item  mb-3">
                            <a href="{{ route('subadmin.usermanagement') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    User Management

                                </p>
                            </a>
                        </li>

                        <li class="nav-item  mb-3">
                            <a href="{{ route('subadmin.content') }}" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Reported Content

                                </p>
                            </a>
                        </li>
                      
                        <li class="nav-item  mb-3">
                            <a href="{{ route('subadmin.usersupport') }}" class="nav-link">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                </svg>
                                <p>
                                    User Support

                                </p>
                            </a>

                        <li class="nav-item  mb-3">
                            <a href="{{ route('subadmin.changepassword') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Change passWord</p>
                            </a>
                        </li>

                        <li class="nav-item  mb-3">
                            <a href="{{ route('sub.admin.logout') }}" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Log Out</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

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

    <script>
     document.addEventListener('DOMContentLoaded', function() {
  // Get the current URL
  var currentUrl = window.location.href;

  // Get the stored active link from session storage
  var activeLink = sessionStorage.getItem('activeLink');

  // Get all the navbar link elements
  var navLinks = document.querySelectorAll('.nav-link');

  // Check if there's a stored active link
  if (activeLink) {
    // Remove the "active" class from all navbar links
    navLinks.forEach(function(link) {
      link.classList.remove('active');
    });

    // Add the "active" class to the stored active link
    var storedLink = document.querySelector('a[href="' + activeLink + '"]');
    if (storedLink) {
      storedLink.classList.add('active');

      // If the stored active link is inside a dropdown menu, add the "menu-open" class to its parent
      var parentLi = storedLink.parentElement;
      if (parentLi.classList.contains('nav-item') && parentLi.querySelector('.nav-treeview')) {
        parentLi.classList.add('menu-open');
      }
    }
  } else {
    // Loop through each navbar link to check if the current URL matches its href
    navLinks.forEach(function(link) {
      if (currentUrl === link.href) {
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
  }

  // Store the active link in session storage when a navbar link is clicked
  navLinks.forEach(function(link) {
    link.addEventListener('click', function() {
      sessionStorage.setItem('activeLink', link.href);
    });
  });
});
    </script>

</body>

</html>
