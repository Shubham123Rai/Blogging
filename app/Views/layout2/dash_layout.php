<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= (isset($pageTitle)) ? $pageTitle : 'Document'; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <!-- Sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--/sweet alert  -->

  <!-- datatable  -->
  <link rel="stylesheet" type="" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="" href="  https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <!-- /datatable -->
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><em class="fas fa-bars"></em></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->


        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <div class="dropdown-divider"></div>

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><em class="fas fa-star"></em></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><em class="far fa-clock mr-1"></em> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <em class="fas fa-expand-arrows-alt"></em>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <em class="fas fa-th-large"></em>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AlgoWorks</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="" class="img-circle elevation-2" alt=""><br>

          </div>
          <div class="info">
            <a href="" class="d-block">
              <h3>Admin</h3>
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="#" class="nav-link active">
                <em class="nav-icon fas fa-home"></em>
                <p>
                  Home
                </p>
              </a>

            <li class="nav-item">
              <a href="<?= route_to('dash') ?>" class="nav-link active">
                <em class="nav-icon fas fa-user"></em>
                <p>
                  Profile
                </p>
              </a>
            </li>

            <li class="nav-item ">
              <a href="<?= route_to('loggedInUser') ?>" class="nav-link active">
                <em class="nav-icon fas fa-user"></em>
                <p>
                  User listing
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?= route_to('fetch_blog') ?>" class="nav-link active">
                <em class="nav-icon fas fa-user"></em>
                <p>
                  Blog listing
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= route_to('view_category') ?>" class="nav-link active">
                <em class="nav-icon fas fa-user"></em>
                <p>
                  Category listing
                </p>
              </a>
            </li>
          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">

          <?= $this->renderSection('content'); ?>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer" width="100%">
      <!-- To the right -->

      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2022 <a href="<?= base_url(); ?>">AlgoWorks</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->



  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>

  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#datatable1').DataTable();
    });
  </script>

  <!-- sweet alert used in alldetail  -->
  <script>
    $(document).ready(function() {
      $('.confirm_del_btnb').click(function(e) {
        e.preventDefault();
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url: "/delete/" + id,
                success: function(response) {
                  swal({
                    title: response.status,
                    text: response.status_text,
                    icon: response.status_icon,
                    button: "OK",
                  }).then((confimed) => {
                    window.location.reload();
                  })
                }
              })
            } else {
              swal("You have canceled on deleteing this data");
            }
          });

      });
    });
  </script>
  <!-- /sweet alert used in alldetail  -->


  <!-- sweet alert used in view_blog  -->
  <script>
    $(document).ready(function() {
      $('.confirm_del_btna').click(function(e) {
        e.preventDefault();
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url: "/delete_blog/" + id,
                success: function(response) {
                  swal({
                    title: response.status,
                    text: response.status_text,
                    icon: response.status_icon,
                    button: "OK",
                  }).then((confimed) => {
                    window.location.reload();
                  })
                }
              })
            } else {
              swal("You have canceled on deleteing this data");
            }
          });

      });
    });
  </script>
  <!-- /sweet alert used in view_blog  -->


  <!-- sweet alert used in view_category  -->
  <script>
    $(document).ready(function() {
      $('.confirm_del_btn').click(function(e) {
        e.preventDefault();
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url: "/category_delete/" + id,
                success: function(response) {
                  swal({
                    title: response.status,
                    text: response.status_text,
                    icon: response.status_icon,
                    button: "OK",
                  }).then((confimed) => {
                    window.location.reload();
                  })
                }
              })
            } else {
              swal("You have canceled on deleteing this data");
            }
          });

      });
    });
  </script>
  <!-- /sweet alert used in view_category  -->


</body>

</html>