<?= $this->extend("layout2/dash_layout");?>

<?= $this->section('content');?>

<div class="container">
    <h1>* Activation Process</h1>
</div>

<?php if(isset($error)):?>
    <div class="alert alert-danger">
        <?= $error?>
    </div>
<?php endif ;?>

<?php if(isset($success)):?>
    <div class="alert alert-success">
        <?= $success; ?>
    </div>
<?php endif ;?>


<?= $this->endSection()?>