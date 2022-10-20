<?= $this->extend('layout/navbar.php');?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    </head>
    <body>
    <?= $this->section('content');?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <?php if(session()->get('status')):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->get('status')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
        <?php endif; ?>

        
        
        <?php if(session()->get('success')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->get('success')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
        <?php endif; ?>

        <?php if(session()->get('fail')):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->get('fail')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
        <?php endif; ?>

        <?php if(session()->get('successMessage')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->get('successMessage')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
    <?php endif; ?>

            <!-- collect and print Tempdata for password verification-->    
    <?php if(session()->getFlashdata('error')):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
    <?php endif; ?>

        <!-- collect and print Tempdata
    <?php if(session()->getTempdata('error')):?> -->
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->getTempdata('error')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
    <?php endif; ?>

        <!-- collect and print Tempdata -->
        <?php if(session()->get('block')):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->get('block')?>
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
    <?php endif; ?>

            <div class="card">
            <div class="card-header">
                <h2>Login</h2>
            </div>
                
            <form action="<?= base_url('/check') ?>" method="post">

                <?= csrf_field(); ?>

                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email">
                    <span class="text-danger"> <?= isset($validation) ? display_error($validation,'email'): ''?></span>

                </div>
                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="Password" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger"> <?= isset($validation) ? display_error($validation,'password'): ''?></span>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-2">Login</button><br>
                    <a href="<?= site_url('/forget_Password')?>" class="btn text-danger ">Forget password ?</a>
                </div><br>
                                
                <div class="form-group ">
                <hr><h3>OR login with :</h3>
                    <a href="google.com"><img  height="30px" src='<?= base_url()?>/assets/images/google.png' alt=""></a>
                    <a href="facebook.com"><img height="30px" src='<?= base_url()?>/assets/images/facebook.png' alt=""></a>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js');?>" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <?= $this->endSection();?>
    </body>
</html>