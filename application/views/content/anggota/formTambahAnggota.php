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
					<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Tambah Anggota</h4>
					<div class="row">
						<div class="col-xl">
							<div class="card mb-4">
								<div class="card-body">
									<form id="form-tambah-anggota" method="post" action="<?= site_url('AnggotaController/insert') ?>" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">No Identitas</label>
											<input require type="text" class="form-control" name="id_anggota" placeholder="Masukkan Nomor Identitas" />
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Anggota</label>
											<input require type="text" class="form-control" name="nama_anggota" placeholder="Masukkan Nama Anggota" />
										</div>
										<div class="mb-3">
											<label class="form-label">Alamat Anggota</label>
											<input require type="text" class="form-control" name="alamat_anggota" placeholder="Masukkan Alamat Anggota Ex: Dukuh, Desa, Kecamatan, Kabupaten." />
										</div>
										<div class="mb-3">
											<label class="form-label">No Telepon Anggota</label>
											<input require type="text" class="form-control" name="no_telp_anggota" placeholder="Masukkan No Telepon Anggota" />
										</div>
										<div class="mb-3">
											<label class="form-label">Foto Anggota</label>
											<input type="file" class="form-control" name="foto_anggota" placeholder="Masukkan File Anggota"  />
										</div>
									</form>
									<button type="button" id="btn-save-anggota" class="btn btn-success btn-sm">
										<i class="bx bx-save"></i> Simpan
									</button>
									<a href="<?= site_url('AnggotaController') ?>" class="btn btn-primary btn-sm">
										<i class="bx bx-undo"></i> Kembali
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('layout/footer'); ?>
		</div>
	</div>
</div>
<script>
	$(function (){
		$("#btn-save-anggota").on("click", function() {
			let validate = $("#form-tambah-anggota").valid()
			if (validate) {
				$("#form-tambah-anggota").submit()
			}
		})
		$("#form-tambah-anggota").validates({
			rules: {
				id_anggota: {
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
