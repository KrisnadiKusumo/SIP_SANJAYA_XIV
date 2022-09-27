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
			<h2>Data Buku Paket</h2>
			<a href="<?= site_url('BukuController/tambahBuku') ?>" class="btn btn-primary btn-sm">
				<i class='bx bxs-book-add'></i>  Tambah Buku
			</a>
		</div>
		<div class="table-responsive text-nowrap">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>No</th>
					<th>Kategori</th>
					<th>Kode</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun Terbit</th>
					<th>Bahasa</th>
					<th>Klasifikasi</th>
					<th>Sumber Asal</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody class="table-border-bottom-0">
				<?php
				$no = 1;
				foreach ($bukus as $b) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $b->jenis_buku  ?></td>
						<td><?= $b->kode_buku  ?></td>
						<td><?= $b->judul_buku ?></td>
						<td><?= $b->pengarang_buku  ?></td>
						<td><?= $b->penerbit_buku  ?></td>
						<td><?= $b->thn_terbit_buku  ?></td>
						<td><?= $b->bahasa_buku  ?></td>
						<td><?= $b->klasifikasi_buku  ?></td>
						<td><?= $b->sumber_asal_buku  ?></td>
						<td><?= $b->harga_buku  ?></td>
						<td><?= $b->jumlah_buku ?></td>
						<td>
							<a href="<?= site_url("BukuController/ubahBuku/$b->kode_buku") ?>" class="btn btn-warning btn-sm">
								<i class="bx bx-edit"></i>
							</a>
							<a href="#" data-id="<?= $b->kode_buku ?>" class="btn btn-danger btn-sm btn-delete-buku">
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
					<form id="form-delete" method="post" action="<?= site_url('BukuController/deleteBuku') ?>">
					</form>
				</div>
			</div>
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
