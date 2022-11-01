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
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<?php $this->load->view('layout/menu'); ?>
		<div class="layout-page">
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Ubah Buku Fiksi</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5 class="mb-0">Data Buku Fiksi</h5>
								</div>
								<div class="card-body">
									<form id="form-update-buku" method="post" action="<?= site_url('BukuController/updateFiksi') ?>" enctype="multipart/form-data">
										<input require type="hidden" value="fiksi" class="form-control" name="jenis_buku"/>
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input require type="text" readonly value="<?= $buku->kode_buku?>"  class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku" />
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
											<?php
											echo '<label class="form-label">Tahun Terbit</label><br><select class="form-control" name="thn_terbit_buku">';
											echo '<option selected>Pilih Tahun Terbit</option>';
											for($year=date('Y'); $year>=2000; $year--){
												echo '<option value="'.$year.'">'.$year.'</option>';
											}
											echo '</select>';
											?>
										</div>
										<div class="mb-3">
											<label class="form-label">Bahasa Buku</label>
											<select class="form-control" name="bahasa_buku" >
												<option selected>Pilih Bahasa Buku</option>
												<option value="asing" >Asing</option>
												<option value="indonesia">Indonesia</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Klasifikasi Buku</label>
											<input require type="text" value="<?= $buku->klasifikasi_buku?>" class="form-control" name="klasifikasi_buku" placeholder="Masukkan Klasifikasi Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Sumber Asal Buku</label>
											<select class="form-control" name="sumber_asal_buku" >
												<option selected>Pilih Asal Buku</option>
												<option value="beli" > Beli</option>
												<option value="bantuan">Bantuan</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Harga Buku</label>
											<input require type="number" value="<?= $buku->harga_buku?>" class="form-control" name="harga_buku" placeholder="Masukkan Harga Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah Buku</label>
											<input require type="number" value="<?= $buku->jumlah_buku?>" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" />
									</form>
								</div>
								<div class="card-footer">
									<button type="button" id="btn-update-buku" class="btn btn-success btn-sm">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('BukuController/fiksi') ?>" class="btn btn-primary btn-sm">
										<i class="bx bx-undo"></i> Kembali
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('layout/footer'); ?>
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
