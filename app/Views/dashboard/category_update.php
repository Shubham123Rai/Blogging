<?= $this->extend('layout2/dash_layout.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <?= $this->section('content'); ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= session()->get('success') ?></strong>
                        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">Close</button>
                    </div>
                <?php endif ?>

                <div class="card">
                    <div class="card-header">
                        <h3>Category Update
                            <a href="<?= base_url('/view_category'); ?>" class="btn btn-info btn_sm float-right">Back</a>
                        </h3>
                    </div>
                    <!-- form start -->
                    <form action="<?= base_url('/category_update/' ."/". $var['id']); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <input type="text" name="category" placeholder="Inter category" value="<?= $var['category']; ?>" class="form-control" id="exampleInputPassword1" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required><?= $var['text']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" value="<?= "uploads/" . $var['pic']; ?>" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <img src="<?= base_url('uploads/' . '/' . $var['pic']) ?>" class="w-50" alt="Image">
                            <div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.card-body -->


                    </form>
                </div>
            </div>
        </div>

        <!-- /.card -->


        <?= $this->endSection(); ?>
</body>

</html>