<?= $this->extend('layout/navbar'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <?= $this->section('content'); ?>

  <?php if ($var) : ?>
    <?php foreach ($var as $row) : ?>

      <div class="card mb-3" style="max-width: 800px;">

        <?php if (session()->get('success')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->get('success') ?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
          </div>
        <?php endif; ?>

        <?php if (session()->get('error')) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->get('error') ?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
          </div>
        <?php endif; ?>

        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?= '/uploads/' ."/". $row['file']; ?>" class="img-fluid rounded-start" height="90%" width="90%" alt="Image">
          </div>
          <div class="col-md-8 ">
            <div class="card-body">
              <h5 class="card-title">
                <h2><?= $row['title']; ?></h2>
              </h5>
              <p class="card-text">
              <h6><?= $row['description']; ?></h6>
              </p>
            </div>
            <p>

              <a href="<?= base_url('/like/' . $row['id']); ?>" class="link-black text-sm mr-2"><em class="far fa-heart mr-1"></em> Like (<?= $row['like_count']; ?>)</a>

              <?php if (session()->has('loggedUser')) : ?>
                <a href="#" class="link-accent-navy text-sm mr-2 " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><em class="fas fa-comment mr-1"></em>Comment</a>

                <a href="#" class="link-accent-navy text-sm mr-2 " data-bs-toggle="modal" data-bs-target="#exampleModal"><em class="fas fa-share mr-1"></em> Share</a>
              <?php endif; ?>

              <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Share With</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                  </div>
                  <div class="modal-body ">
                    <tr>
                      <td>
                        <a href="http://www.facebook.com/sharer.php?u=https://127.0.0.1:8000/<?= '/uploads/' . $row['file']; ?>" target="_blank">
                          <img src="/assets/images/Bootstrap_facebook.png" class="img-circle elevation" height="80px" width="80px" alt="Facebook">
                        </a>
                        <a href="http://www.instagram.com/sharer.php?u=https://127.0.0.1:8000/<?= '/uploads/' . $row['file'] ?>" target="_blank">
                          <img src="/assets/images/Bootstrap_instagram.png" class="img-circle elevation" height="80px" width="80px" alt="Instagram">
                        </a>
                        <a href="http://www.twitter.com/sharer.php?u=https://127.0.0.1:8000/<?= '/uploads/' . $row['file'] ?>" target="_blank">
                          <img src="/assets/images/Bootstrap_twitter.png" class="img-circle elevation" height="80px" width="80px" alt="Twitter">
                        </a>

                      </td>
                    </tr>

                  </div>

                </div>
              </div>
            </div>


            <?php
            if (session()->has('loggedUser')) {
            ?>
              <!--Comment Modal -->
              <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><strong>Comment box..</strong></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                    <div class="modal-body ">
                      <tr>
                        <td>

                          <form action="<?= base_url('/comment/' . $row['id']); ?>" method="POST" class="form-horizontal mr-2 border-2">
                            <hr>
                            <h3>please comment here :-</h3>
                            <hr>
                            
                            <div class="input-group input-group-sm mt-2 mr-2">
                              <textarea name="comment" class="form-control form-control-sm" placeholder="Type a comment"></textarea>

                            </div>
                            <div class="input-group-append mt-2 mr-2">
                              <button type="submit" class="btn btn-success">Send</button>
                            </div>
                          </form>

                        </td>
                      </tr>

                    </div>

                  </div>
                </div>
              </div>

              <p><a class="btn btn-primary mt-2" href="<?= base_url('/showComment_outer/' . $row['id']); ?>">View comments &raquo;</a></p>

            <?php
            } else {
            ?>
              <div class="container">
                <h5 class="text-danger">If you wants to like and comment on this post, then you have to login first and for that <h4><em>please click on the below link :</em></h4>
                </h5>
                <a href="/check" class="btn btn-success">Click here >></a>
              </div>
            <?php
            }
            ?>


            </p>
          </div>
        </div>
        <hr>


      </div>
      
    <?php endforeach; ?>
  <?php endif; ?>
  </div>
  </div>
  </div>


  <script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js'); ?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <?= $this->endSection(); ?>
</body>

</html>

