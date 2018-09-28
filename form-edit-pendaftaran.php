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
			$pr_identity_card	= $data['pr_identity_card'];
			$pr_patien_name		= $data['pr_patien_name'];
			$pr_gender 			= $data['pr_gender'];
			$pr_blood_type 		= $data['pr_blood_type'];
			$pr_religion 		= $data['pr_religion'];
			$pr_place_of_birth 	= $data['pr_place_of_birth'];
			$pr_date_of_birth 	= $data['pr_date_of_birth'];
			$pr_address 		= $data['pr_address'];
			$pr_phone 			= $data['pr_phone'];
			$pr_employment 		= $data['pr_employment'];
			$pr_family_status 	= $data['pr_family_status'];
			$pr_family_name 	= $data['pr_family_name'];
			$pr_family_phone 	= $data['pr_family_phone'];
			$pr_poly_id 		= $data['pr_poly_id'];

		}
		else {
			die ("Error. Tidak ada Pasien yang dipilih Silahkan cek kembali! ");	
		}
	?>
<form action="home-user.php?page=proses-edit-pendaftaran" method="POST" name="form_periksa" >
	<table width="854" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="26">
				<td width="25%" height="24">&nbsp;</td>
				<td width="2%">&nbsp;</td>
				<td width="73%"><font color="orange" size="3"><b>Form Edit Data Pasien</b></font></td>
			</tr>
		<tr>
		  <td height="26">Poli</td>
		  <td><strong>:</strong></td>
		  <td><select name="pr_poly_id" >
		    <?php
            include "config.php";
            $query = "SELECT * from mr_ms_poly";
            $hasil = mysql_query($query);
            while ($qtabel = mysql_fetch_assoc($hasil))
            {
                echo '<option value="'.$qtabel['mp_poly_id'].'">'.$qtabel['mp_poly_name'].'</option>';               
            }
          ?>
		    </select></td>
	  </tr>
		<tr>
		  <td height="38">Id Regist</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_patien_id" type="number" value="<?=$pr_patien_id?>" size="35" maxlength="100" readonly="readonly"/></td>
	  </tr>
		<tr>
		  <td height="28">No Identitas (KTP/SIM)</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_identity_card" type="number" value="<?=$pr_identity_card?>" size="35" maxlength="100" /></td>
	  </tr>
		<tr>
		  <td height="35">Nama</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_patien_name"  value="<?=$pr_patien_name?>" size="45" maxlength="100" /></td>
	  </tr>
		<tr>
		  <td height="33">Jenis Kelamin</td>
		  <td><strong>:</strong></td>
		  <td><select name="pr_gender" size="1" id="pr_gender">
		    <option value="L">Laki-Laki</option>
		    <option value="P">Perempuan</option>
		    </select></td>
	  </tr>
		<tr>
		  <td height="39">Gol. Darah</td>
		  <td><strong>:</strong></td>
		  <td><select name="pr_blood_type" size="1" id="pr_blood_type">
		    <option value="O">O</option>
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="AB">AB</option>
		    </select></td>
	  </tr>
		<tr>
		  <td height="38">Agama</td>
		  <td><strong>:</strong></td>
		  <td><select name="pr_religion" size="1" id="pr_religion">
		    <option value="Islam">Islam</option>
		    <option value="Kristen">Kristen</option>
		    <option value="Katolik">Katolik</option>
		    <option value="Hindu">Hindu</option>
		    <option value="Buddha">Buddha</option>
		    <option value="Kong Hu Cu">Kong Hu Cu</option>
		    </select></td>
	  </tr>
		<tr>
		  <td height="36">Tmpt. Tgl Lahir</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_place_of_birth" type="text" required="required" value="<?=$pr_place_of_birth?>" size="25" maxlength="25" />
		    Tanggal lahir
		    :
		    <input name="day" type="number" required="required" value="" size="3" maxlength="2" />
		    -
		    <select name="mount" size="1" id="mount">
		      <option value="Jan"> Jan </option>
		      <option value="Feb"> Feb </option>
		      <option value="Mar"> Mar </option>
		      <option value="Apr"> Apr </option>
		      <option value="May"> May </option>
		      <option value="Jun"> Jun </option>
		      <option value="Jul"> Jul </option>
		      <option value="Aug"> Aug </option>
		      <option value="Sep"> Sep </option>
		      <option value="Oct"> Oct </option>
		      <option value="Nov"> Nov </option>
		      <option value="Dec"> Dec </option>
	        </select>
		    -
		    <input name="year" type="number" required="required" value="" size="5" maxlength="4" /></td>
	  </tr>
		<tr>
		  <td height="37">Alamat</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_address" type="text" required="required" value="<?=$pr_address?>" size="100" maxlength="100" /></td>
	  </tr>
		<tr>
		  <td height="33">Tlpn</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_phone" type="number" required="required" value="<?=$pr_phone?>" size="25" maxlength="15" /></td>
	  </tr>
		<tr>
		  <td height="36">Status Nikah</td>
		  <td><strong>:</strong></td>
		  <td><select name="pr_status" size="1" id="pr_status">
		    <option value="nikah">Nikah</option>
		    <option value="lajang">Lajang</option>
		    <option value="duda">Duda</option>
		    <option value="janda">Janda</option>
		    </select></td>
	  </tr>
		<tr>
		  <td height="30">Pekerjaan</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_employment" type="text" required="required" value="<?=$pr_employment?>" size="50" maxlength="100" /></td>
	  </tr>
		<tr>
		  <td height="29" bgcolor="#CCCCCC"><strong>Keluarga</strong></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	  </tr>
		<tr>
		  <td height="36">Status Keluarga</td>
		  <td><strong>:</strong></td>
		  <td><select name="pr_family_status" size="1" id="pr_family_status">
		    <option value="suami">Suami</option>
		    <option value="istri">Istri</option>
		    <option value="anak">Anak</option>
		    </select></td>
	  </tr>
		<tr>
		  <td height="41">Nama Keluarga</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_family_name" type="text" required="required" value="<?=$pr_family_name?>" size="45" maxlength="100" /></td>
	  </tr>
		<tr>
		  <td height="29">Tlpn</td>
		  <td><strong>:</strong></td>
		  <td><input name="pr_family_phone" type="number" required="required" value="<?=$pr_family_phone?>" size="50" maxlength="100" /></td>
	  </tr>
		<tr height="36">
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	  </tr>
		<tr height="36">
			<td height="22">User</td>
			<td><strong>:</strong></td>
			<td><input name="pr_user_update" type="text" value="<?php echo $_SESSION['mu_username'];?>" size="30" maxlength="30" readonly="readonly" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr height="36">
			<td height="36">&nbsp;</td>
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