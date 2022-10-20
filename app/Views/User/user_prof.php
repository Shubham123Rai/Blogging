<?= $this->extend('layout2/user_layout.php');?>

<form>
    <head>
        <title><?= $titel ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    </head>

    <body>
    <?= $this->section('bodyContent');?>    

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                    <h1><?= $titel ?>
                    <a href="<?= base_url('userdash') ?>" class="btn btn-danger mt-2 float-end">BACK</a>
                    </h1><hr>
                </div>
                <div class="card-body">
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
                                <td><?= $data['id']?></td>
                                <td><?= ucfirst($data['name'])?></td>
                                <td><?= $data['email']?></td>
                                <td><a href="<?= site_url('/logout');?>" class="btn btn-primary btn-sm">Logout</a></td>
                                <td><a href="<?= site_url('/delete/').$data['id'];?>" class="btn btn-primary btn-sm">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        
    <?= $this->endSection()?>

    </body>
</form>