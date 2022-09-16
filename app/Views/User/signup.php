<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>

<section class="login_bannersc">
    <div class="container">
        <div class="row">


            <div class="col-xl-12 col-md-12 col-12">

                <div class="login_colorsc">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sign Up</a>
                        </li>

                    </ul>
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
                                            <input type="text" class="form-control" name="firstname" value="<?= set_value('firstname') ?>">
                                            <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'firstname') : ''; ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" value="<?= set_value('lastname') ?>">
                                            <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'lastname') : ''; ?></span>
                                        </div>
                                        <div class=" mb-3">
                                            <label class="form-label">Email address</label>
                                            <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
                                            <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'email') : ''; ?></span>
                                        </div>
                                        <div class=" mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                            <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'password') : ''; ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmPassword">
                                            <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'confirmPassword') : ''; ?></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Register</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="<?= base_url('/login') ?>">Already have an account? Login</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!--login banner section end here-->
<footer class="defpooter_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Copyright © ORFARM all rights reserved. Powered by <b>UBKINFOTECH</b></p>
            </div>
        </div>
    </div>
</footer>

<?= $this->endSection() ?>