<h3>Tambah Berita</h3>
<hr>
<form name="form_add_berita" method="post">
	<table align="center" cellpadding="5">
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td><input type="text" name="judul_berita"></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td>
				<select name="id_kategori">
					<?php
					$kategori = mysql_query("select * from 
						kategori_berita order by nama_kategori
						ASC");
					while($data=mysql_fetch_assoc($kategori)) {
						?>
						<option value="<?php echo $data['id_kategori'] ?>">
							<?php echo $data['nama_kategori'] ?>
						</option>
						<?php
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
					value="<?php echo date("Y-m-d"); ?>">
			</td>
		</tr>
		<tr>
			<td>Isi</td>
			<td>:</td>
			<td>
				<textarea rows="9" cols="50" name="isi_berita"></textarea>
			</td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>

<?php
extract($_POST);
if(isset($simpan)) {
	$simpan_berita = mysql_query("insert into isi_berita
		values('NULL','$id_kategori','$judul_berita','$isi_berita',
			'$tanggal_berita')");
	if($simpan_berita) {
		?>
		<script>
			alert("Berita berhasil disimpan");
			document.location="index.php?folder=berita&file=list";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Berita gagal disimpan");
		</script>
		<?php
	}
}
?>