<nav
	class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
	id="layout-navbar"
>
	<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
		<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
			<i class="bx bx-menu bx-sm"></i>
		</a>
	</div>

	<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
		<!-- Search -->
		<div class="navbar-nav align-items-center">
			<div class="nav-item d-flex align-items-center">
				<i class="bx bx-search fs-4 lh-0"></i>
				<input
					type="text"
					class="form-control border-0 shadow-none"
					placeholder="Cari..."
					aria-label="Cari..."
				/>
			</div>
		</div>
		<!-- /Search -->

		<ul class="navbar-nav flex-row align-items-center ms-auto">
			<!-- User -->
			<li class="nav-item navbar-dropdown dropdown-user dropdown">
				<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
					<div class="avatar avatar-online">
						<img src="data:image/jpeg;base64,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" alt class="w-px-40 h-auto rounded-circle" />
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<a class="dropdown-item" href="#">
							<div class="d-flex">
								<div class="flex-shrink-0 me-3">
									<div class="avatar avatar-online">
										<img src="../../../../../../../Users/Asus%20VivoBook/Downloads/sneat-1.0.0/sneat-1.0.0/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
									</div>
								</div>
								<div class="flex-grow-1">
									<span class="fw-semibold d-block">SIPINTAR</span>
									<small class="text-muted">Admin</small>
								</div>
							</div>
						</a>
					</li>
					<div class="dropdown-divider"></div>
					</li>
					<li>
						<a class="dropdown-item" href="../../../../../../../Users/Asus%20VivoBook/Downloads/sneat-1.0.0/sneat-1.0.0/html/auth-login-basic.html">
							<i class="bx bx-power-off me-2"></i>
							<span class="align-middle">Log Out</span>
						</a>
					</li>
				</ul>
			</li>
			<!--/ User -->
		</ul>
	</div>
</nav>
