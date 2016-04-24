<?php
$delete_kategori = mysql_query("delete from kategori_berita
	where id_kategori='$_GET[id]'");

if($delete_kategori) {
	?>
	<script>
		alert("Kategori berhasil dihapus");
		document.location="index.php?folder=kategori&file=list";
	</script>
	<?php
} else {
	?>
	<script>
		alert("Kategori gagal dihapus");
		document.location="index.php?folder=kategori&file=list";
	</script>
	<?php
}
?>