<?php if (isset($cart['cart_id']) && !empty($cart['cart_id'])) : ?>
	<input type="hidden" id="cart-id" value="<?php echo $cart['cart_id']; ?>">
<?php endif; ?>
<!-- Cart -->
<input id="user-id" type="hidden" value="<?php echo Session::isLogin() ? Session::getUserId() : 0 ?>">
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
							<th class="product_size">Size</th>
							<th class="product_quantity_th">Quantity</th>
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
								<?php if (isset($cart['cart_id']) && !empty($cart['cart_id'])) : ?>
									<input type="hidden" id="cart-id" value="<?php echo $cart['cart_id']; ?>">
								<?php endif; ?>
								<input type="hidden" id="product-id" value="<?php echo $cart['product_id']; ?>">
								<td class="product_number"><?php echo $num; ?></td>
								<td class="product_name">
									<a class="product_link" href="<?php echo BASE_URL ?>/product/detail/<?php echo $cart['product_id'] ?>">
										<?php echo $cart['product_name'] ?>
								</td>
								<td class="product_img"><img src="<?php echo BASE_URL ?>/upload/images/<?php echo $cart['product_img'] ?>" alt=""></td>
								<td class="product_size"><?php echo $cart['size'] ?></td>
								<td class="product_quantity">
									<input class="quantity_input" type="number" value="<?php echo $cart['amount'] ?>" min="1">
								</td>
								<td class="product_price"><?php echo $cart['cost'] ?></td>
								<td class="total_money"><?php echo $totalMoney; ?></td>
								<td class="product_action">
									<button class="btn delete_btn" id="delete">Delete</button>
									<!-- <button class="btn update_btn" id="update">Update</button> -->
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
							<td class="total_cart"><?php echo $totalFinal; ?></td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<div class="cart_buttons">
					<div id="payment-button">
						<a href="<?php echo Session::isLogin() ? BASE_URL . '/checkout' : BASE_URL . '/login'; ?>" class="btn payment_btn">Checkout</a>
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
				function checkLogin() {
					let userId = $("#user-id").val();
					if (userId == "0") {
						return 0;
					}
					return userId;
				}
				//Event Handler đối với trường hợp đã đăng nhập
				function eventHandler() {

					//Xử lý tăng giảm số lượng
					$('.quantity_input').change(function() {
						var cartId = $(this).closest('tr').find('#cart-id').val();
						var userId = $('#user-id').val();
						var newQuantity = $(this).val();
						var $row = $(this).closest('tr'); // Find the nearest table row
						var pricePerItem = parseFloat($row.find('.product_price').text()); // Get the price per item
						var newTotalMoney = newQuantity * pricePerItem;
						$row.find('.total_money').text(newTotalMoney); // Update the total money for this product

						$.ajax({
							type: "POST",
							dataType: "html",
							url: base_url + "/cart/updateAmount",
							data: {
								cartId: cartId,
								newAmount: newQuantity,
								userId: userId
							},
							success: function(response) {
								var totalFinal = 0;
								$('.total_money').each(function() {
									var totalMoney = parseFloat($(this).text());
									totalMoney = isNaN(totalMoney) ? 0 : totalMoney;
									console.log('totalMoney:', totalMoney); // Debugging line
									totalFinal += totalMoney;
								});
								$('.total_cart').last().text(totalFinal); // Update the total final money
								eventHandler();
							}
						});

					});

					//Delete Cart
					$('.delete_btn').click(function(e) {
						var cartId = $(this).closest('tr').find('#cart-id').val();
						var userId = checkLogin();

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
									// // row.remove();
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