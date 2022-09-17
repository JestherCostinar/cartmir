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
                        <h3>Add Category</h3>
                        <form class="login_form">
                            <input type="text" placeholder="Category Name" name="category_name" class="login_formele">
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