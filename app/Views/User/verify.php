<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>
<?= $this->include('User/layout/inc/navbar.php'); ?>

<section class="center_div">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success mr-3" role="alert">
                        <?= (session()->get('success')) ?>
                    </div>
                <?php endif; ?>
                <h3 class=" mr-3">Account Verification</h3>
                <?php if (session()->get('verifyError')) :  ?>
                    <div class="alert alert-danger mr-3" role="alert">
                        <?= session()->get('verifyError'); ?>
                    </div>
                <?php endif ?>

                <form class="Signup_formsc" action="<?= base_url('/verify-account') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mr-3">
                        <label class="form-label">Verification Code (<span class="text-danger"> Check your email for Verification Code </span>) </label>
                        <input type="text" class="form-control " name="code" placeholder="Verification Code">
                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'code') : ''; ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->include('User/layout/inc/footer.php'); ?>

<?= $this->endSection() ?>