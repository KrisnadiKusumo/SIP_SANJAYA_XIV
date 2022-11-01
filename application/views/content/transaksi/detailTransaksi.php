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
							<h2>Data Buku Dipinjam</h2>
							<a href="<?= site_url('TransaksiController') ?>" class="btn btn-primary btn-sm">
								<i class='bx bx-undo'></i>  Kembali
							</a>
						</div>
						<div class="table-responsive text-nowrap">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode Buku</th>
									<th>Nama Buku</th>
									<th>Tgl Pinjam</th>
									<th>Deadline</th>
									<th>Tgl Kembali</th>
									<th>Denda</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="table-border-bottom-0">
								<?php
								$no = 1;
								foreach ($details as $d) {


									?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $d->kode_buku  ?></td>
										<td><?= $d->judul_buku ?></td>
										<td><?= $d->tgl_pinjam ?></td>
										<td><?= $d->tgl_deadline ?></td>
										<td><?= $d->tgl_kembali ?></td>
										<td>
											<?php
											if ($d->status === '0'){
												$td = date_create($t->tgl_deadline);
												$k = date_create($t->tgl_kembali);
												$late = date_diff($td, $k);
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
											if ($d->status === '1'){
												echo '<span class="badge bg-label-warning me-1">BORROWED</span>';
											}else{
												echo '<span class="badge bg-label-success me-1">RETURNED</span>';
											}
											?>
										</td>
										<td>
											<a href="<?= site_url("TransaksiController/ubahDetail/$d->kode_detail") ?>" class="btn btn-warning btn-sm">
												<i class='bx bx-edit'></i>
											</a>
											<a href="#" data-id="<?= $d->kode_detail ?>" class="btn btn-success btn-sm btn-delete-detail">
												<i class="bx bx-recycle"></i>
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
					<form id="form-delete" method="post" action="<?= site_url('TransaksiController/kembalikan/'.$d->kode_transaksi) ?>">
						<input require type="hidden" value="<?= $d->kode_detail  ?>" class="form-control" name="kode_detail" />
					</form>
				</div>
				<?php $this->load->view('layout/footer'); ?>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(function() {
		let idBuku = 0
		$(".btn-delete-detail").on("click", function() {
			idBuku = $(this).data("id");
			console.log(idBuku);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "kode_detail")
				.val(idBuku);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>

