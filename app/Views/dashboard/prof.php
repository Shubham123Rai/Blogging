<?= $this->extend('layout2/dash_layout.php'); ?>

<form>

    <head>
        <title><?= $titel ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    </head>

    <body>
        <?= $this->section('content'); ?>

        <?php if (session()->get('save')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= session()->get('save') ?></strong>
                    <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
                </div>
            <?php endif ?>
        <div class="container">
        <div class="container d-flex">
            
            <div class="row justify-content-center col-md-4">
                <div class="col-md-8 mt-2">

                    <img src="<?= "/uploads/" . $userInfo['profile_pic']; ?>" class="img-fluid rounded-start" height="100px" width="100%" alt="Admin Image">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mt-2 float-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Change Image
                    </button>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="card col-md-12">
                        <div class="card-header">
                            <h1><?= $titel ?>
                                <a href="<?= base_url('dash') ?>" class="btn btn-danger mt-2 float-right">BACK</a>
                            </h1>
                            <hr>
                        </div>
                        <div class="card-body ">
                            <table class="table table-bordered" id="users-list">
                            <caption></caption>

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Escape</th>
                                        <th>Remove Account</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $userInfo['id'] ?></td>
                                        <td><?= ucfirst($userInfo['name']) ?></td>
                                        <td><?= $userInfo['email'] ?></td>
                                        <td><a href="<?= base_url('/logout'); ?>" class="btn btn-primary btn-sm">Logout</a></td>
                                        <td>
                                        <button type="button" value="<?= $userInfo['id']; ?>" class="confirm_del_btn btn btn-danger btn-sm" >
                                            Delete
                                        </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Update profile Image</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url("/update_admin_image/" . $userInfo['id']); ?>" method="post" enctype="multipart/form-data" class="form-group">
                                <tr>
                                    <td><label>
                                            <h5>Select Image :</h5>
                                        </label></td>
                                    <td>
                                        <input type="file" class="form-control" name="file">
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                                            <button type="submit" class="btn btn-primary ml-2">Save changes</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
            <script src="<?= base_url('assets/js/popper.min.js'); ?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            <?= $this->endSection() ?>

    </body>
</form>