<!doctype html>
<html lang="en"
	  class="light-style customizer-hide"
	  dir="ltr"
	  data-theme="theme-default"
	  data-assets-path="../assets/"
	  data-template="vertical-menu-template-free">
<head>
	<?php $this->load->view('layout/header'); ?>
	<link rel="stylesheet" href="<?php base_url();?>/assets/vendor/css/pages/page-auth.css" />
</head>
<body>

<div class="container-xxl">
	<div class="authentication-wrapper authentication-basic container-p-y">
		<div class="authentication-inner">
			<!-- Register -->
			<div class="card">
				<div class="card-body">
					<!-- Logo -->
					<p class="text-center">
						<img src="<?php base_url();?>assets/img/sip.png" width="85" height="85" class="d-inline-block align-content-center" alt="">
						<br>
						<span class="fw-bold ">SISTEM INFORMASI PERPUSTAKAAN<br>SMA SANJAYA XIV NANGGULAN</span>
						<span >NPP:3401101E2000001<br></span>
					</p>
					<!-- /Logo -->

					<form id="formAuthentication" class="mb-3" action="<?= site_url('Login/proseslogin') ?>" method="POST">
						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input
								type="text"
								class="form-control"
								id="username"
								name="username"
								placeholder="Enter your username"
								autofocus
							/>
						</div>
						<div class="mb-3 form-password-toggle">
							<div class="d-flex justify-content-between">
								<label class="form-label" for="password">Password</label>
								<a href="auth-forgot-password-basic.html">
									<small>Forgot Password?</small>
								</a>
							</div>
							<div class="input-group input-group-merge">
								<input
									type="password"
									id="password"
									class="form-control"
									name="password"
									placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
									aria-describedby="password"
								/>
								<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
							</div>
						</div>
						<div class="mb-3">
							<button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
						</div>
					</form>


				</div>
			</div>
		</div>
	</div>
</div>

<!-- / Content -->
</body>
</html>
