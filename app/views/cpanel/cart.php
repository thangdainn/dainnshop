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
								<td>$<span class="product_price"><?php echo $cart['cost'] ?></span></td>
								<td>$<span class="total_money"><?php echo $totalMoney; ?></span></td>
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
							<td>&nbsp;</td>
							<td>Total cart</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td class="total_cart">$<?php echo $totalFinal; ?></td>
							<td>&nbsp;</td>
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
				echo '<div class="cart_none">No cart here</div>';
			?>
				<!-- <table class="table cart_table" id="showLSCartTable">
					<thead>
						</thread>
				</table> -->
			<?php
			}
			?>

			<script>
				//Event Handler
				function eventHandler() {

					$('.quantity_input').change(function() {
						var newQuantity = $(this).val();
						var pricePerItem = <?php echo $cart['cost'] ?>; // Assuming this is the price per item
						var newPrice = newQuantity * pricePerItem;
						var $row = $(this).closest('tr'); // Find the nearest table row
						$row.find('.product_price').text(newPrice); // Update the price

						var totalMoney = 0;
						$('.product_price').each(function() {
							totalMoney += Number($(this).text());
						});
						$('.total_money').text(totalMoney); // Update the total money
					});

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
								$('.cart_table tbody').html(response);
								eventHandler();
							}
						});
					});

					//Delete Cart
					$('.delete_btn').click(function(e) {

						var cartId = $(this).closest('tr').find('#cart-id').val();
						var userId = checkLogin();
						Swal.fire({
							title: "Are you sure you want to delete this product in your cart?",
							showDenyButton: true,
							// showCancelButton: true,
							confirmButtonText: "Delete",
							denyButtonText: `No`
						}).then((result) => {
							if (result.isConfirmed) {
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
										// // row.remove();
										eventHandler();
										setTimeout(function() {
											window.location.href = base_url + "/cart";
										}, 1000);
									},
									error: function(jqXHR, textStatus, errorThrown) {
										alert('An error occurred while deleting the product. Please try again later.');
									}
								});
								Swal.fire("Saved!", "", "success");
							}
						});
						// if (confirm("Are you sure you want to delete this product in your cart?")) {
						// 	$.ajax({
						// 		url: base_url + "/cart/deleteCart",
						// 		type: "POST",
						// 		dataType: "html",
						// 		data: {
						// 			cartId: cartId,
						// 			userId: userId
						// 		},
						// 		success: function(response) {
						// 			console.log(response);
						// 			$('.cart_table tbody').html(response);
						// 			// // row.remove();
						// 			eventHandler();
						// 		},
						// 		error: function(jqXHR, textStatus, errorThrown) {
						// 			alert('An error occurred while deleting the product. Please try again later.');
						// 		}
						// 	});
						// }
					});
				}

				$(document).ready(function() {
					eventHandler();
				});
			</script>
		</div>
	</div>
</div>