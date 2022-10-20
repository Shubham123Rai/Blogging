<?= $this->extend("layout/navbar") ?>

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

    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h1 class="card-title"><strong>All replies to this comment :</strong></h1>
            </div>

            <ol class="list-group-numbered">
                <?php if ($var) : ?>
                    <?php foreach ($var as $res) : ?>
                        <li>
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><?= '<h3>' . ucfirst($res['name']) . '<strong>:</strong></h3>'; ?></div>
                                <?= $res['reply']; ?>
                            </div>
                        </li><hr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ol>

        </div>
        <!-- /.col -->
    </div>
    <?= $this->endSection(); ?>

</body>

</html>