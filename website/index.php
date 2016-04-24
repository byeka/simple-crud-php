<?php
session_start();
require_once "config/koneksi.php";
?>
<html>
<head>
	<title>Menu dan Proses CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/tampilan.css">
</head>
<body>
	<?php
	if(!isset($_SESSION['username'])) {
		require_once "admin/login.php";
	} else {
		require_once "material/menu.php";
		?>
		<div class="konten">
		<?php
		if(empty($_GET['folder']) || empty($_GET['file'])) {
			require_once "material/home.php";
		} else {
			$data_file = $_GET['folder']."/".$_GET['file'].".php";
			if(file_exists($data_file)) {
				require_once $data_file;
			} else {
				require_once "material/home.php";
			}
		}
		?>
		</div>
		<?php
	}
	?>
	<div class="footer">Copyright &copy; Eka Putra</div>
</body>
</html>