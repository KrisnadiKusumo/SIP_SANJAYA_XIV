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
							<h2>Data Transaksi</h2>
							<a href="<?= site_url('TransaksiController/tambah') ?>" class="btn btn-primary btn-sm">
								<i class='bx bxs-cart-add'></i>  Tambah Transaksi
							</a>
						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Peminjam</th>
									<th>Buku</th>
									<th>Tanggal Pinjam</th>
									<th>Deadline Kembali</th>
									<th>Tanggal Kembali</th>
									<th>Denda</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="table-border-bottom-0">
								<?php
								$no = 1;
								foreach ($transaksis as $t) {


									?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $t->kode_transaksi  ?></td>
										<td><?= $t->nama_anggota ?></td>
										<td><?= $t->judul_buku ?></td>
										<td><?= $t->tgl_pinjam ?></td>
										<td><?= $t->tgl_deadline ?></td>
										<td><?= $t->tgl_kembali ?></td>
										<td>
											<?php
											if ($t->status === 'sudah'){
											$d = date_create($t->tgl_deadline);
											$k = date_create($t->tgl_kembali);
											$late = date_diff($d, $k);
											$day = $late->format("%a");
											if ($t->tgl_kembali > $t->tgl_deadline){
												$denda = $day * 200;
											}else{
												$denda = 0;
											}
											}else{
											$denda = 0;
											}
											?>
											<?= $denda ?>
										</td>
										<td>
											<?php
											if ($t->status === 'belum'){
												echo '<span class="badge bg-label-warning me-1">BORROWED</span>';
											}else{
											echo '<span class="badge bg-label-success me-1">RETURNED</span>';
											}
											?>

											</td>
										<td>
											<?php
											if ($t->status === 'belum'){
												echo '<a href="#" data-id="'.$t->kode_transaksi.'" class="btn btn-warning btn-sm btn-delete-buku">
												<i class="bx bx-recycle"></i> Return
											</a>';
											}else{
												echo '<a href="#" data-id="'.$t->kode_transaksi.'" class="btn btn-success btn-sm disabled btn-delete-buku">
												<i class="bx bx-recycle"></i> Return
											</a>';
											}
											?>

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
									<h5 class="modal-title">Apakah Buku Ini Benar-Benar Sudah Dikembalikan?</h5>
								</div>
								<div class="modal-body">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-info" data-dismiss="modal">Belum</button>
									<button type="button" class="btn btn-danger" id="btn-delete">Sudah</button>
								</div>
							</div>
						</div>
					</div>
					<form id="form-delete" method="post" action="<?= site_url('TransaksiController/kembali') ?>">
						<input require type="hidden" value="<?= $t->kode_transaksi  ?>" class="form-control" name="kode_transaksi" />
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
				.attr("name", "kode_transaksi")
				.val(idBuku);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>

