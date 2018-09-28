<?php 
    session_start();
    $mu_access = $_SESSION['mu_access'];
    if(!isset($_SESSION['mu_username']) && $mu_access!="U"){
		?>
			<script language="JavaScript">
				alert('Anda Harus Login. Silahkan Login kembali!');
				document.location='index.php';
			</script>
		<?php
    }
?>

<?php 
include('config.php');
?>
 
<html>
<head>
<title>Create New Doctor</title>
</head>

<body>
<center>
<font color="#FFCC00" size="5">
<strong>Form Create New Doctor</strong></font>
</center>

<form name="form_buat_ms_dokter" action="home-user.php?page=proses-buat-ms-dokter" method="post">
<table width="919" border="0" cellpadding="5" cellspacing="0">
    <tbody>
    	<tr>
        	<td width="114">Id Doctor</td>
        	<td width="3">:</td>
        	<td width="772"><select name="mp_poly_id" >
		<?php
            include "config.php";
            $query = "select sum(a.mp_poly_id +1) as mp_poly_id from
(SELECT max(mp_poly_id) as mp_poly_id from mr_ms_poly )a";
            $hasil = mysql_query($query);
            while ($qtabel = mysql_fetch_assoc($hasil))
            {
                echo '<option value="'.$qtabel['mp_poly_id'].'">'.$qtabel['mp_poly_id'].'</option>';               
            }
            ?>
        </select></td>
        </tr>
        <tr>
        	<td>Doctor Name</td>
        	<td>:</td>
        	<td><input name="mp_doctor_name" type="text" required value="" size="35" maxlength="35" /></td>
        </tr>
        <tr>
          <td>Poly</td>
          <td>:</td>
          <td><input name="mp_poly_name" type="text" required value="" size="25" maxlength="25" /></td>
        </tr>
        <tr>
        	<td>Information</td>
        	<td>:</td>
        	<td><input name="mp_information" type="text" required value="" size="50" maxlength="50" /></td>
        </tr>
        <tr>
        	<td>User</td>
        	<td>:</td>
        	<td><input name="mp_user_update" type="text" required value="<?php echo $_SESSION['mu_username'];?>" size="25" maxlength="25" readonly /></td>
        </tr>
        	<td align="left" colspan="3"><input type="submit" name="submit"  value="Simpan" /></td>
        </tr>
    </tbody>

</table>

</form>
<right></right>
</body>
</html>