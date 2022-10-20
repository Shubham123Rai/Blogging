<?php $session = session() ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container ">
        <a href="/Blogging" class="navbar-brand">
          <img src="../../dist/img/avatar.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Blogging</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= route_to('home') ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?= route_to('register2') ?>" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
              <a href="<?= route_to('login') ?>" class="nav-link">Login</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Category</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              
                <li><a href="<?= route_to('cricket') ?>" class="dropdown-item">Cricket</a></li>
                <li><a href="<?= route_to('music') ?>" class="dropdown-item">Music</a></li>
                <li><a href="<?= route_to('dance') ?>" class="dropdown-item">Dance</a></li>
                
              </ul>
            </li>
            <!-- /Dropdown -->

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <em class="fas fa-search"></em>
                  </button>
                </div>

              </div>
            </form>
        </div>
        <!-- /SEARCH FORM -->

      </div>
      <?php if(session()->has('loggedUser')):?>
      <a href="<?= base_url('/logout') ?>" class="btn btn-danger ml-2 float-right">Logout</a>
      <?php endif; ?>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <div class="content">
        <div class="container ">

          <?= $this->renderSection('content'); ?>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- ckeditor-4 //start-->
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

  <script>
      CKEDITOR.replace( 'comment' );
  </script>
  <!-- ckeditor //end -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>