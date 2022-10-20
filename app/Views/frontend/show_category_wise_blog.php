<?= $this->extend('layout/navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?= $this->section('content') ?>
    <?php if ($name) : ?>
        <?php foreach ($name as $row) : ?>
            
            <div class="card mb-3 mt-3 ml-lg-5" style="max-width: 600px;">
                <div class="row g-0 ">
                    <div class="col-md-4">
                        <img src="<?= '/uploads/' . $row['file']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['title']; ?></h5>
                            <p class="card-text"><?= $row['description']; ?></p>
                        </div>
                        <p><a class="btn btn-outline-info" href="<?= base_url('/categorywise_full_blog/') .'/'. $row['id'] ?>">View more &raquo;</a></p>

                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
    <?= $this->endSection('content') ?>
    </body>
</html>