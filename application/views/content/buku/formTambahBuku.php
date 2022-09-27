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
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Tambah Buku Paket</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-body">
									<form id="form-tambah-buku" method="post" action="<?= site_url('BukuController/insertBuku') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Kategori Buku</label>
											<select class="form-control" name="jenis_buku" >
												<option selected>Pilih Jenis Buku</option>
												<option value="bindo">Bahasa Indonesia</option>
												<option value="bing">Bahasa Inggris</option>
												<option value="jawa">Bahasa Jawa</option>
												<option value="bio">Biologi</option>
												<option value="ekak">Ekonomi Akuntansi</option>
												<option value="fis">Fisika</option>
												<option value="geo">Geografi</option>
												<option value="mtk">Matematika</option>
												<option value="agama">Pendidikan Agama</option>
												<option value="pjok">Pendidikan Jasmani, Olahraga, dan Kesehatan</option>
												<option value="ppkn">Pendidikan Kewarganegaraan</option>
												<option value="pkwu">Prakarya dan Kewirausahaan</option>
												<option value="sej">Sejarah</option>
												<option value="senbud">Seni Budaya</option>
												<option value="sos">Sosiologi</option>
												<option value="tik">Teknologi Informasi dan Komunikasi</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input require type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Judul Buku</label>
											<input require type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Pengarang Buku</label>
											<input require type="text" class="form-control" name="pengarang_buku" placeholder="Masukkan Pengarang Buku" />
										</div>
										<div class="mb-3">
											<label class="form-label">Penerbit Buku</label>
											<input require type="text" class="form-control" name="penerbit_buku" placeholder="Masukkan Penerbit Buku" />
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
											<input require type="text" class="form-control" name="klasifikasi_buku" placeholder="Masukkan Klasifikasi Buku" />
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
											<input require type="number" class="form-control" name="harga_buku" placeholder="Masukkan Harga Buku" />
										</div>
                                        <div class="mb-3">
											<label class="form-label">Jumlah Buku</label>
											<input require type="number" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku" />
										</div>
									</form>
									<button type="button" id="btn-save-buku" class="btn btn-success btn-sm">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('BukuController/buku') ?>" class="btn btn-primary btn-sm">
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
				jumlah_buku: {
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
