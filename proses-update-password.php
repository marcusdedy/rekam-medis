<?php
include('config.php');

$id = $_POST['edit_pass'];
$mu_password = md5($_POST['mu_password']);


$query = mysql_query("update mr_ms_user set mu_password='$mu_password' where mu_username='$id'") or die(mysql_error());

if ($query) {
}
?>

<script language="JavaScript">
		alert('Password Berhasil Diganti!');
		document.location='login-user/logout.php';
		</script>
        