<body bgcolor="#EEF2F7">
<?php
	include "config.php";
	$id = $_POST['p_cup_id'];
	$p_cup_id 					= $_POST['p_cup_id'];
	$p_patien_id				= $_POST['p_patien_id'];
	$p_patien_name				= $_POST['p_patien_name'];
	$p_medical_consultation_fees= $_POST['p_medical_consultation_fees'];
	$p_medicines				= $_POST['p_medicines'];
	$p_admin					= $_POST['p_admin'];
	$p_user_update				= $_POST['p_user_update'];
	$p_update_date				= DATE("Y-m-d");

	if (empty($_POST['p_cup_id'])) {
	?>
		<script language="JavaScript">
			alert('Resep belum di input');
			document.location='home-user.php?page=form-view-resep&mu_username=<?=$_SESSION['mu_username']?>';
		</script>
	<?php
	}
	else {
	//Masukan data ke Table mr_prescription
	$input	=" insert into mr_prescription (p_cup_id, p_patien_id, p_patien_name, p_medical_consultation_fees, p_medicines, p_admin, p_update_date, p_user_update ) values ('$p_cup_id', '$p_patien_id', '$p_patien_name', '$p_medical_consultation_fees', '$p_medicines', '$p_admin', '$p_update_date', '$p_user_update')";
	
	$query_update =mysql_query($input);
	// update data di table mr_patient_registration
	$update="update mr_patient_registration set pr_prescription_status ='T' where pr_patien_id ='$p_patien_id'";
	$query_update =mysql_query($update);
		if ($query_update) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('Resep An Nama <?=$p_patien_name?> Berhasil Diproses!');
		window.close();;
		</script>
	<?php
	}
	else {
	//Jika Gagal
	echo "Data Gagal Diinput, Silahkan diulangi!";
	}
	}
	mysql_close($Open);
?>
</body>