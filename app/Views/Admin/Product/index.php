<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
<?= $this->include('Admin/layout/inc/navbar.php'); ?>

<section class="dasbord_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12 dasbord_subbox">
                <?= $this->include('Admin/layout/inc/sidebar.php'); ?>

                <div class="right_box">
                    <div class="table_box1 p-5">
                        <?php if (session()->get('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= (session()->get('success')) ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <h3>Product List
                            <a href="<?= base_url('/product/create') ?>" class="btn btn-primary float-right">Add Product</a>
                        </h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>MRP</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $i => $product) : ?>
                                    <tr>
                                        <td><img src="<?= base_url('uploads/' . $product['image']) ?>" alt="" width="100px" height="100px"></td>
                                        <td><?= $product['product_name']; ?></td>
                                        <td><?= $product['product_desc']; ?></td>
                                        <td><?= $product['qty']; ?></td>
                                        <td><?= $product['MRP']; ?></td>
                                        <td><?= $product['selling_price']; ?></td>
                                        <td><?= $product['category_id']; ?></td>                                        
                                        <td>
                                            <a href="<?= base_url('product/update/' . $product['id']) ?>" class="btn btn-sm btn-success">Edit</a>
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
    </div>
</section>

<?= $this->endSection(); ?>