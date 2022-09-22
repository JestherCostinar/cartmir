<?= $this->extend('User/layout/frontend.php'); ?>

<?= $this->section('content'); ?>
<?= $this->include('User/layout/inc/navbar.php'); ?>

<section class="cart_middlesc">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-md-12 col-12">
                <div class="checkout_paymentbox">
                    <div class="checkout_atextele">Delivery address</div>
                    <form class="checkout_paymentform">
                        <input type="radio">
                        <label>John doe , United state, 200012</label><br>
                        <input type="radio">
                        <label>Kalon Jon , Kolkata, 712</label><br>
                        <input type="radio">
                        <label>Bibek lon , Kolkata, 712</label><br>
                        <input type="radio">
                        <label>Loi Hapis , United state, 200012</label>
                    </form>
                    <div class="checkout_paymentbtnsc">
                        <a href="particuler.html" class="consualt_btn" data-toggle="modal" data-target="#exampleModal">Add Address</a>
                    </div>
                </div>
                <div class="cart_middleimgbox">
                    <div class="checkout_deliverybox">Order summery</div>
                    <div class="row">
                        <div class="col-xl-2 col-md-12 col-12">
                            <div class="cart_leftimgbox">
                                <div class="cart_leftimgcon">
                                    <img src="images/_Pngtree_12-dot_digital_mobile_phone_on_5489677_1-removebg-preview.png" class="cart_leftimg" alt="">
                                </div>
                                <div class="cart_formbox">
                                    <div class="cart_formminus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="cart_formminusicon" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </div>
                                    <input type="text" maxlength="4" placeholder="1" class="cart_input">
                                    <div class="cart_formplus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="cart_formminusicon" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12 col-12">
                            <div class="cart_middletextbox">
                                <h3>Realme x20 pro max</h3>
                                <h4>Black</h4>
                                <h5>₹ 10,499 <del>₹ 10,999</del><span> 4% OFF</span></h5>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12 col-12">
                            <div class="cart_rightextbox">
                                <h6>Delivery expected sun jan 31 I <span> Delivery free</span></h6>
                                <div class="cart_middletextbtnsc">
                                    <button class="cart_middletextbtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="cart_deleteicon" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart_emailbox">
                    <h4>Order confirmation mail will sent <span>email@xyz.com </span> </h4>
                    <a href="success.html">proceed to pay</a>
                </div>

            </div>
            <div class="col-xl-3 col-md-12 col-12">
                <div class="cart_pricebox">
                    <h3>Price details</h3>
                    <div class="cart_priceborder"></div>
                    <div class="cart_pricetextbox">
                        <h4>Price 2 item</h4>
                        <h5>₹ 45,998</h5>
                    </div>
                    <div class="cart_pricetextbox">
                        <h4>Discount</h4>
                        <h6>-₹ 1000</h6>
                    </div>
                    <div class="cart_pricetextbox">
                        <h4>Delivery charge</h4>
                        <h6>Free</h6>
                    </div>
                    <div class="cart_amountbox">
                        <h4>Total amount</h4>
                        <h5>₹ 44,998</h5>
                    </div>
                    <p>You will get discount of ₹1000 on this order</p>
                </div>
                <img src="images/price-carv.png" class="cart_pcarvimg">
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
                    <h5 class="modal-title" id="exampleModalLabel">Seclet Your Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="modal_formbox">
                        <select name="cars" id="cars" class="modal_form">
                            <option value="volvo">Seclet Your Address</option>
                            <option value="audi">Joypur</option>
                            <option value="audi">Kolkata</option>
                            <option value="audi">Hooghly</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                        </select>
                        <textarea type="text" placeholder="Message" class="modal_form1" required></textarea>
                        <button class="modal_btn">ADD</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>