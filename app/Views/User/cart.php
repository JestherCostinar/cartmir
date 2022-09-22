<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>
<?= $this->include('User/layout/inc/navbar.php'); ?>

<section class="cart_middlesc">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-md-12 col-12">
                <div class="cart_middleimgbox">
                    <div class="cart_itembox">
                        <h3>Total item (<span id="countOfProductInCart"><?= $cart_count ?></span>) </h3>
                    </div>
                    <?php
                    $totalPrice = 0;
                    $totalDiscount = 0;
                    $subTotal = 0;
                    foreach ($cart_item as $item) {
                        $totalPrice += $item['MRP'] * $item['cart_quantity'];
                        $totalDiscount +=  $item['MRP'] - $item['cost'];
                        $subTotal += $item['cost'] * $item['cart_quantity'];
                    ?>
                        <div class="cart_middleborder" id="middlebordertop_<?= $item['id'] ?>"></div>
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
                            <div class="col-xl-6 col-md-12 col-12">
                                <div class="cart_rightextbox">
                                    <div class="cart_middletextbtnsc">
                                        <button class="cart_middletextbtn" onclick="removeItem(<?= $item['id'] ?>, <?= session()->get('id') ?>, <?= $item['cartID'] ?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="cart_deleteicon" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart_middleborder" id="middleborder_<?= $item['id'] ?>"></div>

                    <?php }; ?>
                </div>
                <div class="cart_cheackoutsc">
                    <a href="<?= base_url('checkout')?>">Checkout</a>
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
<?= $this->endSection() ?>