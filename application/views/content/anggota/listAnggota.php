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
			<h2>Data Anggota</h2>
			<a href="<?= site_url('AnggotaController/tambah') ?>" class="btn btn-primary btn-sm">
				<i class='bx bxs-user-plus'></i>  Tambah Anggota
			</a>
		</div>
		<div class="table-responsive text-nowrap">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>No Telepon</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody class="table-border-bottom-0">
				<?php
				$no = 1;
				foreach ($anggotas as $a) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $a->id_anggota  ?></td>
						<td><?= $a->nama_anggota ?></td>
						<td><?= $a->alamat_anggota ?></td>
						<td><?= $a->no_telp_anggota ?></td>
						<td>
							<a href="<?= site_url("AnggotaController/ubah/$a->id_anggota") ?>" class="btn btn-warning btn-sm">
								<i class="bx bx-edit"></i>
							</a>
							<a href="#" data-id="<?= $a->id_anggota ?>" class="btn btn-danger btn-sm btn-delete-anggota">
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
					<form id="form-delete" method="post" action="<?= site_url('AnggotaController/delete') ?>">
					</form>
				</div>
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
