<div class="container single_product_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="<?php echo BASE_URL ?>">Home</a></li>
					<li><a href="<?php echo BASE_URL ?>/shop"><i class="fa fa-angle-right" aria-hidden="true"></i>Shop</a></li>
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $product['name'] ?></a></li>
				</ul>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-7">
			<div class="single_product_pics">
				<div class="row">
					<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
						<div class="single_product_thumbnails">
							<ul>
								<li><img src="<?php echo BASE_URL ?>/upload/images/<?php echo $images[0]['image'] ?>" alt="" data-image="<?php echo BASE_URL ?>/upload/images/<?php echo $images[0]['image'] ?>"></li>
								<li class="active"><img src="<?php echo BASE_URL ?>/upload/images/<?php echo $product['img'] ?>" alt="" data-image="<?php echo BASE_URL ?>/upload/images/<?php echo $product['img'] ?>"></li>
								<li><img src="<?php echo BASE_URL ?>/upload/images/<?php echo $images[1]['image'] ?>" alt="" data-image="<?php echo BASE_URL ?>/upload/images/<?php echo $images[1]['image'] ?>"></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 image_col order-lg-2 order-1">
						<div class="single_product_image">
							<div class="single_product_image_background" style="background-image:url(<?php echo BASE_URL ?>/upload/images/<?php echo $product['img'] ?>)"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="product_details">
				<div class="product_details_title">
					<h2><?php echo $product['name'] ?></h2>
				</div>
				<?php
				if ($product['type'] == "sale") {
				?>
					<div class="original_price">$<?php echo $product['price'] ?></div>
					<div class="product_price">$<?php echo $product['sale'] ?></div>

				<?php
				} else {
				?>
					<div class="product_price" style="margin-top: 21px;">$<?php echo $product['price'] ?></div>
				<?php
				}
				?>


				<ul class="star_rating">

					<?php
					if (count($reviews) <= 0) {
					?>
						<p>No Ratings Yet</p>
						<?php
					} else {
						$star = 0;
						foreach ($reviews as $key => $review) {
							$star += $review['star'];
						}
						$star = round($star / count($reviews));
						for ($i = 1; $i <= 5; $i++) {
							if ($i <= $star) {
						?>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<?php
							} else {
							?>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
					<?php
							}
						}
					}
					?>

				</ul>
				<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
					<span class="ti-truck"></span><span>free delivery</span>
				</div>

				<div class="product_size">
					<span>Size:</span>

					<ul>
						<?php
						$totalItem = 0;
						foreach ($sizes as $key => $size) {
							$totalItem += $size['quantity'];
						?>
							<li <?php echo ($size['quantity'] < 1) ? 'class="empty"' : '' ?> data-value="<?php echo $size['quantity'] ?>" value="<?php echo $size['id'] ?>">
								<?php echo $size['name'] ?>
							</li>
						<?php
						}
						?>

					</ul>
					<div id="exclamation">
						<i class="fa fa-exclamation-circle"></i>
					</div>

				</div>
				<div class="quantity d-flex flex-sm-row align-items-center">
					<span>Quantity:</span>
					<div class="quantity_selector">
						<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
						<input type="text" id="quantity_value" value="1" min="1" max="<?php echo $totalItem ?>"></input>
						<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
					</div>
					<div class="total_item" data-value="<?php echo $totalItem ?>"><?php echo $totalItem ?> pieces available</div>

				</div>
				<div id="error">Please select product size first</div>

				<div class="add_cart d-flex justify-content-between" style="margin-top: 40px;">
					<div class="buy_now_button"><a href="" style="height: 100%; padding-top: 6px;">buy now</a></div>
					<div class="red_button add_to_cart_button"><a href="" style="height: 100%; padding-top: 6px;">add to cart</a></div>
				</div>
				<input id="user_id" type="hidden" value="<?php echo Session::isLogin() ? Session::getUserId() : 0 ?>">
				<input id="product_id" type="hidden" value="<?php echo $product['id'] ?>">
			</div>
		</div>
	</div>

</div>

<!-- Tabs -->

<div class="tabs_section_container">

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="tabs_container">
					<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
						<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
						<!-- <li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li> -->
						<li class="tab" data-active-tab="tab_3"><span>Reviews</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">

				<!-- Tab Description -->

				<div id="tab_1" class="tab_container active">
					<!-- <div class="row"> -->
					<div class=" desc_col">
						<div class="tab_title">
							<h4>Description</h4>
						</div>
						<div class="tab_text_block">
							<p><?php echo $product['description'] ?></p>
						</div>

					</div>

				</div>

				<div id="tab_3" class="tab_container">
					<div class="row">

						<!-- User Reviews -->

						<div class="col-lg-12 reviews_col">
							<div class="tab_title reviews_title">
								<h4>Reviews (<?php echo count($reviews) ?>)</h4>
							</div>
							<?php
							if (count($reviews) <= 0) {
							?>
								<h5 class="text-center">No rating yet</h5>
								<?php
							} else {
								foreach ($reviews as $key => $review) {
									foreach ($userReviews as $index => $userReview) {
										if ($review['user_id'] == $userReview['id']) {

								?>
											<div class="user_review_container d-flex flex-column flex-sm-row">
												<div class="user">
													<div class="user_pic">
														<img src="<?php echo BASE_URL ?>/upload/<?php echo $userReview['image'] ?>" alt="">
													</div>
													<div class="user_rating">
														<ul class="star_rating">
															<?php
															for ($i = 1; $i <= 5; $i++) {
																if ($i <= $review['star']) {
															?>
																	<li><i class="fa fa-star" aria-hidden="true"></i></li>
																<?php
																} else {
																?>
																	<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
															<?php
																}
															}
															?>
														</ul>
													</div>
												</div>
												<div class="review">
													<div class="review_date"><?php echo $review['create_at'] ?></div>
													<div class="user_name"><?php echo $userReview['fullname'] ?></div>
													<p><?php echo $review['message'] ?></p>
												</div>
											</div>
							<?php
										}
									}
								}
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="toast">
	<!-- <div class="alert alert-success d-flex flex-column hidden" role="alert">
		<div class="success_icon">
			<i class="fa fa-check" aria-hidden="true"></i>
		</div>
		<p class="notification">Item has been added to your shopping cart !</p>
	</div> -->
</div>