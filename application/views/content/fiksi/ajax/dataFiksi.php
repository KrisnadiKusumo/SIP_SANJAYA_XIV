<?php
$no = 1;
foreach ($fiksis as $f) {
	?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $f->kode_buku  ?></td>
		<td><?= $f->judul_buku ?></td>
		<td><?= $f->jumlah_buku ?></td>
		<td>
			<a href="<?= site_url("BukuController/detailFiksi/$f->kode_buku") ?>" class="btn btn-info btn-sm">
				<i class='bx bxs-detail'></i>
			</a>
			<a href="<?= site_url("BukuController/ubahFiksi/$f->kode_buku") ?>" class="btn btn-warning btn-sm">
				<i class="bx bxs-edit"></i>
			</a>
			<a href="#" data-id="<?= $f->kode_buku ?>" class="btn btn-danger btn-sm btn-delete-buku">
				<i class="bx bxs-trash"></i>
			</a>
		</td>
	</tr>
	<?php
}
?>
