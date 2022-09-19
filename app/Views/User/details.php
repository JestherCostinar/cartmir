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
                        <div id="inputDiv" class="detail_addtocart" style="display: none;">
                            <input type="button" value="+" id="plus" onclick="plus()" class="plus_input">
                            <input type="text" size="25" value="1" id="addCount" class="details_inputtext">
                            <input type="button" value="-" id="minus" onclick="minus()" class="minus_input">
                        </div>

                        <!-- Please Wait -->
                        <?php if (session()->get('isLoggedIn')) : ?>
                            <a href="javascript:void(0)" id="addToCartBtn" onclick="addToCart(<?= $product['id'] ?>, <?= $product['selling_price'] ?>, <?= session()->get('id') ?>)"><button class="details_btn">ADD TO CART</button></a>
                        <?php else : ?>
                            <a href="<?= base_url('/login') ?>"><button class="details_btn">ADD TO CARTs</button></a>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12 col-12">
                <div class="details_textbox">
                    <h3 class="red"><?= $product['product_name'] ?></h3>
                    <h4>₱ <?= number_format($product['selling_price'], '2', '.', ',') ?> <span><del><?= number_format($product['MRP'], '2', '.', ',') ?></del></span></h4>
                    <P>Hurry, Only 1 left!</P>
                    <h5>Available offers</h5>
                    <p style="color: #000;"><?= $product['product_desc'] ?>
                    <p>
                </div>
                <!-- <div class="details_textbox1">
                    <h3>Specifications</h3>
                    <h6>Sales Package1 X Power Bank , Charging Cable , User Manual</h6>
                    <h6>Model Name Power Bank DX03 10000 Mah</h6>
                    <h6>Suitable Device Mobile</h6>
                    <h6>Number of Output Ports 3</h6>
                    <h6>Charging Cable Included Yes</h6>
                    <h6>Weight 195 g</h6>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!--products section end hare-->
<!--footer section start hare-->
<footer class="defpooter_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Copyright © 2045 Company Name | Developed by <b>kasmir </b></p>
            </div>
        </div>
    </div>
</footer>
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