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
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Ubah Fiksi</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5 class="mb-0">Data Fiksi</h5>
								</div>
								<div class="card-body">
									<form id="form-update-fiksi" method="post" action="<?= site_url('FiksiController/update') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kode Fiksi</label>
											<input require type="" readonly value="<?= $fiksi->kode_fiksi?>" class="form-control" name="kode_fiksi"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Judul Fiksi</label>
											<input require type="text" value="<?= $fiksi->judul_fiksi?>" class="form-control" name="judul_fiksi" placeholder="Masukkan Judul Fiksi" />
										</div>
										<div class="mb-3">
											<label class="form-label">Pengarang Fiksi</label>
											<input require type="text" value="<?= $fiksi->pengarang_fiksi?>" class="form-control" name="pengarang_fiksi" placeholder="Masukkan Pengarang Fiksi" />
										</div>
										<div class="mb-3">
											<label class="form-label">Klasifikasi Fiksi</label>
											<input require type="text" value="<?= $fiksi->klasifikasi_fiksi?>" class="form-control" name="penerbit_fiksi" placeholder="Masukkan Penerbit Fiksi" />
										</div>
										<div class="mb-3">
											<label class="form-label">Sumber Asal Fiksi</label>
											<select class="form-control" name="sumber_asal_Fiksi" >
												<option value="Beli">Beli</option>
												<option value="Hadiah">Hadiah</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Bahasa Fiksi</label>
											<select class="form-control" name="bahasa_fiksi" >
												<option value="Indonesia">Indonesia</option>
												<option value="Asing">Asing</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Macam Fiksi</label>
											<select class="form-control" name="macam_fiksi" >
												<option value="Teks">Teks</option>
												<option value="Fakta">Fakta</option>
												<option value="Fiksi">Fiksi</option>
												<option value="Info">Info</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Keterangan Fiksi</label>
											<input require type="teks" value="<?= $fiksi->keterangan_fiksi?>" class="form-control" name="keterangan_fiksi" placeholder="Masukkan Keterangan Fiksi" />
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah Fiksi</label>
											<input require type="text" value="<?= $fiksi->jumlah_fiksi?>" class="form-control" name="jumlah_fiksi" placeholder="Masukkan Jumlah Fiksi" />
										</div>

									</form>
								</div>
								<div class="card-footer">
									<button type="button" id="btn-update-fiksi" class="btn btn-success btn-sm">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('FiksiController') ?>" class="btn btn-primary btn-sm">
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
		$("#btn-update-fiksi").on("click", function() {
			let validate = $("#form-update-fiksi").valid()
			if (validate) {
				$("#form-update-fiksi").submit()
			}
		})
		$("#form-update-fiksi").validates({
			rules: {
				kode_fiksi: {
					digits: true
				},
				jumlah_fiksi: {
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
