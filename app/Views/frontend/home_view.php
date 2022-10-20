<?= $this->extend('layout/navbar.php'); ?>


<!doctype html>
<html lang="en">

<head>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <title></title>
</head>

<body>

  <?= $this->section('content') ?>


  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <?php if ($var) : ?>
        <?php foreach ($var as $row) : ?>
          <div class="col-lg-4 mt-3">
            <img src="<?= "/uploads/".$row['pic']; ?>" alt="" class="brand-image img-circle elevation-3" style="opacity: .8" width="160" height="160">
            <h2><?= $row['category']; ?></h2>
            <p><?= $row['text']; ?></p>
            
            <p>
              <a class="btn btn-secondary" href="<?= base_url('/categorywise_blog/').'/'.$row['category']; ?>">View details &raquo;</a>
            </p>
          </div><!-- /.col-lg-4 -->
          <?php endforeach; ?>
      <?php endif; ?>
    </div><!-- /.row -->

    <?= $this->endSection('content') ?>
</body>

</html>