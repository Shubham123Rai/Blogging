<?= $this->extend("layout2/dash_layout") ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <?= $this->section("content") ?>

  <h3 class="mt-1">Comments :-</h3>

  <hr>

  <?php if (session()->get('success')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><?= session()->get('success') ?></strong>
      <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
    </div>
  <?php endif ?>

  <?php if (session()->get('error')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><?= session()->get('error') ?></strong>
      <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
    </div>
  <?php endif ?>

  <div class="col-md-9">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h1 class="card-title">Comments :-</h1>
      </div>
      <?php if ($var) : ?>
        <?php foreach ($var as $row) : ?>
          <!-- /.card-header -->

          <div class="card-body p-0">
            <div class="mailbox-read">
              <p>
              <h2><?= ucfirst($row['name']); ?> :</h2>
              </p>
              <p>(<?= $row['created_at']; ?>)</p>

            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-read-message">
              <p><?= $row['comment']; ?></p>
            </div>
            <!-- /.mailbox-read-message -->

            <div class="card-footer">
                <strong>Reply :-</strong>
              <form class="form-group" action="<?= base_url('/reply/' . $row['comment_id']) ?>" method="post">

              <div class="input-group input-group-sm mt-2 mr-2">
                <textarea name="reply" class="form-control form-control-sm" placeholder="You can reply to this comment.." required></textarea>
              </div>

              <div class="input-group-append mt-2 mr-2">
                <!-- send reply button -->
                <button type="submit" class="btn btn-success mr-2 d-flex">Send</button>

                <!-- View all reply button -->
                <a href="<?= base_url('/viewreply/' . $row['comment_id']) ?>" class="btn btn-success btn-sm  ">Viewall replies >></a>

                <!-- Condition to block & unblock reply -->
                <?php
                  if ($row['status'] == 'active') {
                ?>
                    <a href="<?= base_url('/blockcomment/' . $row['comment_id']) ?>" class="btn btn-danger btn-sm ml-2">Block</a>
                <?php
                  } else {
                ?>
                    <a href="<?= base_url('/unblockcomment/' . $row['comment_id']) ?>" class="btn btn-success btn-sm ml-2">Unblock</a>
                <?php
                  }
                ?>

              </div>
                  <hr>
            </form>

            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
    <!-- /.col -->
  </div>



  <script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js'); ?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <?= $this->endSection() ?>
</body>

</html>