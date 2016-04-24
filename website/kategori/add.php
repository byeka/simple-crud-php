<h3>Tambah Kategori</h3>
<hr>
<form name="form_add_kategori" method="post">
	<table align="center" cellpadding="5">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama_kategori"></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td>
				<textarea rows="9" cols="50" name="keterangan_kategori"></textarea>
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
	$simpan_kategori = mysql_query("insert into kategori_berita
		values('NULL', '$nama_kategori', '$keterangan_kategori')");
	
	if($simpan_kategori) {
		?>
		<script>
			alert("Kategori berhasil disimpan");
			document.location="index.php?folder=kategori&file=list";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Kategori gagal disimpan");
		</script>
		<?php
	}
}
?>