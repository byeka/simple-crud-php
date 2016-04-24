<h3>Tambah Admin</h3>
<hr>
<form name="form_tambah_admin" method="post">
	<table align="center" cellpadding="5">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" maxlength="10"></td>
		</tr>
		<tr>
			<td>Nama Admin</td>
			<td>:</td>
			<td><input type="text" name="nama_admin" maxlength="30"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
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
	$password_md5 = md5($password);

	$simpan_admin = mysql_query("insert into admin values('$username',
		'$nama_admin', '$password_md5')");

	if($simpan_admin) {
		?>
		<script>
			alert("Admin berhasil disimpan");
			document.location="index.php?folder=admin&file=list";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Admin gagal disimpan");
		</script>
		<?php
	}
}
?>