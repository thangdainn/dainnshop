<?php
if (!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}
if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case "add":
			foreach ($_POST['quantity'] as $id => $quantity) {
				$_SESSION["cart"][$id] = $quantity;
			}
			break;
	}
}
if (!empty($_SESSION["cart"])) {
	$products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
}
?>

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
			<form id="cart_form" action="<?php echo BASE_URL ?>/cart?action=submit" method="post">
				<table class="table cart_table">
					<thead>
						<tr>
							<th class="product_number">STT</th>
							<th class="product_name">Tên sản phẩm</th>
							<th class="product_img">Ảnh sản phẩm</th>
							<th class="product_quantity">Số lượng</th>
							<th class="product_price">Đơn giá</th>
							<th class="total_money">Tổng tiền</th>
							<th class="product_delete">Thao tác</th>
						</tr>
					</thead>
					<tr>
						<td class="product_number">1</td>
						<td class="product_name">Pocket cotton sweatshirt</td>
						<td class="product_img"><img src="http://localhost/dainnshop/public/user/images/single_2.jpg" alt=""></td>
						<td class="product_quantity">
							<button class="quantity_btn" id="decrease">-</button>
							<input class="quantity_input" type="number" id="quantity" value="1" min="1">
							<button class="quantity_btn" id="increase">+</button>
						</td>
						<td class="product_price">495$</td>
						<td class="total_money">495$</td>
						<td class="product_delete">
							<button class="delete_btn" id="delete">Xóa</button>
						</td>
					</tr>
					<tr>
						<td class="product_number">&nbsp;</td>
						<td class="product_name">Tổng đơn hàng</td>
						<td class="product_img">&nbsp;</td>
						<td class="product_quantity">&nbsp;</td>
						<td class="product_price">&nbsp;</td>
						<td class="total_money">495$</td>
						<td class="product_delete">&nbsp;</td>
					</tr>
				</table>
				<div id="form-button">
					<input type="submit" name="update_click" value="Cập nhật" />
				</div>
				<hr>
				</hr>
			</form>
			<script>
				document.getElementById('increase').addEventListener('click', function() {
					var input = document.getElementById('quantity');
					var value = parseInt(input.value, 10);
					input.value = isNaN(value) ? 1 : value + 1;
				});

				document.getElementById('decrease').addEventListener('click', function() {
					var input = document.getElementById('quantity');
					var value = parseInt(input.value, 10);
					input.value = isNaN(value) ? 1 : (value > 1 ? value - 1 : 1);
				});
			</script>
			<?php
			if (isset($_GET['action'])) {
				echo "action";
				exit;
			}
			?>
		</div>
	</div>
</div>