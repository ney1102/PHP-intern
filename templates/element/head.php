<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css"> -->
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css"> -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
    <?= $this->Html->css('/assets/vendors/mdi/css/materialdesignicons.min.css') ?>
    <?= $this->Html->css('/assets/vendors/css/vendor.bundle.base.css') ?>
    <?= $this->Html->css('/assets/vendors/jvectormap/jquery-jvectormap.css') ?>
    <?= $this->Html->css('/assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>
    <?= $this->Html->css('/assets/vendors/owl-carousel-2/owl.carousel.min.css') ?>
    <?= $this->Html->css('/assets/vendors/owl-carousel-2/owl.theme.default.min.css') ?>
    <?= $this->Html->css('/assets/css/style.css') ?>
    <?= $this->Html->css([
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        '/assets/plugin/uploader/image-uploader.min.css'
    ]) ?>

    <?= $this->Html->script([
        '/assets/vendors/js/vendor.bundle.base.js',
        '/assets/vendors/chart.js/Chart.min.js',
        '/assets/vendors/progressbar.js/progressbar.min.js',
        '/assets/vendors/jvectormap/jquery-jvectormap.min.js',
        '/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js',
        '/assets/vendors/owl-carousel-2/owl.carousel.min.js',
        '/assets/plugin/jquery/jquery-3.6.0.min',
        '/assets/js/off-canvas.js',
        '/assets/js/hoverable-collapse.js',
        '/assets/js/misc.js',
        '/assets/js/settings.js',
        '/assets/js/todolist.js',
        '/assets/js/dashboard.js',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-image-upload/1.2.0/jQuery-image-upload.min.js',
        '/assets/plugin/uploader/image-uploader.min.js'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>