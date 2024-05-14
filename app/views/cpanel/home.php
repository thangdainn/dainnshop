<!-- Slider -->

<section class="hero">
	<div class="hero__slider owl-carousel">
		<div class="hero__items set-bg" data-setbg="<?php echo BASE_URL ?>/public/user/images/slider/hero-1.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-7 col-md-8">
						<div class="hero__text">
							<h6>Summer Collection</h6>
							<h2>Fall - Winter Collections 2030</h2>
							<p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
								commitment to exceptional quality.</p>
							<a href="<?php echo BASE_URL ?>/shop" class="primary-btn">Shop now <span class="arrow_right"></span></a>
							<div class="hero__social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero__items set-bg" data-setbg="<?php echo BASE_URL ?>/public/user/images/slider/hero-2.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-7 col-md-8">
						<div class="hero__text">
							<h6>Summer Collection</h6>
							<h2>Fall - Winter Collections 2030</h2>
							<p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
								commitment to exceptional quality.</p>
							<a href="<?php echo BASE_URL ?>/shop" class="primary-btn">Shop now <span class="arrow_right"></span></a>
							<div class="hero__social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero__items set-bg" data-setbg="<?php echo BASE_URL ?>/public/user/images/slider/slider_1.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-7 col-md-8">
						<div class="hero__text">
							<h6>Summer Collection</h6>
							<h2>Fall - Winter Collections 2030</h2>
							<p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
								commitment to exceptional quality.</p>
							<a href="<?php echo BASE_URL ?>/shop" class="primary-btn">Shop now <span class="arrow_right"></span></a>
							<div class="hero__social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Banner -->

<section class="banner spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-3">
				<div class="banner__item">
					<div class="banner__item__pic">
						<img src="<?php echo BASE_URL ?>/public/user/images/banner/banner-1.jpg" loading="lazy" alt="">
					</div>
					<div class="banner__item__text">
						<h2>Top choice for Winter</h2>
						<a href="<?php echo BASE_URL ?>/shop">Shop now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="banner__item banner__item--middle">
					<div class="banner__item__pic">
						<img src="<?php echo BASE_URL ?>/public/user/images/banner/banner-2.jpg" loading="lazy" alt="">
					</div>
					<div class="banner__item__text">
						<h2>Western fashion</h2>
						<a href="<?php echo BASE_URL ?>/shop">Shop now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="banner__item banner__item--last">
					<div class="banner__item__pic">
						<img src="<?php echo BASE_URL ?>/public/user/images/banner/banner-3.jpg" loading="lazy" alt="">
					</div>
					<div class="banner__item__text">
						<h2>Maturity for men</h2>
						<a href="<?php echo BASE_URL ?>/shop">Shop now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner Section End -->

<!-- New Arrivals -->

<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>New Arrivals</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="row product-container justify-content-around">


					<?php
					foreach ($productNewList as $key => $product) {
					?>
						<div data-value="<?php echo $product['id'] ?>" class="product-item">
							<div class="product product_filter">
								<div class="product_image">
									<img src="<?php echo BASE_URL ?>/upload/images/<?php echo $product['img'] ?>" loading="lazy" alt="">
								</div>
								<div class="product_info">
									<h6 class="product_name"><?php echo $product['name'] ?></h6>
									<div class="product_price">$<?php echo $product['price'] ?></div>
								</div>
							</div>
						</div>
					<?php
					}
					?>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Deal of the week -->

<div class="deal_ofthe_week">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="deal_ofthe_week_img">
					<img src="public/user/images/deal_ofthe_week.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 text-right deal_ofthe_week_col">
				<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
					<div class="section_title">
						<h2>Deal Of The Week</h2>
					</div>
					<ul class="timer">
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="day" class="timer_num">03</div>
							<div class="timer_unit">Day</div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="hour" class="timer_num">15</div>
							<div class="timer_unit">Hours</div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="minute" class="timer_num">45</div>
							<div class="timer_unit">Mins</div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="second" class="timer_num">23</div>
							<div class="timer_unit">Sec</div>
						</li>
					</ul>
					<div class="red_button deal_ofthe_week_button"><a href="<?php echo BASE_URL ?>/shop">shop now</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Best Sellers -->

<div class="best_sellers">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Best Sellers</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product_slider_container">
					<div class="owl-carousel owl-theme product_slider">

						<!-- Slide 1 -->



						<?php
						foreach ($productBestSellerList as $key => $product) {
						?>
							<div class="owl-item product_slider_item">
								<div data-value="<?php echo $product['id'] ?>" class="product-item">
									<div class="product">
										<div class="product_image">
											<img src="<?php echo BASE_URL ?>/upload/images/<?php echo $product['img'] ?>" loading="lazy" alt="">
										</div>
										<div class="product_info">
											<h6 class="product_name"><?php echo $product['name'] ?></h6>
											<div class="product_price">$<?php echo $product['price'] ?></div>
										</div>
									</div>
								</div>
							</div>

						<?php
						}
						?>



					</div>

					<!-- Slider Navigation -->

					<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</div>
					<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>