<?php
	include "config.php";
	if (isset($_GET['mp_poly_id'])) {
		$mp_poly_id = $_GET['mp_poly_id'];
	$query   = "SELECT * FROM mr_ms_poly WHERE mp_poly_id='$mp_poly_id'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada data yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data by marcus dedy
		if (!empty($mp_poly_id) && $mp_poly_id != "") {
			$hapus = "DELETE FROM mr_ms_poly WHERE mp_poly_id='$mp_poly_id'";
			$sql = mysql_query ($hapus);
			if ($sql) {
				
				?>
					<script language="JavaScript">
					alert('Dokter <?=$mp_doctor_name?> Berhasil dihapus!');
					document.location='home-user.php?page=form-ms-dokter&mu_username=<?=$_SESSION['mu_username']?>';
					</script>
				<?php
						
			} else {
				echo "<h2><font color=red><center>Data gagal dihapus!</center></font></h2>";	
			}
		}
?>