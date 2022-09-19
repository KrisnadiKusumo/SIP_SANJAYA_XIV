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
					<div class="card">
						<div class="card-header">
							<h2>Data Fiksi</h2>
							<a href="<?= site_url('FiksiController/tambah') ?>" class="btn btn-primary btn-sm">
								<i class='bx bxs-user-plus'></i>  Tambah Fiksi
							</a>
						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode Fiksi</th>
									<th>Judul Fiksi</th>
									<th>Pengarang Fiksi</th>
									<th>Klasifikasi Fiksi</th>
									<th>Sumber Asal Fiksi</th>
									<th>Bahasa Fiksi</th>
									<th>Macam Fiksi</th>
									<th>Harga Fiksi</th>
									<th>Keterangan Fiksi</th>
									<th>Jumlah Fiksi</th>
								</tr>
								</thead>
								<tbody class="table-border-bottom-0">
								<?php
								$no = 1;
								foreach ($fiksis as $f) {
									?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $f->kode_fiksi  ?></td>
										<td><?= $f->judul_fiksi ?></td>
										<td><?= $f->pengarang_fiksi ?></td>
										<td><?= $f->klasifikasi_fiksi ?></td>
										<td><?= $f->sumber_asal_fiksi ?></td>
										<td><?= $f->bahasa_fiksi ?></td>
										<td><?= $f->macam_fiksi ?></td>
										<td><?= $f->harga_fiksi ?></td>
										<td><?= $f->keterangan_fiksi ?></td>
										<td><?= $f->jumlah_fiksi ?></td>
										<td>
											<a href="<?= site_url("FiksiController/ubah/$f->kode_fiksi") ?>" class="btn btn-warning btn-sm">
												<i class="bx bx-edit"></i>
											</a>
											<a href="#" data-id="<?= $f->kode_fiksi ?>" class="btn btn-danger btn-sm btn-delete-fiksi">
												<i class="bx bx-trash"></i>
											</a>
										</td>
									</tr>
									<?php
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal" id="modal-confirm-delete">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Anda Yakin Ingin Hapus Data Ini?</h5>
								</div>
								<div class="modal-body">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
									<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
								</div>
							</div>
						</div>
					</div>
					<form id="form-delete" method="post" action="<?= site_url('FiksiController/delete') ?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(function() {
		let idFiksi = 0
		$(".btn-delete-fiksi").on("click", function() {
			idFiksi = $(this).data("id");
			console.log(idFiksi);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "kode_fiksi")
				.val(idFiksi);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>