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

    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-md-8 ">


                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= session()->get('success') ?></strong>
                        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <?php if (session()->get('error')) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= session()->get('error') ?></strong>
                        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <div class="card">
                    <div class="card-header">
                        <h3>Update Blog
                            <a href="<?= base_url('/fetch_blog'); ?>" class="btn btn-info btn_sm float-right  ">Back</a>
                        </h3>
                    </div>
                    <!-- form start -->
                    <form action="<?= base_url('/update_blog/' . $blogInfo['id']); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-group" for="inputGroupSelect01">Category</label>
                            <select class="form-control" name="category" value="" id="inputGroupSelect01">
                                <option selected><?= ucfirst($blogInfo['category']) ?></option>

                                <option value="cricket">Cricket</option>
                                <option value="music">Music</option>
                                <option value="dance">Dance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="<?= $blogInfo['title'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3"><?= $blogInfo['description']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">row
                                    <input type="file" name="file" value="<?= "uploads/" ."/". $blogInfo['file']; ?>" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <img src="<?= base_url('uploads/' .'/'. $blogInfo['file']) ?>" class="w-50" alt="Image">
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