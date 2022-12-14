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
		<?php $this->load->view('layout/menu'); ?>
		<div class="layout-page">
			<?php $this->load->view('layout/navbar'); ?>
			<!-- Content wrapper -->
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<div class="card">
						<div class="card-header">
							<div class="mb-3 d-flex justify-content-between">
							<h1>Data Transaksi</h1>
							</div>
							<div class="mb-3 d-flex justify-content-between">
								<div class="button-wrapper">
									<a href="<?= site_url('TransaksiController/tambah') ?>" class="btn btn-primary">
										<i class='bx bxs-cart-add d-block d-sm-none'></i>
										<span class="d-none d-sm-block">
												<i class='bx bxs-cart-add'></i>
												Tambah Transaksi
											</span>
									</a>
								</div>
								<form class="d-flex" onsubmit="return false">
									<input class="form-control me-2" onkeyup="success()" type="search" id="searchinput" placeholder="Cari... (Kode / Peminjam)" aria-label="Search" />
									<button onclick="cariTransaksi()" class="btn me-2 btn-outline-primary btn-sm" type="submit" id="button" disabled>
										<i class='bx bx-search-alt'></i>
									</button>
									<button onclick="refreshPage()" class="btn btn-outline-secondary btn-sm" type="submit">
										<i class='bx bx-reset'></i>
									</button>
								</form>
							</div>
							<div class="mb-3 d-flex justify-content-center demo-inline-spacing">
								<a href="<?= site_url('TransaksiController') ?>" class="btn rounded-pill btn-outline-dark active">
									Semua
								</a>

								<a href="<?= site_url('TransaksiController/active') ?>" class="btn rounded-pill btn-outline-dark">
									Aktif
								</a>
								<a href="<?= site_url('TransaksiController/selesai') ?>" class="btn rounded-pill btn-outline-dark">
									Selesai
								</a>
							</div>
						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode Transaksi</th>
									<th>Peminjam</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody id="datatransaksi" class="table-border-bottom-0">
								<?php $this->load->view("content/transaksi/ajax/datatransaksi",$transaksis) ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<?php $this->load->view('layout/footer'); ?>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	function refreshPage(){
		window.location.reload();
	}

	function success(){
		if(document.getElementById("searchinput").value==="") {
			document.getElementById('button').disabled = true;
		} else {
			document.getElementById('button').disabled = false;
		}
	}
	
	function cariTransaksi()
	{
		var searchinput = document.getElementById('searchinput');
		var datatransaksi = document.getElementById('datatransaksi');
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function () {
			if(ajax.readyState == 4 && ajax.status == 200)
			{
				datatransaksi.innerHTML = ajax.responseText;
			}
		}
		ajax.open('POST','<?=base_url()?>TransaksiController/ajaxCariTransaksi',true);
		ajax.setRequestHeader('Content-type','Application/x-www-form-urlencoded');
		ajax.send('keyword='+searchinput.value);
	}

</script>

