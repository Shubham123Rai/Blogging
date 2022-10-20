<?= $this->extend('layout2/dash_layout.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>LoggedIn UserDetails</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?= $this->section('content'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= session()->get('success') ?></strong>
                        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
                    </div>
                <?php endif ?>

                <div class="card">
                    <div class="card-header">
                        <h2>Category listing
                            <a href="<?= base_url('/create_category'); ?>" class="btn btn-info btn_sm float-right ml-2">Add Category</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="users-list">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($var) : ?>
                                    <?php foreach ($var as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td>
                                            <a href="<?= base_url('/edit_category/'.$row['id']);?>" class="btn btn-primary btn-sm">Update</a>
                                            </td>
                                            <td>
                                                <button type="button" value="<?= $row['id']; ?>" class="confirm_del_btn btn btn-danger btn-sm" >
                                                    Delete
                                                </button>

                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <?= $this->endSection(); ?>

</body>

</html>