<?php
$edit_berita = mysql_fetch_assoc(mysql_query("select * from
	isi_berita where id_berita='$_GET[id]'"));
?>

<h3>Edit Berita</h3>
<hr>
<form name="form_edit_berita" method="post">
	<table align="center" cellpadding="5">
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td>
				<input type="text" name="judul_berita"
					value="<?php echo $edit_berita['judul_berita'] ?>">
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td>
				<select name="id_kategori">
					<?php
					$kategori = mysql_query("select * from kategori_berita");
					while($data=mysql_fetch_assoc($kategori)) {
						if($edit_berita['id_kategori']==$data['id_kategori']) {
							?>
							<option value="<?php echo $data['id_kategori'] ?>" selected>
								<?php echo $data['nama_kategori'] ?>
							</option>
							<?php
						} else {
							?>
							<option value="<?php echo $data['id_kategori'] ?>">
								<?php echo $data['nama_kategori'] ?>
							</option>
							<?php
						}
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td>
				<input type="text" name="tanggal_berita"
					value="<?php echo $edit_berita['tanggal_berita'] ?>">
			</td>
		</tr>
		<tr>
			<td>Isi</td>
			<td>:</td>
			<td>
				<textarea rows="9" cols="50"
					name="isi_berita"><?php echo $edit_berita['isi_berita'] ?></textarea>
			</td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<input type="submit" name="edit" value="Edit">
			</td>
		</tr>
	</table>
</form>

<?php
extract($_POST);
if(isset($edit)) {
	$simpan_berita = mysql_query("update isi_berita set
		judul_berita='$judul_berita',
		id_kategori='$id_kategori',
		tanggal_berita='$tanggal_berita',
		isi_berita='$isi_berita'
		where id_berita='$_GET[id]'");

	if($simpan_berita) {
		?>
		<script>
			alert("Berita berhasil diedit");
			document.location="index.php?folder=berita&file=list";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Berita gagal diedit");
		</script>
		<?php
	}
}
?>