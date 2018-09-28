<?php
	include "config.php";
	if (isset($_GET['mu_user_id'])) {
		$mu_user_id = $_GET['mu_user_id'];
	$query   = "SELECT * FROM mr_ms_user WHERE mu_user_id='$mu_user_id'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada data yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data by marcus dedy
		if (!empty($mu_user_id) && $mu_user_id != "") {
			$hapus = "DELETE FROM mr_ms_user WHERE mu_user_id='$mu_user_id'";
			$sql = mysql_query ($hapus);
			if ($sql) {
				
				?>
					<script language="JavaScript">
					alert('User <?=$mu_name?> Berhasil dihapus!');
					document.location='home-user.php?page=form-ms-user&mu_username=<?=$_SESSION['mu_username']?>';
					</script>
				<?php
						
			} else {
				echo "<h2><font color=red><center>Data gagal dihapus!</center></font></h2>";	
			}
		}
?>