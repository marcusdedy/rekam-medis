<?php
	include "config.php";
	if (isset($_GET['pr_patien_id'])) {
		$pr_patien_id = $_GET['pr_patien_id'];
	$query   = "SELECT * FROM mr_patient_registration WHERE pr_patien_id='$pr_patien_id'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada data yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
		if (!empty($pr_patien_id) && $pr_patien_id != "") {
			$hapus = "DELETE FROM mr_patient_registration WHERE pr_patien_id='$pr_patien_id'";
			$sql = mysql_query ($hapus);
			if ($sql) {
				
				?>
					<script language="JavaScript">
					alert('Pasien <?=$pr_patien_name?> Berhasil dihapus!');
					document.location='home-user.php?page=form-view-pendaftaran&mu_username=<?=$_SESSION['mu_username']?>';
					</script>
				<?php
						
			} else {
				echo "<h2><font color=red><center>Data gagal dihapus!</center></font></h2>";	
			}
		}
?>