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
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Tambah Fiksi</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-body">
									<form id="form-tambah-fiksi" method="post" action="<?= site_url('FiksiController/insert') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kode Fiksi</label>
											<input require type="text" class="form-control" name="kode_fiksi" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Judul Fiksi</label>
											<input require type="text" class="form-control" name="judul_fiksi" placeholder="Masukkan Judul Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Pengarang Fiksi</label>
											<input require type="text" class="form-control" name="pengarang_fiksi" placeholder="Masukkan Pengarang Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Klasifikasi Fiksi</label>
											<input require type="text" class="form-control" name="klasifikasi_fiksi" placeholder="Masukkan Penerbit Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Sumber Asal Buku</label>
											<select class="form-control" name="sumber_asal_buku" >
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
											<input require type="date" class="form-control" name="keterangan_fiksi" placeholder="Masukkan Tahun Terbit Buku" />
										</div>

                                        <div class="mb-3">
											<label class="form-label">Jumlah Fiksi</label>
											<input require type="text" class="form-control" name="jumlah_fiksi" placeholder="Masukkan Jumlah Buku" />
										</div>
									</form>
									<button type="button" id="btn-save-fiksi" class="btn btn-success btn-sm">
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
		$("#btn-save-fiksi").on("click", function() {
			let validate = $("#form-tambah-fiksi").valid()
			if (validate) {
				$("#form-tambah-fiksi").submit()
			}
		})
		$("#form-tambah-fiksi").validates({
			rules: {
				kode_fiksi: {
					digits: true
				},
				jumlah_fiksi: {
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
