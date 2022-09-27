<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('layout/header'); ?>
</head>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<?php $this->load->view('layout/navbar'); ?>

		<div class="layout-page">
			<!-- Content wrapper -->
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">

					<div class="col-lg-12 mb-4 order-0">
						<div class="card">
								<div class="col-sm-">
									<div class="card-body">
										<div class="card-body text-center">
											<img
												src="<?php base_url();?>assets/img/LogoSMASANJAYA.jpg"
												height="125"
											/>
										</div>
										<h5 class="card-title text-center text-black">Selamat Datang di Sistem Informasi Perpustakaan</h5>
										<h4 class="card-title text-center fw-bold text-black">SMA SANJAYA XIV NANGGULAN</h4>
										<h5 class="card-title text-center text-black">NPP : 3401101E2000001</h5>
									</div>
								</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-4 order-1">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-6 mb-4">
								<div class="card">
									<div class="card-body">
										<div class="card-title d-flex align-items-start justify-content-between">
											<div class="avatar flex-shrink-0">
												<img
													src="<?php base_url();?>/assets/img/icons/unicons/chart-success.png"
													alt="chart success"
													class="rounded"
												/>
												</i>
											</div>
										</div>
										<span class="fw-semibold d-block mb-1">Jumlah Buku Paket</span>
										<h3 class="card-title mb-2">$12,628</h3>
									</div>
								</div>
							</div>
							<div class="col-6 mb-4">
								<div class="card">
									<div class="card-body">
										<div class="card-title d-flex align-items-start justify-content-between">
											<div class="avatar flex-shrink-0">
												<img src="<?php base_url();?>/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
											</div>
										</div>
										<span class="fw-semibold d-block mb-1">Jumlah Buku Fiksi</span>
										<h3 class="card-title mb-2">$14,857</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-8 col-lg-12 order-3 order-md-2">
						<div class="row">
							<div class="col-6 mb-4">
								<div class="card">
									<div class="card-body">
										<div class="card-title d-flex align-items-start justify-content-between">
											<div class="avatar flex-shrink-0">
												<img src="<?php base_url();?>/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
											</div>

										</div>
										<span class="d-block mb-1">Jumlah Anggota</span>
										<h3 class="card-title text-nowrap mb-2">$2,456</h3>
									</div>
								</div>
							</div>
							<div class="col-6 mb-4">
								<div class="card">
									<div class="card-body">
										<div class="card-title d-flex align-items-start justify-content-between">
											<div class="avatar flex-shrink-0">
												<img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
											</div>

										</div>
										<span class="fw-semibold d-block mb-1">Jumlah Peminjaman Bulan Ini</span>
										<h3 class="card-title mb-2">$14,857</h3>
									</div>
								</div>
							</div>
							<!-- </div>
			<div class="row"> -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
