<div class="menu">
	<h1>Halaman Login</h1>
</div><br>
<form name="form_login" method="post">
	<table align="center">
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="username"
				placeholder="username anda">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="password"
				placeholder="password anda">
			</tr>
		</tr>
		<tr align="center">
			<td colspan="2">
				<input type="submit" name="submit" value="Login">
			</td>
		</tr>
	</table>
</form>

<?php
extract($_POST);
if(isset($submit)) {
	$password_md5 = md5($password);

	$cek_user_pass = mysql_fetch_assoc(mysql_query("
		select username, nama_admin from admin where username='$username'
		AND password='$password_md5'"));

	if(!empty($cek_user_pass['username'])) {
		$_SESSION['username'] = $cek_user_pass['username'];
		$_SESSION['nama_admin'] = $cek_user_pass['nama_admin'];
		header("location: index.php");
		exit;
	} else {
		?>
		<script>
			alert("Username atau Password Salah!");
		</script>
		<?php
	}
}
?>