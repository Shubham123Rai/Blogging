<?= $this->extend('layout2/new_layout.php');?>

<!DOCTYPE html>
<html lang="en"  xml:lang="en">
    <head>
    <title>Update</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>

    <body>
    <?= $this->section('bodyContent');?>
<div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h3>Update User Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('userupdate/'.$data['id']);?>" method="POST">
                            <input type="hidden" name="_method" value="PUT" />

                            <div class="form-group mb-2">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" placeholder="Enter Name" required>
                            </div>

                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $data['email'] ?>" class="form-control" placeholder="Enter Email" required>
                            </div>

                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input type="text" name="password"  class="form-control" placeholder="Enter Email" >
                            </div>

                            
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js');?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <?= $this->endSection();?>

    </body>
</html>

