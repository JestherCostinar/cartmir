<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>
<?= $this->include('User/layout/inc/navbar.php'); ?>

<section class="cart_middlesc">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-md-12 col-12">
                <div class="checkout_paymentbox">
                    <div class="checkout_atextele">Delivery address</div>
                    <div class="checkout_paymentform">
                        <div id="shippingAddressDiv">
                            <?php foreach ($shipping_address as $list) : ?>
                                <label><input type="radio" name="shippingAddress" value="<?= $list['id']; ?>"> <?= $list['fullname'] . ' - ' . $list['pincode'] ?></label><br>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="checkout_paymentbtnsc">
                        <a href="particuler.html" class="consualt_btn" data-toggle="modal" data-target="#exampleModal">Add Address</a>
                    </div>
                </div>

                <div class="checkout_atextele">Order Summary</div>

                <div class="cart_middleimgbox">

                    <?php
                    $totalPrice = 0;
                    $totalDiscount = 0;
                    $subTotal = 0;
                    foreach ($cart_item as $item) {
                        $totalPrice += $item['MRP'] * $item['cart_quantity'];
                        $totalDiscount += $item['MRP'] - $item['cost'];
                        $subTotal += $item['cost'] * $item['cart_quantity'];
                    ?>
                        <div class="row" id="productRow_<?= $item['id'] ?>">
                            <div class="col-xl-2 col-md-12 col-12">
                                <div class="cart_leftimgbox">
                                    <div class="cart_leftimgcon">
                                        <img src="<?= base_url('uploads/' . $item['image']) ?>" class="cart_leftimg" style="border-radius: 50%; width: 120px; height: 120px" alt="">
                                    </div>
                                    <div class="cart_formbox">
                                        <a href="javascript:void(0)" onclick="minus(<?= $item['id'] ?>, <?= session()->get('id') ?>)">
                                            <div class="cart_formminus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="cart_formminusicon" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <input type="text" maxlength="4" value="<?= $item['cart_quantity'] ?>" id="addCount_<?= $item['id'] ?>" class="cart_input">
                                        <a href="javascript:void(0)" onclick="addToCart(<?= $item['id'] ?>, <?= $item['selling_price'] ?>, <?= session()->get('id') ?>)">
                                            <div class=" cart_formplus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="cart_formminusicon" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12 col-12">
                                <div class="cart_middletextbox">
                                    <h3><?= $item['product_name'] ?></h3>
                                    <h5>₱ <?= number_format($item['selling_price'], '2', '.', ',') ?> <del><?= number_format($item['MRP'], '2', '.', ',') ?></del>
                                        <span> <?= round(($item['MRP'] - $item['cost']) * 100 / $item['MRP'], 2) . '% OFF';
                                                ?></span>
                                    </h5>

                                </div>
                            </div>

                        </div>

                    <?php } ?>
                </div>
                <div class="cart_emailbox">
                        <div class="col-md-2">
                            <label><input type="radio" value="COD" name="paymentMethod" id="" checked> COD</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="radio" value="ONLINE" name="paymentMethod" id=""> Online</label>
                        </div>
                        <div class="col-md-8">
                            <a href="javascript:void(0)" onclick="proceedToPay()">proceed to pay</a>
                        </div>
                    <!-- <h4>Order confirmation mail will sent <span><?php echo session()->get('email') ?></span> </h4> -->

                </div>

            </div>
            <div class="col-xl-3 col-md-12 col-12">
                <div class="cart_pricebox">
                    <h3>Price details</h3>
                    <div class="cart_priceborder"></div>
                    <div class="cart_pricetextbox">
                        <h4>Price 2 item</h4>
                        <h5>₱ <span id="totalItemPrice"> <?= number_format($totalPrice, '2', '.', ',') ?></span></h5>
                    </div>
                    <div class="cart_pricetextbox">
                        <h4>Discount</h4>
                        <h6>₱ <span id="totalDiscount"><?= $totalDiscount ?></span></h6>
                    </div>
                    <div class="cart_pricetextbox">
                        <h4>Delivery charge</h4>
                        <h6>Free</h6>
                    </div>
                    <div class="cart_amountbox">
                        <h4>Total amount</h4>
                        <h5>₱ <span id="subTotal"> <?= number_format($subTotal, '2', '.', ',') ?></span></h5>
                    </div>
                    <p>You will get discount of ₱<?= $totalDiscount ?> on this order</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cart middle section end hare-->
<!--modal section start hare-->
<section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Your Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Area</label>
                        <input type="text" class="form-control" id="area" name="area" placeholder="Area">
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Pin Code</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pin Code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Full Name"></textarea>
                    </div>

                    <div class="col-md-12">
                        <a href="javascript:void(0)" onclick="addAddress()" class="modal_btn form-control text-center">ADD</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>