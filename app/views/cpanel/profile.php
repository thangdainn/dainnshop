<div class="container contact_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="<?php echo BASE_URL ?>">Home</a></li>
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>User</a></li>
				</ul>
			</div>

		</div>
	</div>

	<!-- Map Container -->



	<!-- Contact Us -->

	<div class="row">

		<div class="col-lg-12 get_in_touch_col">
			<div class="get_in_touch_contents">
				<h3>My Profile</h3>
				<p style="padding-bottom: 20px; border-bottom: solid 1px #ebebeb;">Manage and protect your account</p>
				<div class="row" style="margin-top: 30px;">
					<!-- <div class="row"> -->
					<form id="form-profile" action="" class=" col-lg-6" method="post" enctype="multipart/form-data">
						<div class="form-group" data-validate="Valid name is: abc">
							<label for="name">Name</label>
							<input type="text" value="<?php echo $user['fullname'] ?>" class="form-control " id="name" name="name" autocomplete="off">
						</div>
						<div class="form-group" data-validate="Valid email is: a@b.c">
							<label for="email">Email</label>
							<input type="email" value="<?php echo $user['email'] ?>" class="form-control" id="email" name="email">
						</div>
						<div class="form-group" style="margin-bottom: 16px;" data-validate="Valid phone is: 0xxx(10)">
							<label for="phone">Phone</label>
							<input type="tel" value="<?php echo $user['phone'] ?>" class="form-control" id="phone" name="phone">
						</div>
						<div class="error profile text-danger" style="margin-bottom: 16px;">
							<span>Text error.</span>
						</div>
						<div class="d-flex justify-content-center">
							<button id="update_profile" class="message_submit_btn trans_300">Save</button>
							<button id="change_password" class="message_submit_btn trans_300" style="margin-left: 10px;">Change Password</button>
						</div>
						<input id="id" type="hidden" value="<?php echo $user['id'] ?>">
					</form>
					<!-- </div> -->
					<div class="col-lg-1" style="border-right: solid 1px #ebebeb;"></div>
					<div class="col-lg-5" style="margin-top: 12px;">
						<div class="text-center">
							<img id="img" src="<?php echo BASE_URL ?>/upload/<?php echo $user['image'] ?>" alt="Profile Picture" style="width: 160px; height: 160px; border-radius: 50%;">
							<br>
							<label for="image" class="file-label">Select Image</label>
							<input type="file" accept=".jpg, .png" id="image" class="file-input" enctype="multipart/form-data" onchange="handleFileChange(this)">
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="modal modal-change-pass">
			<div class="modal-container js-modal-container">

				<header class="modal-header">
					<i class="modal-heading-icon fa fa-key"></i>
					Change Password
					<div class="modal-close js-modal-close">
						<i class="ti-close"></i>
					</div>
				</header>
				<form id="formChangePassword" class="modal-body">
					<div class="form-group row" data-validate="Enter min 6 characters">
						<label for="current_password" class="col-5">Current Password</label>
						<input type="password" class="form-control col-7" id="current_password" name="current_password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
					</div>
					<div class="form-group row" data-validate="Enter min 6 characters">
						<label for="new_password" class="col-5">New Password</label>
						<input type="password" class="form-control col-7" id="new_password" name="new_password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
					</div>
					<div class="form-group row" data-validate="Enter password(6)">
						<label for="confirm_password" class="col-5">Confirm Password</label>
						<input type="password" class="form-control col-7" id="confirm_password" name="confirm_password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
					</div>
					<div class="error change-pass text-danger">
						<span>Text error.</span>
					</div>
					<button id="submit-change-pass">
						Submit
					</button>
				</form>

			</div>
		</div>
	</div>
</div>