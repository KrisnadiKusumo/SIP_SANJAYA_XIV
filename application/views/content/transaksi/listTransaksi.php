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
									<th>Kode Transaksi</th>
									<th>Peminjam</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="table-border-bottom-0">
								<?php
								$no = 1;
								if($transaksis) {
									foreach ($transaksis as $t) {
										$this->db->where('kode_transaksi',$t->kode_transaksi);
										$this->db->where('status','1');
										$borrowed  = $this->db->get('detail')->result_array();
										$this->db->where('kode_transaksi',$t->kode_transaksi);
										$this->db->where('status !=','1');
										$returned  = $this->db->get('detail')->result_array();
										?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $t->kode_transaksi ?></td>
											<td><?= $t->nama_anggota ?></td>
											<td>
												<span class="badge bg-label-warning me-1"><?= count($borrowed) ?> BORROWED</span>
												<span class="badge bg-label-success me-1"><?= count($returned) ?> RETURNED</span>
											</td>
											<td>
												<a href="<?= site_url("TransaksiController/detail/$t->kode_transaksi") ?>"
												   class="btn btn-success btn-sm">
													<i class='bx bxs-file-find'></i> Lihat Detail
												</a>
											</td>
										</tr>
										<?php
									}
								}
								?>
								</tbody>
							</table>
						</div>
					</div>

					<?php if($transaksis):?>
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
					<?php endif;?>
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

