<?= $this->extend('layout2/dash_layout.php');?>


<!DOCTYPE html>
<html lang="en" xml:lang="en">
    <head>
    <title>Update</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body>
    <?= $this->section('content');?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h3>Update Student Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/update_data/'.$userInfo['id']);?>" method="POST">
                            <input type="hidden" name="_method" value="PUT" />

                            <div class="form-group mb-2">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $userInfo['name'] ?>" class="form-control" placeholder="Enter Name" required>
                            </div>

                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $userInfo['email'] ?>" class="form-control" placeholder="Enter Email" required>
                            </div>

                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input type="text" name="password"  class="form-control" placeholder="Enter Password" >
                            </div>

                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-select" name="status">
                                <option value="active">Active</option>
                                <option value="Inactive">Inactive</option>
                                </select>
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


    <?= $this->endSection();?>
    </body>
</html>

