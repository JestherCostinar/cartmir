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
                </h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List of Out for Delivery Orders</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Amount</th>
                                        <th>Order Date</th>
                                        <th>Order by</th>
                                        <th>Mode of Payment</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order_items as $items) : ?>
                                        <tr>
                                            <td><?= $items['order_id']; ?></td>
                                            <td><?= $items['order_amount']; ?></td>
                                            <td><?= $items['order_date']; ?></td>
                                            <td><?= $items['firstname'] . ' ' . $items['lastname']; ?></td>
                                            <td><?= $items['order_type']; ?></td>
                                            <td><span class="badge bg-info text-white"><?php echo ($items['order_status'] == 'out_for_delivery' ? 'Out for Delivery' : ''); ?></span></td>
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