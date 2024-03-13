<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo BASE_URL ?>/public/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/login/css/main.css">
	<!--===============================================================================================-->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		var base_url = "<?php echo BASE_URL ?>";
	</script>
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="" id="formLogin" class="login100-form validate-form-login" method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input-login" data-validate="Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input-login" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="error login text-danger">
						<span>Please choose a username.</span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>
						<a id="register-btn" class="txt2" href="#">
							Register
						</a>
						<br>
						<a class="txt2" href="#">
							Forgot Password?
						</a>

					</div>
				</form>
			</div>
		</div>
		<div class="container-register100 ">
			<div class="wrap-login100">
				<form action="" id="formRegister" class="login100-form validate-form-register" method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input-register" data-validate="Valid name is: abc">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>
					<div class="wrap-input100 validate-input-register" data-validate="Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input-register" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="wrap-input100 validate-input-register" data-validate="Enter repassword">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="repassword">
						<span class="focus-input100" data-placeholder="RePassword"></span>
					</div>

					<div class="error register text-danger">
						<span>Please choose a username.</span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Register
							</button>
						</div>
					</div>

					<div class="text-center p-t-32">
						<span class="txt1">
							You had an account?
						</span>
						<a id="login-btn" class="txt2" href="#">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="logo_container">
		<a href="<?php echo BASE_URL ?>">dainn<span>shop</span></a>
	</div>

	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL ?>/public/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL ?>/public/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL ?>/public/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo BASE_URL ?>/public/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL ?>/public/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL ?>/public/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo BASE_URL ?>/public/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL ?>/public/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL ?>/public/login/js/main.js"></script>

</body>

</html>