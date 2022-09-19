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
                            <a href="<?= base_url('/category') ?>" class="btn btn-primary float-start">Go back to Category</a>
                        </h3>
                        <?php if (isset($Flash_message)) :  ?>
                            <div class="alert alert-success" role="alert">
                                Product have been successfully save!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form class="login_form" action="<?= base_url('/category/create') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group mt-4">
                                <label>Category Name <span class="text-danger"> *</span></label>
                                <input type="text" placeholder="Category Name" name="category_name" class="form-control" value="<?= set_value('category_name') ?>">
                                <span class=" text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'category_name') : ''; ?></span>
                            </div>
                            <div class="input-group mt-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="category_image" value="<?= set_value('category_image') ?>">
                                    <label class=" custom-file-label" for="inputGroupFile04">Choose file for Category Image</label>
                                </div>
                            </div>
                            <div>
                                <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'category_image') : ''; ?></span>
                            </div>
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