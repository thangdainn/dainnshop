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
					<form id="form-profile" action="" class=" col-lg-6" method="post">
						<div class="form-group" data-validate="Valid name is: abc">
							<label for="name">Name</label>
							<input type="text" value="<?php echo $user['fullname'] ?>" class="form-control " id="name">
						</div>
						<div class="form-group" data-validate="Valid email is: a@b.c">
							<label for="email">Email</label>
							<input type="email" value="<?php echo $user['email'] ?>" class="form-control" id="email">
						</div>
						<div class="form-group" data-validate="Valid phone is: 0xxx">
							<label for="phone">Phone</label>
							<input type="text" value="<?php echo $user['phone'] ?>" class="form-control" id="phone">
						</div>
						<div>
							<button id="update_profile" class="message_submit_btn trans_300">Save</button>
							<button id="change_password" class="message_submit_btn trans_300" style="margin-left: 10px;">Change Password</button>
						</div>
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

		<div class="col-lg-6"></div>
	</div>
</div>