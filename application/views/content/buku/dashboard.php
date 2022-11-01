<!DOCTYPE html>
<html
	lang="en"
	class="light-style layout-menu-fixed"
	dir="ltr"
	data-theme="theme-default"
	data-assets-path="../assets/"
	data-template="vertical-menu-template-free"
>
<head>
	<?php $this->load->view('layout/header'); ?>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<!-- Menu -->
		<?php $this->load->view('layout/menu'); ?>
		<!-- / Menu -->
		<!-- Layout container -->
		<div class="layout-page">
			<!-- Navbar -->
			<?php $this->load->view('layout/navbar'); ?>
			<!-- / Navbar -->
			<!-- Content wrapper -->
			<div class="content-wrapper">
				<!-- Content -->
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
										<div class="d-flex align-items-end row">
											<div class="col-8">
												<div class="card-body">
													<h4 class="card-title text-black fw-bold ">Jumlah Buku Paket</h4>
													<h3 class=" text-black fw-bold "><?=$jumlah_buku?></h3>
													<a href="<?= site_url('BukuController/buku') ?>" class="btn btn-sm btn-primary">Lihat Buku Paket</a>
												</div>
											</div>
											<div class="col-4 pt-3 ps-0">
												<img src="<?php base_url();?>/assets/img/icons/unicons/book-sleep.png" width="140" height="140" class="rounded-start" alt="View Sales">
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 mb-4">
									<div class="card">
										<div class="d-flex align-items-end row">
											<div class="col-8">
												<div class="card-body">
													<h4 class="card-title text-black fw-bold ">Jumlah Buku Fiksi</h4>
													<h3 class=" text-black fw-bold "><?=$jumlah_fiksi?></h3>
													<a href="<?= site_url('BukuController/fiksi') ?>" class="btn btn-sm btn-primary">Lihat Buku Fiksi</a>
												</div>
											</div>
											<div class="col-4 pt-3 ps-0">
												<img src="<?php base_url();?>/assets/img/icons/unicons/book-stand.png" width="140" height="140" class="rounded-start" alt="View Sales">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-8 col-lg-12 order-3 order-md-2">
							<div class="row">
								<div class="col-6 mb-4">
									<div class="card">
										<div class="d-flex align-items-end row">
											<div class="col-8">
												<div class="card-body">
													<h4 class="card-title text-black fw-bold ">Jumlah Anggota</h4>
													<h3 class=" text-black fw-bold "><?=$jumlah_anggota?></h3>
													<a href="<?= site_url('AnggotaController') ?>" class="btn btn-sm btn-primary">Lihat Anggota</a>
												</div>
											</div>
											<div class="col-4 pt-3 ps-0">
												<img src="<?php base_url();?>/assets/img/icons/unicons/student.png" width="140" height="125" class="rounded-start" alt="View Sales">
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 mb-4">
									<div class="card">
										<div class="d-flex align-items-end row">
											<div class="col-8">
												<div class="card-body">
													<h4 class="card-title text-black fw-bold ">Transaksi Aktif</h4>
													<h3 class=" text-black fw-bold "><?=$jumlah_transaksi?></h3>
													<a href="<?= site_url('TransaksiController/active') ?>" class="btn btn-sm btn-primary">Lihat Transaksi</a>
												</div>
											</div>
											<div class="col-4 pt-3 ps-0">
												<img src="<?php base_url();?>/assets/img/icons/unicons/read-book.webp" width="140" height="140" class="rounded-start" alt="View Sales">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- / Content -->
				<!-- Footer -->
				<?php $this->load->view('layout/footer'); ?>
				<!-- / Footer -->
			</div>
			<!-- Content wrapper -->
		</div>
		<!-- / Layout page -->
	</div>
</div>
<!-- / Layout wrapper -->
</body>
</html>
