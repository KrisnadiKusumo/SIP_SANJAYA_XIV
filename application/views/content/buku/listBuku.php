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
								<h1>Data Buku Paket</h1>
								<div class="d-flex justify-content-between">
									<div class="button-wrapper">
										<a href="<?= site_url('BukuController/tambahBuku') ?>" class="btn btn-primary">
											<i class='bx bxs-book-add d-block d-sm-none'></i>
											<span class="d-none d-sm-block">
												<i class='bx bxs-book-add'></i>
												Tambah Buku
											</span>
										</a>
									</div>
									<form class="d-flex" onsubmit="return false">
										<input class="form-control me-2" onkeyup="success()" type="search" id="searchinput" placeholder="Cari... (Kode / Judul)" aria-label="Search" />
										<button onclick="cariBuku()" class="btn me-2 btn-outline-primary btn-sm" type="submit" id="button" disabled>
											<i class='bx bx-search-alt'></i>
										</button>
										<button onclick="refreshPage()" class="btn btn-outline-secondary btn-sm" type="submit">
											<i class='bx bx-reset'></i>
										</button>
									</form>
								</div>
							</div>
							<div class="table-responsive text-nowrap">
								<table class="table table-striped">
									<thead>
									<tr>
										<th>No</th>
										<th>Kategori</th>
										<th>Kode</th>
										<th>Judul</th>
										<th>Jumlah</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody id="databuku" class="table-border-bottom-0">
									<?php $this->load->view("content/buku/ajax/dataBuku",$bukus) ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal fade" id="modal-confirm-delete" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalCenterTitle">Anda Yakin Ingin Hapus Data Ini?</h5>
										<button
											type="button"
											class="btn-close"
											data-bs-dismiss="modal"
											aria-label="Close"
										></button>
									</div>
									<div class="modal-body">
										<div class="row">
										</div>
										<div class="row g-2">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
											Tidak
										</button>
										<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
									</div>
								</div>
							</div>
						</div>
					<form id="form-delete" method="post" action="<?= site_url('BukuController/deleteBuku') ?>">
					</form>
				</div>
			</div>
			<?php $this->load->view('layout/footer'); ?>
		</div>
	</div>
</body>
</html>
<script>
	$(function() {
		let idBuku = 0
		$(".btn-delete-buku").on("click", function() {
			idBuku = $(this).data("id");
			console.log(idBuku);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "kode_buku")
				.val(idBuku);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>

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

	function cariBuku()
	{
		var searchinput = document.getElementById('searchinput');
		var databuku = document.getElementById('databuku');
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function () {
			if(ajax.readyState == 4 && ajax.status == 200)
			{
				databuku.innerHTML = ajax.responseText;
			}
		}
		ajax.open('POST','<?=base_url()?>BukuController/ajaxCariBuku',true);
		ajax.setRequestHeader('Content-type','Application/x-www-form-urlencoded');
		ajax.send('keyword='+searchinput.value);
	}

</script>

