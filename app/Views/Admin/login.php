<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="<?= base_url('assets/admin/img/kasmir-cart.png') ?>" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Kasmir Cart</h4>
                            <?php if (session()->get('loginError')) :  ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->get('loginError'); ?>
                                </div>
                            <?php endif ?>
                            <form method="POST" action="<?= base_url('/admin') ?>" method="post">
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email') ?>" autofocus>
                                    <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'email') : ''; ?></span>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                        <a href="mailto: jesther.jc15@gmail.com" class="float-right">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" data-eye>
                                    <span class="text-danger text-sm"><?= isset($validation) ? form_validator($validation, 'password') : ''; ?></span>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Don't have an account? <a href="mailto: jesther.jc15@gmail.com">Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2022 &mdash; Developed by kasmir
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?= $this->endSection() ?>