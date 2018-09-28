<?php
	include "config.php";
	
		$id 					= $_POST['pr_patien_id'];
		$pr_patien_id 			= $_POST['pr_patien_id'];
		$pr_identity_card		= $_POST['pr_identity_card'];
		$pr_patien_name			= $_POST['pr_patien_name'];
		$pr_gender				= $_POST['pr_gender'];
		$pr_blood_type			= $_POST['pr_blood_type'];
		$pr_religion			= $_POST['pr_religion'];
		$pr_place_of_birth		= $_POST['pr_place_of_birth'];
		$pr_date_of_birth		= $_POST['year']."-".$_POST['mount']."-".$_POST['year'];
		$pr_address				= $_POST['pr_address'];
		$pr_phone				= $_POST['pr_phone'];
		$pr_status				= $_POST['pr_status'];
		$pr_employment			= $_POST['pr_employment'];
		$pr_family_status		= $_POST['pr_family_status'];
		$pr_family_name			= $_POST['pr_family_name'];
		$pr_family_phone		= $_POST['pr_family_phone'];
		$pr_poly_id				= $_POST['pr_poly_id'];
		$pr_user_update			= $_POST['pr_user_update'];
		$pr_update_date			= DATE("Y-m-d");


	if (empty($_POST['pr_identity_card'])) {
	?>
		<script language="JavaScript">
		alert('ID <?=$pr_patien_id?> Berhasil Update!');
		document.location='home-user.php?page=form-view-pendaftaran&mu_username=<?=$_SESSION['mu_username']?>';
		</script>
	<?php
	}
	else {

	$update	="update mr_patient_registration set pr_patien_id ='$pr_patien_id', pr_identity_card='$pr_identity_card', pr_patien_name ='$pr_patien_name', pr_gender = '$pr_gender', pr_blood_type ='$pr_blood_type', pr_religion ='$pr_religion', pr_place_of_birth = '$pr_place_of_birth', pr_date_of_birth ='$pr_date_of_birth', pr_address ='$pr_address', pr_phone = '$pr_phone', pr_status = '$pr_status', pr_employment ='$pr_employment', pr_family_status ='$pr_family_status', pr_family_name ='$pr_family_name', pr_family_phone ='$pr_family_phone', pr_poly_id ='$pr_poly_id', pr_update_date ='$pr_update_date', pr_user_update ='$pr_user_update' where pr_patien_id ='$pr_patien_id' ";

	$query_update =mysql_query($update);

		if ($query_update) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('ID <?=$pr_patien_id?> Berhasil Update!');
		document.location='home-user.php?page=form-view-pendaftaran&mu_username=<?=$_SESSION['mu_username']?>';
		window.close();
		</script>
	<?php
	}
	else {
	//Jika Gagal
	echo "ID Pasien Gagal Update, Silahkan diulangi!";
	}
	}

?>
</body>
        
        
        