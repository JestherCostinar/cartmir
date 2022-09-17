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
                        <h3>Add Products</h3>
                        <form class="login_form">
                            <select class="login_formele">
                                <option value="volvo">Products Category</option>
                                <option value="saab">1</option>
                                <option value="mercedes">2</option>
                                <option value="audi">3</option>
                            </select>
                            <input type="text" placeholder="Products Name" class="login_formele" required>
                            <input type="text" placeholder="Products Price" class="login_formele" required>
                            <select class="login_formele">
                                <option value="volvo">Products pc</option>
                                <option value="saab">1</option>
                                <option value="mercedes">2</option>
                                <option value="audi">3</option>
                            </select>
                            <select class="login_formele">
                                <option value="volvo">Choose Image</option>
                                <option value="saab">1</option>
                                <option value="mercedes">2</option>
                                <option value="audi">3</option>
                            </select>
                            <textarea input type="text" placeholder="Description" class="login_formele"></textarea>
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