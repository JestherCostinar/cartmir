<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kasmir Cart | <?= $title ?></title> <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <link href="<?= base_url('assets/admin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/admin/css/login.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">


</head>

<body id="page-top">

    <?= $this->renderSection('content') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/admin/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src=" <?= base_url('assets/admin/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/demo/chart-pie-demo.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/login.js') ?>"></script>
    <?= $this->renderSection('script') ?>

</body>

</html>