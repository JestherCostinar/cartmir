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
                <h1 class="h3 mb-3 text-gray-800">Products
                    <a href="<?= base_url('/product/create') ?>" class="btn btn-primary float-right">Create product</a>
                </h1>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= (session()->get('success')) ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List of Product</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>MRP</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th width="9%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $i => $product) : ?>
                                        <tr>
                                            <td><img src="<?= base_url('uploads/' . $product['image']) ?>" alt="" width="100px" height="100px"></td>
                                            <td><?= $product['product_name']; ?></td>
                                            <td><?= strlen($product['product_desc']) > 300 ? substr($product['product_desc'], 0, 300) . "..." : $product['product_desc']; ?></td>
                                            <td><?= $product['qty']; ?></td>
                                            <td><?= $product['MRP']; ?></td>
                                            <td><?= $product['selling_price']; ?></td>
                                            <td><?= $product['category_id']; ?></td>
                                            <td>
                                                <a href="<?= base_url('product/update/' . $product['id']) ?>" style="display: inline " class="btn btn-sm btn-success">Edit</a>
                                                <a href="<?= base_url('product/delete/' . $product['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
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