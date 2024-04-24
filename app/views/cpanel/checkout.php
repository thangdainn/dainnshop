<div class="container checkout_container">
    <!-- Breadcrumbs -->
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Home</a></li>
                    <li class="active"><a href="<?php echo BASE_URL ?>/cart"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Checkout Section -->
    <section class="checkout spad">
        <div class="checkout__content">
            <div class="checkout__form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="full-name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" class="checkout__input__add" name="address">
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <?php
                                $num = 1;
                                $totalFinal = 0;
                                foreach ($carts as $cart) {
                                    $totalMoney = $cart['cost'] * $cart['amount'];
                                    $totalFinal += $totalMoney;
                                ?>
                                    <ul class="checkout__total__products">
                                        <li>
                                            <?php echo $num ?>.
                                            <span class="product-name"><?php echo $cart['product_name'] ?>
                                                <span class="product-total">$<?php echo $totalMoney ?></span>
                                                <input type="hidden" id="product-id" value="<?php echo $cart['product_id'];
                                                                                            ?>">
                                                <input type="hidden" id="product-size-id" value="<?php echo $cart['size_id'];
                                                                                                    ?>">
                                                <input type="hidden" id="product-quantity" value="<?php echo $cart['amount'];
                                                                                                    ?>">
                                        </li>
                                    </ul>
                                <?php
                                    $num++;
                                }
                                ?>
                                <ul class="checkout__total__all">
                                    <li>Total <span><?php echo $totalFinal ?></span></li>
                                </ul>

                                <div class="checkout-payment__checkbox">
                                    <div class="checkout-payment__checkbox-item">
                                        <input type="checkbox" id="checkbox1" name="checkbox" class="single-checkbox">
                                        <label for="checkbox1">Credit or Debit Card</label>
                                    </div>
                                    <div class="checkout-payment__checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="checkbox" class="single-checkbox">
                                        <label for="checkbox2">Cash</label>
                                    </div>
                                    <div class="checkout-payment__checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="checkbox" class="single-checkbox">
                                        <label for="checkbox3">Mobile Wallet</label>
                                    </div>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        $('document').ready(function() {
            $('.site-btn').click(function(e) {
                e.preventDefault();

                var fullname = $('input[name="full-name"]').val();
                var phone = $('input[name="phone"]').val();
                var address = $('input[name="address"]').val();

                var products_detail = []
                $('.checkout__total__products').each(function() {
                    var productTotal = $('.product-total').val();
                    var productId = $('#product-id').val();
                    var sizeId = $('#product-size-id').val();
                    var productQuantity = $('#product-quantity').val();
                    products_detail.push({
                        product_id: productId,
                        size_id: sizeId,
                        total: productTotal,
                        quantity: productQuantity
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: base_url + "/checkout/addOrder",
                    data: {
                        fullName: fullname,
                        phone: phone,
                        address: address,
                        products: products_detail
                    },
                    success: function(reponse) {
                        console.log(reponse);
                        alert('Order successfully');
                        window.location = base_url;
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.error(error);
                        alert('Failed to place order. Please try again.');
                    }
                })
            })
        })
    </script>
</div>