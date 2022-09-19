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
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Ubah Buku</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5 class="mb-0">Data Buku</h5>
								</div>
								<div class="card-body">
									<form id="form-update-buku" method="post" action="<?= site_url('BukuController/update') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input require type="" readonly value="<?= $buku->kode_buku?>" class="form-control" name="kode_buku"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Judul Buku</label>
											<input require type="text" value="<?= $buku->judul_buku?>" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Pengarang Buku</label>
											<input require type="text" value="<?= $buku->pengarang_buku?>" class="form-control" name="pengarang_buku" placeholder="Masukkan Pengarang Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Penerbit Buku</label>
											<input require type="text" value="<?= $buku->penerbit_buku?>" class="form-control" name="penerbit_buku" placeholder="Masukkan Penerbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Tahun Terbit Buku</label>
											<input require type="date" value="<?= $buku->thn_terbit_buku?>" class="form-control" name="thn_terbit_buku" placeholder="Masukkan Tahun Terbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Sumber Asal Buku</label>
											<select  class="form-control" name="sumber_asal_buku" >
												<option value="Beli">Beli</option>
												<option value="Bantuan">Bantuan</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah Buku</label>
											<input require type="text" value="<?= $buku->jumlah_buku?>" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" />
										</div>

									</form>
								</div>
								<div class="card-footer">
									<button type="button" id="btn-update-buku" class="btn btn-success btn-sm">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('BukuController') ?>" class="btn btn-primary btn-sm">
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
		$("#btn-update-buku").on("click", function() {
			let validate = $("#form-update-buku").valid()
			if (validate) {
				$("#form-update-buku").submit()
			}
		})
		$("#form-update-buku").validates({
			rules: {
				kode_buku: {
					digits: true
				},
				jumlah_buku: {
					digits: true
				}
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
