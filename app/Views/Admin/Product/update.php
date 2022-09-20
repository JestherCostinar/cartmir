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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('product') ?>">Product list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                </ol>
                <!-- Page Heading -->
                <!-- <h1 class="h3 mb-3 text-gray-800">Products
                    <a href="<?= base_url('/product/create') ?>" class="btn btn-primary float-right">Update product</a>
                </h1> -->
                <img src="<?= base_url('uploads/' . $product['image']) ?>" alt="" width="300px" height="300px">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product information
                        </h6>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="<?= base_url('/product/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-0">
                                <label class="col-md-12 mb-0">Product Category <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <select class="form-control input-sm" name="category_id" value="<?= set_value('category_id') ?>">
                                        <option value="<?= set_value('category_id', $product['category_id']) ?>" selected="selected"><?= set_value('category_id', $product['category_id']) ?></option>
                                        <?php foreach ($categories as $i => $category) : ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <small class="text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'category_id') : ''; ?></small>
                            </div>
                            <div class="form-group mb-0 mt-2">
                                <label class="col-md-12 mb-0">Product Name <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" placeholder="Product Name" name="product_name" value="<?= set_value('product_name', $product['product_name']) ?>">
                                </div>
                                <small class="text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'product_name') : ''; ?></small>
                            </div>
                            <div class="form-group mb-0 mt-2">
                                <label class="col-md-12 mb-0">Original Price <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" placeholder="Original Price" name="MRP" value="<?= set_value('MRP', $product['MRP']) ?>">
                                </div>
                                <small class="text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'MRP') : ''; ?></small>
                            </div>
                            <div class="form-group mb-0 mt-2">
                                <label class="col-md-12 mb-0">Selling Price <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" placeholder="Selling Price" name="selling_price" value="<?= set_value('selling_price', $product['selling_price']) ?>">
                                </div>
                                <small class="text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'selling_price') : ''; ?></small>
                            </div>
                            <div class="form-group mb-0 mt-2">
                                <label class="col-md-12 mb-0">Product Quantity <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control ps-0 form-control-line" placeholder="Product Quantity" name="qty" value="<?= set_value('qty', $product['qty']) ?>">
                                </div>
                                <small class="text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'qty') : ''; ?></small>
                            </div>
                            <div class="input-group px-2 mt-2">
                                <label class="col-md-12 mb-0">Product Image <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="product_image" value="<?= set_value('product_image', $product['image']) ?>">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="mb-3 mr-0">
                                <small class="text-danger ml-3"><?= isset($validation) ? form_validator($validation, 'product_image') : ''; ?></small>
                            </div>

                            <div class="form-group px-2 mt-4">
                                <label>Product Description</label>
                                <textarea type="text" placeholder="Product Description" class="login_formele" id="ck_editor" name="product_desc" rows="10"><?= set_value('product_desc', $product['product_desc']) ?></textarea>
                                <span class=" text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'product_desc') : ''; ?></span>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 d-flex">
                                    <button type="submit" name="submit" class=" btn btn-success mx-auto mx-md-0 text-white">Update Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?= $this->include('Admin/layout/inc/footer.php'); ?>

        <?= $this->endSection() ?>
        <?= $this->section('script') ?>
        <script>
            CKEDITOR.replace('ck_editor');
        </script>
        <?= $this->endSection() ?>