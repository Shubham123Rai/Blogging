<?= $this->extend('layout2/dash_layout.php');?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-10">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    </head>

    <body>
    <?= $this->section('content');?>    

        <div class="container">
            <div class="row justify-content-center">

            <div class="col-md-10">

            

            <?php if(session()->get('success')):?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= session()->get('status')?></strong> 
                <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
                </div>
            <?php endif ?>

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
                                <td><?= $userInfo['id']?></td>
                                <td><?= ucfirst($userInfo['name'])?></td>
                                <td><?= $userInfo['email']?></td>
                                <td>
                                    <a href="<?= base_url('/profile');?>" class="btn btn-primary btn-sm">profile</a>
                                </td>
                                <td>
                                <a href="<?= base_url('/edit_data/'.$userInfo['id']);?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    <?= $this->endSection()?>
    </body>
</html>