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
			$query   = " select p_patien_id,  p_patien_name, p_medical_consultation_fees, p_medicines, p_admin, sum(p_medical_consultation_fees + p_medicines + p_admin ) as p_total from mr_prescription where p_patien_id = '$pr_patien_id' group by  p_patien_id,  p_patien_name, p_medical_consultation_fees, p_medicines, p_admin";

			$hasil   			= mysql_query($query);
			$data    			= mysql_fetch_array($hasil);
			$p_patien_id 					= $data['p_patien_id'];
			$p_patien_name	 				= $data['p_patien_name'];
			$p_medical_consultation_fees	= $data['p_medical_consultation_fees'];
			$p_medicines					= $data['p_medicines'];
			$p_admin						= $data['p_admin'];
			$p_total						= $data['p_total'];

		}
		else {
			die ("Error. Tidak ada data Pasien yang dipilih Silahkan cek kembali! ");	
		}
	?>
<form action="home-user.php?page=proses-pembayaran" method="POST" name="form_pembayaran" >
	<table width="762" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="26">
				<td width="1%" height="24">&nbsp;</td>
				<td width="22%" valign="middle">&nbsp;</td>
				<td width="2%" valign="middle">&nbsp;</td>
				<td width="75%" valign="middle"><font color="orange" size="3"><b>Form Payment</b></font></td>
			</tr>
		<tr height="36">
			<td height="29">&nbsp;</td>
			<td valign="middle">ID</td>
			<td valign="middle"><strong>:</strong></td>
			<td valign="middle"><input name="py_patien_id" type="text" value="<?=$p_patien_id?>" size="10" readonly="readonly" />
		</tr>
		<tr height="36">
		  <td height="24">&nbsp;</td>
		  <td valign="middle">Nama </td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle"><input name="py_patien_name" type="text" value="<?=$p_patien_name?>" size="35" maxlength="100" readonly="readonly" /></td>
	  </tr>
      	  </tr>
		<tr height="36">
		  <td height="27">&nbsp;</td>
		  <td valign="middle">Biaya Obat</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
<input name="p_medicines" type="number" value="<?=$p_medicines?>" size="15" readonly="readonly"/> 
	      , -</td>
	  </tr>
		<tr height="36">
		  <td height="35">&nbsp;</td>
		  <td valign="middle">Biaya Konsultasi Dokter</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
<input name="p_medical_consultation_fees" type="number" value="<?=$p_medical_consultation_fees?>" size="15" readonly="readonly"/> 
  ,-</td>
	  </tr>
		<tr height="36">
		  <td height="35">&nbsp;</td>
		  <td valign="middle">Admin</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
<input name="b_admin" type="number" value="<?=$p_admin?>" size="15" readonly="readonly"/>
	      ,-</td>
	  </tr>
		<tr height="36">
		  <td height="35">&nbsp;</td>
		  <td valign="middle">Total</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
		    <input name="py_total_prescription" type="number" value="<?=$p_total?>" size="15" readonly="readonly"/>
		    ,-</td>
	  </tr>
		<tr height="36">
		  <td height="35">&nbsp;</td>
		  <td valign="middle">Jumlah Pembayaran</td>
		  <td valign="middle"><strong>:</strong></td>
		  <td valign="middle">Rp.
		    <input name="py_payment" type="number" required="required" value="" size="15" />
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
		  <td valign="middle"><input name="py_user_update" type="text" value="<?php echo $_SESSION['mu_username'];?>" size="30" maxlength="30" readonly="readonly" /></td>
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