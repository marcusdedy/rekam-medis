<?php
	include "config.php";
	
		$id 					= $_POST['mu_user_id'];
		$mu_user_id				= $_POST['mu_user_id'];
		$mu_username 			= $_POST['mu_username'];
		$mu_name				= $_POST['mu_name'];
		$mu_password			= md5($_POST['mu_password']);
		$mu_user_update			= $_POST['mu_user_update'];
		$mu_update_date			= DATE("Y-m-d");


	if (empty($_POST['mu_username'])) {
	?>
		<script language="JavaScript">
		alert('User <?=$mu_name?> Berhasil Dibuat!');
		document.location='home-user.php?page=form-ms-user&mu_username=<?=$_SESSION['mu_username']?>';
		window.close();
		</script>
	<?php
	}
	else {

	$input	="insert into mr_ms_user (mu_user_id, mu_username, mu_name, mu_password, mu_access, mu_update_date, mu_user_update) values ('$mu_user_id', '$mu_username', '$mu_name', '$mu_password', 'U', '$mu_update_date', '$mu_user_update')";
	$query_input =mysql_query($input);

		if ($query_input) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('User <?=$mu_name?> Berhasil Dibuat!');
		document.location='home-user.php?page=form-ms-user&mu_username=<?=$_SESSION['mu_username']?>';
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
        
        
        