<body bgcolor="#EEF2F7">
<?php
	include "config.php";
	$id = $_POST['cup_patien_id'];
	$cup_patien_id				= $_POST['cup_patien_id'];
	$cup_patien_name			= $_POST['cup_patien_name'];
	$cup_disease_complaints		= $_POST['cup_disease_complaints'];
	$cup_diagnosis				= $_POST['cup_diagnosis'];
	$cup_medicine				= $_POST['cup_medicine'];
	$cup_user_update			= $_POST['cup_user_update'];
	$cup_check_up_date			= DATE("Y-m-d");

	if (empty($_POST['cup_diagnosis'])) {
	?>
		<script language="JavaScript">
			alert('Diagnosa belum di input');
			document.location='home-user.php?page=form-view-periksa&mu_username=<?=$_SESSION['mu_username']?>';
		</script>
	<?php
	}
	else {
	//Masukan data ke Table mr_check_up_patient
	$input	=" insert into mr_check_up_patient (cup_patien_id, cup_patien_name, cup_disease_complaints, cup_diagnosis, cup_medicine, cup_user_update, cup_check_up_date ) values ('$cup_patien_id', '$cup_patien_name', '$cup_disease_complaints', '$cup_diagnosis', '$cup_medicine', '$cup_user_update', '$cup_check_up_date')";
	
	$query_update =mysql_query($input);
	// update data di table mr_patient_registration
	$update="update mr_patient_registration set pr_check_up_patient_status ='T' where pr_patien_id ='$cup_patien_id'";
	$query_update =mysql_query($update);
		if ($query_update) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('Data Pasien An Nama <?=$cup_patien_name?> Berhasil disimpan!');
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