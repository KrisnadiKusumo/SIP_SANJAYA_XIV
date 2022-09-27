<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('layout/header'); ?>
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<?php $this->load->view('layout/navbar'); ?>
		<div class="layout-page">
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Tambah Transaksi</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-body">
									<form id="form-tambah-buku" method="post" action="<?= site_url('TransaksiController/insert') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kode Transaksi</label>
											<input require type="text" class="form-control" name="kode_transaksi" placeholder="Masukkan Kode Transaksi" />
										</div>
										<div class="mb-3">
											<label class="form-label">ID Anggota</label>
											<input require type="text" class="form-control" name="id_anggota" placeholder="Masukkan ID Anggota" />
										</div>
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input require type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Tanggal Pinjam</label>
											<input require type="date" class="form-control" name="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam" />
										</div>
											<input require type="hidden" value="belum" class="form-control" name="status" />
									</form>
									<button type="button" id="btn-save-buku" class="btn btn-success btn-sm">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('TransaksiController') ?>" class="btn btn-primary btn-sm">
										<i class="bx bx-undo"></i> Kembali
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function (){
		$("#btn-save-buku").on("click", function() {
			let validate = $("#form-tambah-buku").valid()
			if (validate) {
				$("#form-tambah-buku").submit()
			}
		})
		$("#form-tambah-buku").validates({
			rules: {
				kode_buku: {
					digits: true
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			}
		})
	})
</script>
</body>
</html>
