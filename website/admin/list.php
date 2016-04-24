<h3>Admin</h3>
<hr>
<a href="index.php?folder=admin&file=add">Tambah Admin</a>
<br><br>
<table width="100%" border="1" cellpadding="5">
	<tr align="center">
		<td><b>No</b></td>
		<td><b>Nama Admin</b></td>
		<td><b>Username</b></td>
		<td colspan="2"><b>Aksi</b></td>
	</tr>
	<tr>
	<?php
	$nomor = 1;
	$admin = mysql_query("select * from admin order by nama_admin ASC");
	while($data=mysql_fetch_assoc($admin)) {
		?>
		<tr>
			<td align="center"><?php echo $nomor; ?></td>
			<td><?php echo $data['nama_admin']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td align="center">
				<a href="index.php?folder=admin&file=edit
					&username=<?php echo $data['username']; ?>">Edit</a>
			</td>
			<td align="center">
				<a href="index.php?folder=admin&file=delete
					&username=<?php echo $data['username']; ?>">Delete</a>
			</td>
		</tr>
		<?php
		$nomor++;	
	}
	?>
</table>