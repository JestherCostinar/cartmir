<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content') ?>
<?= $this->include('User/layout/inc/navbar.php'); ?>

<section class="details_section">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-12 col-12">
                <div class="details_menubox">
                    <div class="slider2 owl-carousel owl-theme">
                        <div class="item">
                            <img src="<?= base_url('uploads/' . $product['image']) ?>" class="details_img">
                        </div>
                    </div>
                    <div class="details_btnsc">
                        <!-- Please Wait -->
                        <?php if (session()->get('isLoggedIn')) : ?>
                            <a <?php if ($product['cartUserID'] == session()->get('id')) { ?> style="display: none;" <?php } ?> href="javascript:void(0)" id="addToCartBtn" onclick="addToCart(<?= $product['id'] ?>, <?= $product['selling_price'] ?>, <?= session()->get('id') ?>)"><button class="details_btn">ADD TO CART</button></a>
                        <?php else : ?>
                            <a href="<?= base_url('/login') ?>"><button class="details_btn">ADD TO CARTs</button></a>
                        <?php endif; ?>

                        <div id="inputDiv" class="detail_addtocart" <?php if ($product['cartUserID'] != session()->get('id')) { ?> style="display: none;" <?php } ?>>
                            <input type="button" value="+" id="plus" onclick="addToCart(<?= $product['id'] ?>, <?= $product['selling_price'] ?>, <?= session()->get('id') ?>)" class="plus_input">
                            <input type="text" size="25" value="1" id="addCount" class="details_inputtext">
                            <input type="button" value="-" id="minus" onclick="minus(<?= $product['id'] ?>, <?= session()->get('id') ?>)" class="minus_input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12 col-12">
                <div class="details_textbox">
                    <h3 class="red"><?= $product['product_name'] ?></h3>
                    <h4>₱ <?= number_format($product['selling_price'], '2', '.', ',') ?> <span><del><?= number_format($product['MRP'], '2', '.', ',') ?></del></span></h4>
                    <P>Hurry, Only <?= $product['product_quantity']?> left!</P>
                    <h5>Available offers</h5>
                    <p style="color: #000;"><?= $product['product_desc'] ?>
                    <p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--products section end hare-->
<!--footer section start hare-->
<?= $this->include('User/layout/inc/footer.php'); ?>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $('.slider2').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        aotuplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 1
            }
        }
    })
</script>
<?= $this->endSection() ?>