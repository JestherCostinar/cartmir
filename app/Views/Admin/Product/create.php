<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
<?= $this->include('Admin/layout/inc/navbar.php'); ?>

<section class="dasbord_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12 dasbord_subbox">
                <?= $this->include('Admin/layout/inc/sidebar.php'); ?>

                <div class="right_box">
                    <div class="products_box">
                        <h3>
                            <a href="<?= base_url('/product') ?>" class="btn btn-primary float-start">Go back to Product</a>
                        </h3>
                        <?php if (isset($Flash_message)) :  ?>
                            <div class="alert alert-success" role="alert">
                                Category have been successfully save!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form class="login_form" action="<?= base_url('/product/create') ?>" method="post" enctype="multipart/form-data">
                            <select class="login_formele" name="category_id" value="<?= set_value('category_id') ?>">
                                <option selected value="">------------PRODUCT CATEGORY---------</option>
                                <?php foreach ($categories as $i => $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div>
                                <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'category_id') : ''; ?></span>
                            </div>
                            <input type="text" placeholder="Products Name" class="login_formele" name="product_name" value="<?= set_value('product_name') ?>">
                            <span class=" text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'product_name') : ''; ?></span>
                            <input type="text" placeholder="MRP" class="login_formele" name="MRP" value="<?= set_value('MRP') ?>">
                            <span class=" text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'MRP') : ''; ?></span>
                            <input type="text" placeholder="Products Price" class="login_formele" name="selling_price" value="<?= set_value('selling_price') ?>">
                            <span class=" text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'selling_price') : ''; ?></span>
                            <input type="number" placeholder="Products Quantity" class="login_formele" name="qty" value="<?= set_value('qty') ?>">
                            <span class=" text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'qty') : ''; ?></span>
                            <div class="input-group mt-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="product_image" value="<?= set_value('product_image') ?>">
                                    <label class=" custom-file-label" for="inputGroupFile04">Choose file for Product Image</label>
                                </div>
                            </div>
                            <div>
                                <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'product_image') : ''; ?></span>
                            </div>

                            <textarea type="text" placeholder="Product Description" class="login_formele" name="product_desc" rows="10" value="<?= set_value('category_id') ?>"></textarea>
                            <div class="login_btnsc">
                                <button class="login_btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>