<?php $session = session() ?>
<?= $this->extend('layout2/dash_layout.php');?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>
    <body>

    <?= $this->section('content')?>

<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            
        <?php if(isset($success)):?>
            <div class="alert alert-success">
                <?= $success; ?>
            </div>
        <?php endif ;?>

        <?php if(isset($error)):?>
            <div class="alert alert-success">
                <?= $error; ?>
            </div>
        <?php endif ;?>

<!-- collect and print flash data -->
    <?php if($session->getTempdata('success')):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $session->getTempdata('success')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
    <?php endif; ?>

    <?php if($session->getTempdata('error')):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $session->getTempdata('error')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
    <?php endif; ?>

    
    
        <div class="card">
            <div class="card-header">
                <h2>Register
                <a href="<?= base_url('/loggedInUser'); ?>" class="btn btn-info btn_sm float-right ml-2">Back</a>
                </h2>
        </div>
            <form action="<?= base_url('/save')?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your email" >
                    <span class="text-danger"> <?= isset($validation) ? display_error($validation,'name'): ''?></span>
                </div>
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email" >
                    <span class="text-danger"> <?= isset($validation) ? display_error($validation,'email'): ''?></span>
                </div>
                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="Password" class="form-control" name="password" placeholder="Enter password" >
                    <span class="text-danger"> <?= isset($validation) ? display_error($validation,'password'): ''?></span>
                </div>
                <div class="form-group mb-2">
                    <label>Confirm Password</label>
                    <input type="Password" class="form-control" name="cpassword" placeholder="Enter password again">
                    <span class="text-danger"> <?= isset($validation) ? display_error($validation,'cpassword'): ''?></span>
                </div>

                <div class="form-group mb-2">
                    <label>profile image</label>
                    <input type="file" class="form-control" name="file" placeholder="Choose file" >
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </div>
                
                
            </form>
        </div>
    </div>
</div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js');?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <?= $this->endSection()?>
</body>
</html>