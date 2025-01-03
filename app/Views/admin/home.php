<?= $this->extend("admin/layouts/master") ?>

<?=  $this->section("body-content"); ?>

<?= view('admin/layouts/dashboard') ?>

<?= $this->endSection() ?>