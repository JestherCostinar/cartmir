<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>

<section class="Signup_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="Signup_textsc">
                    <div class="Signup_lefttxtbox">
                        <img src="<?= base_url('assets/user/images/15.jpg') ?>" alt="" class="Signup_img">
                    </div>
                    <div class="Signup_righttxtbox" style="padding-top: 100px;">
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
                                <input type="text" class="form-control " name="email" value="<?= set_value('email') ?>">
                                <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'email') : ''; ?></span>
                            </div>
                            <div class="mb-3  mr-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                                <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'password') : ''; ?></span>

                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>

                        </form>
                        <h5><a href="<?= base_url('/signup') ?>">Need An Account <span></span></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>