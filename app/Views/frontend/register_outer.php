<?php $session = session() ?>

<?= $this->extend('layout/navbar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?= $this->section('content'); ?>

  <div class="register-box">
    <div class="card card-outline card-primary">

      <?php if (isset($success)) : ?>
        <div class="alert alert-success">
          <?= $success; ?>
          <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
      <?php endif; ?>

      <?php if (isset($error)) : ?>
        <div class="alert alert-warning">
          <?= $error; ?>
          <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
      <?php endif; ?>

      <!-- collect and print flash data -->
      <?php if ($session->getTempdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $session->getTempdata('success') ?>
          <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
      <?php endif; ?>

      <?php if ($session->getTempdata('error')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?= $session->getTempdata('error') ?>
          <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
      <?php endif; ?>
      
      <div class="card-header text-center">
        <a href="" class="h1"><strong>Register</strong></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="<?= base_url('/save2') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="cpassword">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <a href="#" class="btn btn-block btn-primary">
            <em class="fab fa-facebook mr-2"></em>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <em class="fab fa-google-plus mr-2"></em>
            Sign up using Google+
          </a>
        </div>

        <a href="login" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>


<script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?= $this->endSection(); ?>
</body>

</html>