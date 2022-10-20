<?= $this->extend('layout2/user_layout.php');?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>
    <body>

    <?= $this->section('bodyContent');?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Dashboard</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="users-list">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $data['id']?></td>
                                <td><?= ucfirst($data['name'])?></td>
                                <td><?= $data['email']?></td>
                                <td>
                                    <a href="<?= site_url('/userprofile');?>" class="btn btn-primary btn-sm">profile</a>
                                </td>
                                <td>
                                <a href="<?= site_url('/useredit/'.$data['id']);?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    <script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js');?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <?= $this->endSection();?>

</body>
</html>
