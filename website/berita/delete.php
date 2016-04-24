<?php
$delete_berita = mysql_query("delete from isi_berita where
	id_berita='$_GET[id]'");

if($delete_berita) {
	?>
	<script>
		alert("Berita berhasil dihapus");
		document.location="index.php?folder=berita&file=list";
	</script>
	<?php
} else {
	?>
	<script>
		alert("Berita gagal dihapus");
		document.location="index.php?folder=berita&file=list";
	</script>
	<?php
}
?>