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
		if (isset($_GET['cup_id'])) {
			$cup_id   = $_GET['cup_id'];
			$query   = "select * from mr_check_up_patient where cup_id ='$cup_id'";

			$hasil   			= mysql_query($query);
			$data    			= mysql_fetch_array($hasil);
			$cup_id 			= $data['cup_id'];
			$cup_patien_id	 	= $data['cup_patien_id'];
			$cup_patien_name	= $data['cup_patien_name'];
			$cup_medicine		= $data['cup_medicine'];

		}
		else {
			die ("Error. Tidak ada Pasien yang dipilih Silahkan cek kembali! ");	
		}
	?>
<form action="home-user.php?page=proses-resep" method="POST" name="form_periksa" >
	<table width="762" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="26">
				<td width="1%" height="24">&nbsp;</td>
				<td width="22%" valign="middle">&nbsp;</td>
				<td width="2%" valign="middle">&nbsp;</td>
				<td width="75%" valign="middle"><font color="orange" size="3"><b>Form Prescription</b></font></td>
			</tr>
		<tr height="36">
			<td height="29">&nbsp;</td>
			<td valign="middle">ID</td>
			<td valign="middle"><strong>:</strong></td>
			<td valign="middle"><input name="p_cup_id" type="text" value="<?=$cup_id?>" size="10" readonly="readonly" />
			  PasienId :
			    <input name="p_patien_id" type="text" value="<?=$cup_patien_id?>" size="10" readonly="readonly" />
	      </td>
		</tr>
		<tr height="36">
		  <td height="24">&nbsp;</td>
		  <td valign="middle">Nama </td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle"><input name="p_patien_name" type="text" value="<?=$cup_patien_name?>" size="35" maxlength="100" readonly="readonly" /></td>
	  </tr>
      	  </tr>
		<tr height="36">
		  <td height="50">&nbsp;</td>
		  <td valign="middle">Resep Obat</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle"><textarea name="cup_medicine" cols="50" rows="2" readonly="readonly"><?=$cup_medicine?>
		    </textarea></td>
	  </tr>
		<tr height="36">
		  <td height="27">&nbsp;</td>
		  <td valign="middle">Biaya Obat</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
<input name="p_medicines" type="number" required value="" size="15" /> 
	      , -</td>
	  </tr>
		<tr height="36">
		  <td height="35">&nbsp;</td>
		  <td valign="middle">Biaya Konsultasi Dokter</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
<input name="p_medical_consultation_fees" type="number" required value="" size="15" /> 
  ,-</td>
	  </tr>
		<tr height="36">
		  <td height="35">&nbsp;</td>
		  <td valign="middle">Admin</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
<input name="p_admin" type="number" required value="" size="15" />
	      ,-</td>
	  </tr>
		<tr height="36">
		  <td>&nbsp;</td>
		  <td valign="middle">&nbsp;</td>
		  <td valign="middle">&nbsp;</td>
		  <td valign="middle">&nbsp;</td>
	  </tr>
		<tr height="36">
			<td height="32">&nbsp;</td>
			<td valign="middle">User</td>
			<td valign="middle"><strong>:</strong></td>
		  <td valign="middle"><input name="p_user_update" type="text" value="<?php echo $_SESSION['mu_username'];?>" size="30" maxlength="30" readonly="readonly" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr height="36">
			<td>&nbsp;</td>
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
			<td>&nbsp;</td>
		</tr>

	</table>
</form>
<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</div>