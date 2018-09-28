<?php
	include "config.php";
	
		$id 					= $_POST['mp_poly_id'];
		$mp_poly_id				= $_POST['mp_poly_id'];
		$mp_doctor_name 		= $_POST['mp_doctor_name'];
		$mp_poly_name			= $_POST['mp_poly_name'];
		$mp_information			= $_POST['mp_information'];
		$mp_user_update			= $_POST['mp_user_update'];
		$mp_update_date			= DATE("Y-m-d");


	if (empty($_POST['mp_doctor_name'])) {
	?>
		<script language="JavaScript">
		alert('Dokter <?=$mp_doctor_name?> Poly <?=$mp_poly_name?> Berhasil Diinput!');
		document.location='home-user.php?page=form-ms-dokter&mu_username=<?=$_SESSION['mu_username']?>';
		window.close();
		</script>
	<?php
	}
	else {

	$input	="insert into mr_ms_poly (mp_poly_id, mp_poly_name, mp_doctor_name, mp_information, mp_user_update, mp_update_date) values ('$mp_poly_id', '$mp_poly_name', '$mp_doctor_name', '$mp_information', '$mp_user_update', '$mp_update_date')";
	$query_input =mysql_query($input);

		if ($query_input) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('Dokter <?=$mp_doctor_name?> Poly <?=$mp_poly_name?> Berhasil Diinput!');
		document.location='home-user.php?page=form-ms-dokter&mu_username=<?=$_SESSION['mu_username']?>';
		window.close();
		</script>
	<?php
	}
	else {
	//Jika Gagal
	echo "Gagal Diinput, Silahkan diulangi!";
	}
	}

?>
</body>
        
        
        