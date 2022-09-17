<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
<section class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="login_box">
                    <h3>Login</h3>
                    <?php if (session()->get('loginError')) :  ?>
                        <div class="alert alert-danger mr-3" role="alert">
                            <?= session()->get('loginError'); ?>
                        </div>
                    <?php endif ?>
                    <form class="login_form" action="<?= base_url('/admin') ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="text" placeholder="email" class="login_formele" name="email" value="<?= set_value('email') ?>">
                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'email') : ''; ?></span>
                        <input type="password" placeholder="password" class="login_formele" name="password">
                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'password') : ''; ?></span>
                        <a href="index.html">
                            <div class="login_btnsc">
                                <button class="login_btn">Login</button>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>