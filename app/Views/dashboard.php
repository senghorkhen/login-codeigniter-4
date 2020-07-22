<?= $this->extend('layouts/header') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Hello, <?= session()->get('firstname') ?></h1>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>