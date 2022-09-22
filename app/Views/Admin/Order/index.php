<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
<div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('Admin/layout/inc/sidebar.php'); ?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?= $this->include('Admin/layout/inc/header.php'); ?>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-3 text-gray-800">Orders
                    <a href="<?= base_url('generateOrderReport') ?>" class="btn btn-primary float-right">Generate Report</a>
                </h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List of Orders</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Item name</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                        <th>Order Date</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order_items as $items) : ?>
                                        <tr>
                                            <td><?= $items['items_name']; ?></td>
                                            <td><?= $items['items_amount']; ?></td>
                                            <td><?= $items['items_qty']; ?></td>
                                            <td><?= $items['order_date']; ?></td>
                                            <td>
                                                <a href="#" style="display: inline" class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?= $this->include('Admin/layout/inc/footer.php'); ?>

        <?= $this->endSection() ?>