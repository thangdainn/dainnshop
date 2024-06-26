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
    <script>
        console.log("<?php echo $totalQuantity ?>")
        $("#checkout_items").text(<?php echo $totalQuantity ?>);
    </script>
    <!-- Checkout Section -->
    <section class="checkout spad">
        <div class="checkout__content">
            <div class="checkout__form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="full-name" require>
                                        <!-- <i class="fa fa-check-circle"></i>
                                        <i class="fa fa-exclamation-circle"></i> -->
                                        <small>Error Message</small>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" class="checkout__input__add" name="address" require>
                                <!-- <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i> -->
                                <small>Error Message</small>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" require>
                                        <!-- <i class="fa fa-check-circle"></i>
                                        <i class="fa fa-exclamation-circle"></i> -->
                                        <small>Error Message</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <?php
                                    $num = 1;
                                    $totalFinal = 0;
                                    foreach ($carts as $cart) {
                                        $totalMoney = $cart['cost'] * $cart['amount'];
                                        $totalFinal += $totalMoney;
                                    ?>
                                        <li>
                                            <!-- <?php echo $num ?>. -->
                                            <span class="product-name"><?php echo $num . ". " . $cart['product_name'] ?></span>
                                            <span class="product-total">$<?php echo $totalMoney ?></span>
                                            <input type="hidden" id="product-id" value="<?php echo $cart['product_id'] ?>">
                                            <input type="hidden" id="product-size-id" value="<?php echo $cart['size_id'];
                                                                                                ?>">
                                            <input type="hidden" id="product-quantity" value="<?php echo $cart['amount'];
                                                                                                ?>">
                                        </li>
                                    <?php
                                        $num++;
                                    }
                                    ?>
                                </ul>


                                <div class="checkout-payment__checkbox" style="border-top: 1px solid #d7d7d7; padding: 16px 0;">
                                    <div class="checkout-payment__checkbox-item">
                                        <input type="checkbox" id="checkbox1" name="checkbox" value="credit" class="single-checkbox">
                                        <label for="checkbox1">Credit or Debit Card</label>
                                    </div>
                                    <div class="checkout-payment__checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="checkbox" value="cash" class="single-checkbox">
                                        <label for="checkbox2">Cash</label>
                                    </div>
                                    <div class="checkout-payment__checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="checkbox" value="mobile wallet" class="single-checkbox">
                                        <label for="checkbox3">Mobile Wallet</label>
                                    </div>
                                </div>
                                <ul class="checkout__total__all">
                                    <li>Total <span>$<?php echo $totalFinal ?></span></li>
                                </ul>
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

            var paymentMethod = '';
            $('input[type="checkbox"]').on('change', function() {
                $('input[type="checkbox"]').not(this).prop('checked', false);
                paymentMethod = $('input[type="checkbox"]:checked').val();
            });


            function checkCheckbox() {
                var isCheckboxChecked = false;

                if (paymentMethod) {
                    isCheckboxChecked = true;

                }

                if (!isCheckboxChecked) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Please select a payment method!",
                    });
                }

                return isCheckboxChecked;
            }

            function checkInput(name, phone, address) {
                var fullnameInput = $('input[name="full-name"]');
                var phoneInput = $('input[name="phone"]');
                var addressInput = $('input[name="address"]');

                if (name === "") {
                    setErrorFor(fullnameInput, "Please enter a name");
                    return false;
                } else {
                    setSuccessFor(fullnameInput);
                }

                if (address === "") {
                    setErrorFor(addressInput, "Please enter a address");
                    return false;
                } else {
                    setSuccessFor(addressInput);
                }

                if (phone === "") {
                    setErrorFor(phoneInput, "Please enter a phone");
                    return false;
                } else if (!isPhone(phone)) {
                    setErrorFor(phoneInput, "Phone number is invalid");
                    return false;
                } else {
                    setSuccessFor(phoneInput);
                }


                return true;
            }

            function setErrorFor(input, message) {
                var checkoutInput = $(input).parent();
                var small = checkoutInput.find('small');

                small.text(message);

                checkoutInput.addClass('error');

            }

            function setSuccessFor(input) {
                // var checkoutInput = $(input).parent();
                // console.log(checkoutInput);

                // checkoutInput.addClass('success');

            }

            function isPhone(a) {
                let phoneRegex = /^0\d{9}$/;

                return a.match(phoneRegex);
            }

            $('.site-btn').click(function(e) {
                e.preventDefault();

                console.log(paymentMethod);
                var fullname = $('input[name="full-name"]').val().trim();
                var phone = $('input[name="phone"]').val().trim();
                var address = $('input[name="address"]').val().trim();

                var products_detail = []
                if (checkInput(fullname, phone, address) === true && checkCheckbox() === true) {
                    $('.checkout__total__products li').each(function() {
                        var productTotal = $(this).find('.product-total').text();
                        var number = parseInt(productTotal.replace('$', ''));
                        // var productTotal = $(this).find('.product-total').text();
                        var productId = $(this).find('#product-id').val();
                        var sizeId = $(this).find('#product-size-id').val();
                        var productQuantity = $(this).find('#product-quantity').val();
                        products_detail.push({
                            product_id: productId,
                            size_id: sizeId,
                            total: number,
                            quantity: productQuantity
                        });
                    });
                    console.table(products_detail)
                    $.ajax({
                        type: "POST",
                        // dataType: "html",
                        // contentType: false,
                        // processData: false,
                        url: base_url + "/checkout/add",
                        data: {
                            fullName: fullname,
                            phone: phone,
                            address: address,
                            paymentMethod: paymentMethod,
                            products: products_detail
                        },
                        success: function(response) {
                            let message = JSON.parse(response);
                            if (!message.status) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Failed to place order. Please try again!",
                                });
                                return;
                            } else {
                                Swal.fire({
                                    title: "You have successfully placed an order!",
                                    text: "Click ok to exit",
                                    icon: "success"
                                });
                                setTimeout(function() {
                                    window.location.href = base_url + "/cart";
                                }, 3000);
                            }

                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert('Failed to place order. Please try again.');
                        }
                    });
                }


            })
        })
    </script>
</div>