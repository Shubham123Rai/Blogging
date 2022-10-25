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

  <div class="card mb-3" style="max-width: 1000px;">

    <?php if (session()->get('success')) : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
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

    <div class="">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class=" img-fluid img-square" src="<?= '/uploads/' . $var['file']; ?>" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?= $var['category'] ?></h3>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">

                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="post">

                        <!-- /.user-block -->
                        <h3 class="profile-username text-center bold"><?= $var['title'] ?></h3>


                        <p>
                        <h3 class="profile-username ">Description :-</h3>
                        <?= $var['description']; ?>
                        </p>

                        <p>
                          
                          <a href="#" class="link-accent-navy text-sm mr-2 " data-bs-toggle="modal" data-bs-target="#exampleModal"><em class="fas fa-share mr-1"></em> Share</a>
                        
                          <a href="<?= base_url('/like/' . $var['id']); ?>" class="link-black text-sm mr-2"><em class="far fa-heart mr-1"></em> Like (<?= $var['like_count']; ?>) </a>

                          <a href="#" class="link-accent-navy text-sm mr-2 " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><em class="fas fa-comment mr-1"></em> Comment</a>

                          <!--Share Modal -->
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
                                    <a href="http://www.facebook.com/sharer.php?u=https://127.0.0.1:8000/<?= '/uploads/' . $var['file']; ?>">
                                      <img src="/assets/images/Bootstrap_facebook.png" class="img-circle elevation" height="100px" width="100px" alt="Facebook">
                                    </a>
                                    <a href="http://www.instagram.com/sharer.php?u=https://127.0.0.1:8000/<?= '/uploads/' . $var['file']; ?>">
                                      <img src="/assets/images/Bootstrap_instagram.png" class="img-circle elevation" height="80px" width="80px" alt="Instagram">
                                    </a>
                                    <a href="http://www.twitter.com/sharer.php?u=https://127.0.0.1:8000/<?= '/uploads/' . $var['file']; ?>">
                                      <img src="/assets/images/Bootstrap_twitter.png" class="img-circle elevation" height="80px" width="80px" alt="Twitter">
                                    </a>
                                  </td>
                                </tr>
                              </div>

                            </div>
                          </div>
                        </div><br>

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
                                  <form action="<?= base_url('/comment/' . $var['id']); ?>" method="POST" class="form-horizontal mr-2 border-2">
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

                      <!--  Comment Modal -->

                      <!-- Button trigger modal -->
                      <p><a class="btn btn-primary mt-2"  href="<?= base_url('/showComment/'.$var['id']); ?>">View comments &raquo;</a></p>

                    </p>

                  </div>
                  <!-- /.post -->

                </div>
              </div>
            
              <!-- ckeditor-4 //start-->
              <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
              <script>
                  CKEDITOR.replace( 'comment' );
              </script>
              <!-- ckeditor //end -->
              <script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
              <script src="<?= base_url('assets/js/popper.min.js'); ?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
              <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

              <?= $this->endSection() ?>
</body>

</html>