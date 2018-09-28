<body bgcolor="#EEF2F7">
<?php
	include "config.php";
	$id = $_POST['py_patien_id'];
	$py_patien_id				= $_POST['py_patien_id'];
	$py_patien_name				= $_POST['py_patien_name'];
	$py_total_prescription		= $_POST['py_total_prescription'];
	$py_payment					= $_POST['py_payment'];
	$py_user_update				= $_POST['py_user_update'];
	$py_update_date				= DATE("Y-m-d");

	if (empty($_POST['py_payment'])) {
	?>
		<script language="JavaScript">
			alert('Pembayaran belum di input');
			window.close();;
		</script>
	<?php
	}
	else {
	//Masukan data ke Table mr_payment
	$input	=" insert into mr_payment (py_patien_id, py_patien_name, py_total_prescription, py_payment, py_update_date, py_user_update ) values ('$py_patien_id', '$py_patien_name', '$py_total_prescription', '$py_payment', '$py_update_date', '$py_user_update')";
	
	$query_update =mysql_query($input);
	// update data di table mr_patient_registration
	$update="update mr_patient_registration set pr_payment_status ='T' where pr_patien_id ='$py_patien_id'";
	$query_update =mysql_query($update);
		if ($query_update) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('Pembayaran An Nama <?=$py_patien_name?> Berhasil Diproses!');
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