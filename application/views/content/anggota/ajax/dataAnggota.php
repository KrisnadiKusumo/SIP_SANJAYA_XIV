<?php
$no = 1;
foreach ($anggotas as $a) {
	?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $a->id_anggota  ?></td>
		<td><?= $a->nama_anggota ?></td>
		<td><?= $a->no_telp_anggota ?></td>
		<td>
			<a href="<?= site_url("AnggotaController/detail/$a->id_anggota") ?>" class="btn btn-info btn-sm">
				<i class='bx bxs-detail'></i>
			</a>
			<a href="<?= site_url("AnggotaController/ubah/$a->id_anggota") ?>" class="btn btn-warning btn-sm">
				<i class="bx bxs-edit"></i>
			</a>
			<a href="#modal-confirm-delete" data-id="<?= $a->id_anggota ?>" class="btn btn-danger btn-sm btn-delete-anggota">
				<i class="bx bxs-trash"></i>
			</a>
		</td>
	</tr>
	<?php
}
?>
