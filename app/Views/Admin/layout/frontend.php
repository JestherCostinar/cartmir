<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Page design</title>
    <!--bootstrap links-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap.min.css'); ?>">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&display=swap" rel="stylesheet">
    <!--css link-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css'); ?>">
    <!--owl slider link-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/owl.carousel.min.css'); ?>" />

</head>

<body>

    <?= $this->renderSection('content') ?>

    <!--bootstrap links-->
    <script src="<?= base_url('assets/admin/js/jquery.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/bootstrap.bundle.min.js') ?>"></script>
    <!--owl slider link-->
    <script src="<?= base_url('assets/admin/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/chart.min.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>

</body>

</html>