
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<img src="<?php base_url();?>assets/img/sip.png" width="55" height="55" class="d-inline-block align-top" alt="">
		<span class="app-brand-text text-center menu-text fw-bolder ms-xl-auto">Sistem Informasi<br>Perpustakaan</span>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>
	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item">
			<a href="<?= site_url('Dashboard') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-dashboard"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
		</li>
		<li class="menu-item">
			<a href="<?= site_url('AnggotaController') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-user-detail"></i>
				<div data-i18n="Layouts">Data Anggota</div>
			</a>
		</li>
		<li class="menu-item">
			<a href="<?= site_url('BukuController/fiksi') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-book-reader"></i>
				<div data-i18n="Layouts">Data Buku Fiksi</div>
			</a>
		</li>
		<li class="menu-item">
			<a href="<?= site_url('BukuController/buku') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-book-bookmark"></i>
				<div data-i18n="Layouts">Data Buku Paket</div>
			</a>
		</li>
		<!-- Forms & Tables -->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi Peminjaman</span></li>

		<!-- Tables -->
		<li class="menu-item">
			<a href="<?= site_url('TransaksiController') ?>" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-bookmark-alt-plus"></i>
				<div data-i18n="Tables">Data Transaksi</div>
			</a>
		</li>
		<li class="menu-item">
			<a href="#" class="menu-link">
				<i class="menu-icon tf-icons bx bx-table"></i>
				<div data-i18n="Tables">Berdasarkan Anggota</div>
			</a>
		</li>
	</ul>
</aside>
