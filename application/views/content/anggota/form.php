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
        <!-- Menu -->
		  <?php $this->load->view('layout/menu'); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Tambah Anggota</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Anggota</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="<?php base_url();?>/assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload Photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
							  <label class="form-label">No Identitas</label>
							  <input require type="text" class="form-control" name="id_anggota" placeholder="Masukkan Nomor Identitas" autofocus />
						  </div>
                          <div class="mb-3 col-md-6">
							  <label class="form-label">Nama Anggota</label>
							  <input require type="text" class="form-control" name="nama_anggota" placeholder="Masukkan Nama Anggota" />
						  </div>
                          <div class="mb-3 col-md-6">
							  <label class="form-label">Alamat Anggota</label>
							  <input require type="text" class="form-control" name="alamat_anggota" placeholder="Masukkan Alamat Anggota Ex: Dukuh, Desa, Kecamatan, Kabupaten." />
						  </div>
                          <div class="mb-3 col-md-6">
							  <label class="form-label">No Telepon Anggota</label>
							  <div class="input-group input-group-merge">
								  <span class="input-group-text">ID (+62)</span>
							  <input require type="text" class="form-control" name="no_telp_anggota" placeholder="Masukkan No Telepon Anggota" />
							  </div>
						  </div>
                          <div class="mb-3 col-md-6">
							  <label class="form-label">Foto Anggota</label>
							  <input type="file" class="form-control" name="foto_anggota" placeholder="Masukkan File Anggota" size="20" />
						  </div>
                        <div class="mt-2">
							<button type="button" id="btn-save-anggota" class="btn btn-success ">
								<i class="bx bx-save"></i> Simpan
							</button>
							<a href="<?= site_url('AnggotaController') ?>" class="btn btn-outline-primary">
								<i class="bx bx-undo"></i> Kembali
							</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
			  <?php $this->load->view('layout/footer'); ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
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
