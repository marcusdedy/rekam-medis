<div style="border:0; padding:10px; width:924px; height:auto;">
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
		include "config.php";
		if (isset($_GET['pr_patien_id'])) {
			$pr_patien_id   = $_GET['pr_patien_id'];
			$query   = "select * from mr_patient_registration where pr_patien_id ='$pr_patien_id'";

			$hasil   			= mysql_query($query);
			$data    			= mysql_fetch_array($hasil);
			$pr_patien_id	 	= $data['pr_patien_id'];
			$pr_patien_name		= $data['pr_patien_name'];
			$pr_blood_type		= $data['pr_blood_type'];
			$pr_date_of_birth 	= $data['pr_date_of_birth'];

		}
		else {
			die ("Error. Tidak ada Pasien yang dipilih Silahkan cek kembali! ");	
		}
	?>
<form action="home-user.php?page=proses-periksa" method="POST" name="form_periksa" >
	<table width="709" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="26">
				<td width="2%" height="24">&nbsp;</td>
				<td width="13%">&nbsp;</td>
				<td width="85%"><font color="orange" size="3"><b>Form Checkup</b></font></td>
			</tr>
		<tr height="36">
			<td height="29">&nbsp;</td>
			<td>ID</td>
			<td><strong>:</strong>			  <input name="cup_patien_id" type="text" value="<?=$pr_patien_id?>" size="35" readonly="readonly" />
		  </td>
		</tr>
		<tr height="36">
		  <td height="22">&nbsp;</td>
		  <td>Nama </td>
		  <td><strong>:</strong>		    <input name="cup_patien_name" type="text" value="<?=$pr_patien_name?>" size="70" maxlength="100" readonly="readonly" /></td>
	  </tr>
      		<tr height="36">
		  <td height="22">&nbsp;</td>
		  <td>Gol. Darah</td>
		  <td><strong>:</strong>		    <input name="pr_blood_type" type="text" value="<?=$pr_blood_type?>" size="6" readonly="readonly" /></td>
	  </tr>
      	  </tr>
      		<tr height="36">
		  <td height="28">&nbsp;</td>
		  <td>Tgl Lahir</td>
		  <td><strong>:</strong>		    <input name="pr_date_of_birth" type="text" value="<?=$pr_date_of_birth?>" size="15" readonly="readonly" /></td>
	  </tr>
		<tr height="36">
			<td height="36">&nbsp;</td>
			<td>Keluhan</td>
			<td><strong>:</strong>
			  <textarea name="cup_disease_complaints" cols="35"></textarea></td>

        		</tr>
		<tr height="36">
		  <td height="65">&nbsp;</td>
		  <td>Diagnosa</td>
		  <td><strong>:</strong>
		    <textarea name="cup_diagnosis" cols="70" rows="3"></textarea></td>
	  </tr>
		<tr height="36">
		  <td height="50">&nbsp;</td>
		  <td>Resep Obat</td>
		  <td><strong>:</strong>
		    <textarea name="cup_medicine" cols="35"></textarea></td>
	  </tr>
		<tr height="36">
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	  </tr>
		<tr height="36">
			<td height="22">&nbsp;</td>
			<td>User</td>
			<td><strong>:</strong>			  <input name="cup_user_update" type="text" value="<?php echo $_SESSION['mu_username'];?>" size="30" maxlength="30" readonly="readonly" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr height="36">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="Submit" value="Save" >&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reset" value="Reset">
				<input type="button" value="Cancel" onclick="window.close();" title="Cancel" /></td>
		</tr>
		<tr height="36">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>

	</table>
</form>
<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</div>