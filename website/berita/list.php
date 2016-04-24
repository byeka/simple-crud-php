<h3>Berita</h3>
<hr>
<a href="index.php?folder=berita&file=add">Tambah Berita</a>
<br><br>
<table width="100%" align="center" border="1" cellpadding="5">
	<tr align="center">
		<td><b>No</b></td>
		<td><b>Judul Berita</b></td>
		<td><b>Kategori</b></td>
		<td><b>Tanggal</b></td>
		<td colspan="2"><b>Aksi</b></td>
	</tr>
	<?php
	$nomor = 1;
	$berita = mysql_query("select * from isi_berita,
		kategori_berita where isi_berita.id_kategori=
		kategori_berita.id_kategori order by
		isi_berita.tanggal_berita DESC, isi_berita.judul_berita ASC");

	while($data=mysql_fetch_assoc($berita)) {
		?>
		<tr>
			<td align="center">
				<?php echo $nomor; ?>
			</td>
			<td><?php echo $data['judul_berita']; ?></td>
			<td><?php echo $data['nama_kategori']; ?></td>
			<td align="center">
				<?php echo $data['tanggal_berita']; ?>
			</td>
			<td align="center">
				<a href="index.php?folder=berita&file=edit&id=
					<?php echo $data['id_berita'] ?>">Edit</a>
			</td>
			<td align="center">
				<a href="index.php?folder=berita&file=delete&id=
					<?php echo $data['id_berita'] ?>">Delete</a>
			</td>
		</tr>
		<?php
		$nomor++;
	}
	?>
</table>