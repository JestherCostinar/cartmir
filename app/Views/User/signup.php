<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>
<?= $this->include('User/layout/inc/navbar.php'); ?>

<section class="center_div_signup">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">

                    <div id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="col-xl-12 col-md-12 col-12 p-0 m-0">
                            <div class="lodin_iconbox">

                            </div>
                            <div class="login_formbox">
                                <form action="<?= base_url('signup'); ?>" method="post" class="login_form">
                                    <?= csrf_field(); ?>
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="<?= set_value('firstname') ?>" placeholder="Firstname">
                                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'firstname') : ''; ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" value="<?= set_value('lastname') ?>" placeholder="Lastname">
                                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'lastname') : ''; ?></span>
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="Email Address">
                                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'email') : ''; ?></span>
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'password') : ''; ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
                                        <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'confirmPassword') : ''; ?></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Register</button>

                                </form>

                            </div>
                            <ul class="nav nav-tabs ml-3">

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="<?= base_url('/login') ?>"><span class="text-dark">Already have an account? </span>Login</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<!--login banner section end here-->
<?= $this->include('User/layout/inc/footer.php'); ?>


<?= $this->endSection() ?>