<?php
	$edit_kategori = mysql_fetch_assoc(mysql_query("select * from
		kategori_berita where id_kategori='$_GET[id]'"));
?>

<h3>Edit Kategori</h3>
<hr>
<form name="form_edit_kategori" method="post">
	<table align="center" cellpadding="5">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_kategori"
					value="<?php echo $edit_kategori['nama_kategori']; ?>">
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td>
				<textarea rows="9" cols="50"
					name="keterangan_kategori"><?php echo $edit_kategori['keterangan_kategori']; ?></textarea>
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
	$simpan_kategori = mysql_query("update kategori_berita set
		nama_kategori='$nama_kategori',
		keterangan_kategori='$keterangan_kategori'
		where id_kategori='$_GET[id]'");

	if($simpan_kategori) {
		?>
		<script>
			alert("Kategori berhasil diedit");
			document.location="index.php?folder=kategori&file=list";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Kategori gagal diedit");
		</script>
		<?php
	}
}
?>