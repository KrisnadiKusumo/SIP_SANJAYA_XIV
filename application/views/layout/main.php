<!DOCTYPE html>
<html lang="en">

<head>
	<title>List Anggota</title>
	<meta name="description" content="" />
	<link rel="icon" type="image/x-icon" href="../../../assets/img/favicon/favicon.ico" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet"
	/>
	<link rel="stylesheet" href="../../../assets/vendor/fonts/boxicons.css" />
	<link rel="stylesheet" href="../../../assets/vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="../../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="../../../assets/css/demo.css" />
	<link rel="stylesheet" href="../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<script src="../../../assets/vendor/js/helpers.js"></script>
	<script src="../../../assets/js/config.js"></script>
	<!-- CSS only CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- JQuery and Javascript CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
	<!-- JQuery Validation CDN -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
			<div class="app-brand demo">
				<span class="app-brand-text text-center menu-text fw-bolder ms-xl-auto">Sistem Informasi<br>Perpustakaan</span>
				<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
					<i class="bx bx-chevron-left bx-sm align-middle"></i>
				</a>
			</div>
			<div class="menu-inner-shadow"></div>

			<ul class="menu-inner py-1">
				<!-- Dashboard -->
				<li class="menu-item">
					<a href="#" class="menu-link">
						<i class="menu-icon tf-icons bx bx-home-circle"></i>
						<div data-i18n="Analytics">Dashboard</div>
					</a>
				</li>
				<!-- Layouts -->
				<li class="menu-item">
					<a href="javascript:void(0);" class="menu-link menu-toggle">
						<i class="menu-icon tf-icons bx bx-layout"></i>
						<div data-i18n="Layouts">Data Anggota</div>
					</a>
				</li>
				<!-- Forms & Tables -->
				<li class="menu-header small text-uppercase"><span class="menu-header-text">Riwayat Transaksi</span></li>
				<!-- Forms -->
				<li class="menu-item">
					<a href="javascript:void(0);" class="menu-link menu-toggle">
						<i class="menu-icon tf-icons bx bx-detail"></i>
						<div data-i18n="Form Elements">Form Elements</div>
					</a>
				</li>
				<li class="menu-item">
					<a href="javascript:void(0);" class="menu-link menu-toggle">
						<i class="menu-icon tf-icons bx bx-detail"></i>
						<div data-i18n="Form Layouts">Form Layouts</div>
					</a>
				</li>
				<!-- Tables -->
				<li class="menu-item">
					<a href="#" class="menu-link">
						<i class="menu-icon tf-icons bx bx-table"></i>
						<div data-i18n="Tables">Tables</div>
					</a>
				</li>
			</ul>
		</aside>
		<div class="layout-page">
			<div class="content-wrapper">
				<?= $this->renderSection('content') ?>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(function() {
		let idAnggota = 0
		$(".btn-delete-anggota").on("click", function() {
			idAnggota = $(this).data("id");
			console.log(idAnggota);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id_anggota")
				.val(idAnggota);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>
