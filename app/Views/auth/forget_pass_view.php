<?= $this->extend('layout/navbar.php'); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>
    <body>

    <?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
        <div class="card">

        <?php if(session()->getFlashdata('success')):?>
                <div class="alert alert-success" role="alert">
                <strong><?= session()->getFlashdata('success')?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">Close</button>
            </div>
        <?php endif ?>

        <?php if(session()->getFlashdata('error')):?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('error')?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">Close</button>
            </div>
        <?php endif ?>

            <div class="card-header">
                <h2>Forget Password</h2>
            </div>
                
            <form action="<?= base_url('/forget_Password') ?>" method="post">

                <div class="form-group mb-2">
                    <label>Enter your email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email">
                    <span class="text-danger"> <?= isset($validation) ? display_error($validation,'email'): ''?></span>

                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-2">Send link</button><br>
                </div><br>

            </form>
        </div>
    </div>
</div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js');?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <?= $this->endSection(); ?>

    </body>
</html>