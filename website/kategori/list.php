<h3>Kategori</h3>
<hr>
<a href="index.php?folder=kategori&file=add">Tambah Kategori</a>
<br><br>
<table width="100%" align="center" border="1" cellpadding="5">
	<tr align="center">
		<td><b>No</b></td>
		<td><b>Nama Kategori</b></td>
		<td><b>Keterangan</b></td>
		<td colspan="2"><b>Aksi</b></td>
	</tr>
	<?php
	$nomor = 1;
	$kategori = mysql_query("select * from kategori_berita
		order by nama_kategori ASC");
	while($data=mysql_fetch_assoc($kategori)) {
		?>
		<tr>
			<td align="center"><?php echo $nomor; ?></td>
			<td><?php echo $data['nama_kategori']; ?></td>
			<td><?php echo $data['keterangan_kategori']; ?></td>
			<td align="center">
				<a href="index.php?folder=kategori&file=edit&id=
					<?php echo $data['id_kategori']; ?>">Edit</a>
			</td>
			<td align="center">
				<a href="index.php?folder=kategori&file=delete&id=
					<?php echo $data['id_kategori']; ?>">Delete</a>
			</td>
		</tr>
		<?php
		$nomor++;
	}
	?>
</table>