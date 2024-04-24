<input type="hidden" id="user-id" value="<?php echo Session::getUserId();
											?>">
<!-- Cart -->
<div class="container cart_container">
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

	<!-- Cart -->
	<div class="row">
		<div class="col">
			<?php if (!empty($carts)) {
			?>
				<table class="table cart_table">
					<thead>
						<tr>
							<th class="product_number">No</th>
							<th class="product_name">Product name</th>
							<th class="product_img">Product image</th>
							<th class="product_quantity">Quantity</th>
							<th class="product_price">Price</th>
							<th class="total_money">Total</th>
							<th class="product_delete">Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$num = 1;
						$totalFinal = 0;
						foreach ($carts as $cart) {
							$totalMoney = $cart['cost'] * $cart['amount'];
							$totalFinal += $totalMoney;
						?>
							<tr>
								<input type="hidden" id="cart-id" value="<?php echo $cart['cart_id'];
																			?>">
								<td class="product_number"><?php echo $num; ?></td>
								<td class="product_name"><?php echo $cart['product_name'] ?> </td>
								<td class="product_img"><img src="<?php echo BASE_URL ?>/upload/images/<?php echo $cart['product_img'] ?>" alt=""></td>
								<td class="product_quantity">
									<input class="quantity_input" type="number" value="<?php echo $cart['amount'] ?>" min="1">
								</td>
								<td class="product_price"><?php echo $cart['cost'] ?></td>
								<td class="total_money"><?php echo $totalMoney; ?></td>
								<td class="product_action">
									<button class="btn delete_btn" id="delete">Delete</button>
									<button class="btn update_btn" id="update">Update</button>
								</td>
							</tr>

						<?php
							$num++;
						}
						?>
						<tr>
							<td class="product_number">&nbsp;</td>
							<td class="product_name">Total cart</td>
							<td class="product_img">&nbsp;</td>
							<td class="product_quantity">&nbsp;</td>
							<td class="product_price">&nbsp;</td>
							<td class="total_money"><?php echo $totalFinal; ?></td>
							<td class="product_delete">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<div class="cart_buttons">
					<div id="payment-button">
						<a href="<?php echo BASE_URL ?>/checkout" class="btn payment_btn">Checkout</a>
					</div>
				</div>
			<?php
			} else {
			?>
				<table class="table cart_table" id="showLSCartTable">
					<thead>
						</thread>
				</table>
			<?php
			}
			?>

			<!-- <hr>
			</hr> -->
			<!-- </form> -->
			<script>
				//Edit Amount on up down button
				function eventHandler() {
					//Update Amount
					$(document).on('click', '.update_btn', function(e) {
						var cartId = $(this).closest('tr').find('#cart-id').val();
						var newAmount = $(this).closest('tr').find('.quantity_input').val();
						var userId = $('#user-id').val();

						$.ajax({
							type: "POST",
							dataType: "html",
							url: base_url + "/cart/updateAmount",
							data: {
								cartId: cartId,
								newAmount: newAmount,
								userId: userId
							},
							success: function(response) {
								console.log(response);
								$('.cart_table tbody').html(response);
								eventHandler();
								addEventListenersToQuantityButtons();
							}
						});
					});

					//Delete Cart
					$('.delete_btn').click(function(e) {

						var cartId = $(this).closest('tr').find('#cart-id').val();
						var userId = $('#user-id').val();

						if (confirm("Are you sure you want to delete this product in your cart?")) {
							$.ajax({
								url: base_url + "/cart/deleteCart",
								type: "POST",
								dataType: "html",
								data: {
									cartId: cartId,
									userId: userId
								},
								success: function(response) {
									console.log(response);
									$('.cart_table tbody').html(response);
									eventHandler();
								},
								error: function(jqXHR, textStatus, errorThrown) {
									alert('An error occurred while deleting the product. Please try again later.');
								}
							});
						}
					});
				}

				$(document).ready(function() {
					eventHandler();
				});
			</script>
		</div>
	</div>
</div>