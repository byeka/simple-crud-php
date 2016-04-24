<?php
$edit_admin = mysql_fetch_assoc(mysql_query("select * from admin
	where username='$_GET[username]'"));

if($_SESSION['username'] == $edit_admin['username']) {
	?>
	<h3>Edit Admin</h3>
	<hr>
	<form name="form_edit_admin" method="post">
		<table align="center" cellpadding="5">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td>
					<input type="text" name="username"
						value="<?php echo $edit_admin['username']; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td>Nama Admin</td>
				<td>:</td>
				<td>
					<input type="text" name="nama_admin"
						value="<?php echo $edit_admin['nama_admin']; ?>">
				</td>
			</tr>
			<tr>
				<td>Password Baru</td>
				<td>:</td>
				<td><input type="password" name="password_baru"></td>
			</tr>
			<tr>
				<td>Password Lama</td>
				<td>:</td>
				<td><input type="password" name="password_lama"></td>
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
		$password_lama_md5 = md5($password_lama);
		$password_baru_md5 = md5($password_baru);

		if($password_lama_md5 == $edit_admin['password']) {
			$_SESSION['nama_admin'] = $nama_admin;
			$simpan_admin = mysql_query("update admin set
				nama_admin='$nama_admin',
				password='$password_baru_md5'
				where username='$username'");
			if($simpan_admin) {
				?>
				<script>
					alert("Data admin berhasil diedit");
					document.location="index.php?folder=admin&file=list";
				</script>
				<?php
			} else {
				?>
				<script>
					alert("Data admin gagal diedit");
				</script>
				<?php
			}
		} else {
			?>
			<script>
				alert("Password salah");
			</script>
			<?php
		}
	} 
} else {
	?>
	<script>
		alert("Tidak dapat mengedit data Admin lain");
		document.location="index.php?folder=admin&file=list";
	</script>
	<?php
}
?>