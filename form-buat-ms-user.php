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
<title>Create New User</title>
</head>

<body>
<center>
<font color="#FFCC00" size="5">
<strong>Form Create New User</strong></font>
</center>

<form name="form_buat_ms_user" action="home-user.php?page=proses-buat-ms-user" method="post">
<table width="919" border="0" cellpadding="5" cellspacing="0">
    <tbody>
    	<tr>
        	<td width="114">Id User</td>
        	<td width="3">:</td>
        	<td width="772"><select name="mu_user_id" >
		<?php
            include "config.php";
            $query = "select sum(a.mu_user_id +1) as mu_user_id from
(SELECT max(mu_user_id) as mu_user_id from mr_ms_user )a";
            $hasil = mysql_query($query);
            while ($qtabel = mysql_fetch_assoc($hasil))
            {
                echo '<option value="'.$qtabel['mu_user_id'].'">'.$qtabel['mu_user_id'].'</option>';               
            }
            ?>
        </select></td>
        </tr>
        <tr>
        	<td>Username</td>
        	<td>:</td>
        	<td><input name="mu_username" type="text" required value="" size="15" maxlength="8" /></td>
        </tr>
        <tr>
          <td>Name</td>
          <td>:</td>
          <td><input name="mu_name" type="text" required value="" size="25" maxlength="25" /></td>
        </tr>
        <tr>
        	<td>Password</td>
        	<td>:</td>
        	<td><input name="mu_password" type="password" required value="" size="10" maxlength="8" /> 
        	<font color="red" size="2"> * Max 8 Karakter </font></td>
        </tr>
        <tr>
        	<td>User</td>
        	<td>:</td>
        	<td><input name="mu_user_update" type="text" required value="<?php echo $_SESSION['mu_username'];?>" size="25" maxlength="25" readonly /></td>
        </tr>
        	<td align="left" colspan="3"><input type="submit" name="submit"  value="Simpan" /></td>
        </tr>
    </tbody>

</table>

</form>
<right></right>
</body>
</html>