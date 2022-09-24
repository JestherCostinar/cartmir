<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>
<?= $this->include('User/layout/inc/navbar.php'); ?>

<section class="center_div">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <h3 class=" mr-3">Login</h3>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success mr-3" role="alert">
                        <?= (session()->get('success')) ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->get('loginError')) :  ?>
                    <div class="alert alert-danger mr-3" role="alert">
                        <?= session()->get('loginError'); ?>
                    </div>
                <?php endif ?>

                <form class="Signup_formsc" action="<?= base_url('/login') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mr-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control " name="email" value="<?= set_value('email') ?>" placeholder="Email Address">
                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'email') : ''; ?></span>
                    </div>
                    <div class="mb-3  mr-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'password') : ''; ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
                <p class="mt-2">Don't have an account? <a href="<?= base_url('/signup') ?>"> <span>Register</span></a></p>
            </div>
        </div>
    </div>
</section>
<?= $this->include('User/layout/inc/footer.php'); ?>

<?= $this->endSection() ?>