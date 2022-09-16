
<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
    <section class="login_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login_box">
                        <h3>Login</h3>
                        <form class="login_form">
                            <input type="text" placeholder="Username" class="login_formele" required>
                            <input type="password" placeholder="password" class="login_formele" required>
                            <a href="index.html"><div class="login_btnsc">
                                <button class="login_btn">Login</button>
                            </div></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <?= $this->endSection() ;?>
