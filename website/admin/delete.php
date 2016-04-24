<?php
$admin = mysql_fetch_assoc(mysql_query("select * from admin
	where username='$_GET[username]'"));

if($_SESSION['username'] == $admin['username']) {
	?>
	<h3>Delete Admin</h3>
	<hr>
	<form name="form_delete_admin" method="post">
		<table align="center" cellpadding="5">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td>
					<input type="text" name="username"
						value="<?php echo $admin['username']; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td>Nama Admin</td>
				<td>:</td>
				<td>
					<input type="text" name="nama_admin"
						value="<?php echo $admin['nama_admin']; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr align="center">
				<td colspan="3">
					<input type="submit" name="delete" value="Delete">
				</td>
			</tr>
		</table>
	</form>
	<?php
	extract($_POST);
	if(isset($delete)) {
		$password_md5 = md5($password);

		if($password_md5 == $admin['password']) {
			$delete_admin = mysql_query("delete from admin where
				username='$username'");

			if($delete_admin) {
				?>
				<script>
					alert("Admin berhasil dihapus");
					document.location="index.php?folder=admin&file=list";
				</script>
				<?php
			} else {
				?>
				<script>
					alert("Admin gagal dihapus");
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
		alert("Tidak dapat menghapus Admin lain");
		document.location="index.php?folder=admin&file=list";
	</script>
	<?php
}
?>