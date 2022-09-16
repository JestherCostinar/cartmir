<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasmir E-Commerce | <?= $title ?></title>
    <!--bootstrap links-->
    <link rel="stylesheet" href="<?= base_url('assets/user/css/bootstrap.min.css') ?>">
    <!--owl slider link-->
    <link rel="stylesheet" href="<?= base_url('assets/user/css/owl.carousel.min.css') ?>" />
    <!--css link-->
    <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
</head>

<body>

    <?= $this->renderSection('content'); ?>
    <!--bootstrap links-->
    <script src="<?= base_url('assets/user/js/jquery.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/bootstrap.bundle.min.js') ?>"></script>
    <!--owl slider link-->
    <script src="<?= base_url('assets/user/js/owl.carousel.min.js') ?>"></script>

    <!-- Script for Specific file -->
    <?= $this->renderSection('script') ?>

</body>

</html>