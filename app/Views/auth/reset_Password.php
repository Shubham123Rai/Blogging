<?= $this->extend('layout/navbar.php'); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>
    <body>

    <?= $this->section('content');?>

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">          

                <div class="card-header">
                    <h2>Reset Password</h2>
                </div>
                
                <?php if(isset($error)):?>
                <div class="alert alert-danger">
                    <?= $error;?> 
                </div>
                <?php else: ?>

                <?= form_open(); ?>
                <div class="form-group">
                    <label>Enter new password:</label>
                    <input type="password" name="pwd" class="form-control">
                </div>

                <div class="form-group">
                    <label>Confirm new password:</label>
                    <input type="password" name="cpwd" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-2" value="update">
                </div>
                
                <?= form_close();?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
    <script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js');?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <?= $this->endSection(); ?>

    </body>
</html>