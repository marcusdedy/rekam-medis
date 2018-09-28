<?php 
    session_start();
    $mu_access = $_SESSION['mu_access'];
    if(!isset($_SESSION['mu_username']) && $mu_access!="Customer"){
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
<title>Registration</title>
</head>

<body>
<center>
<font color="#FFCC00" size="5">
<strong>Form Registration</strong></font>
</center>

<form name="form_pendaftaran" action="home-user.php?page=proses-pendaftaran" method="post">
<table width="1020" border="0" cellpadding="5" cellspacing="0">
    <tbody>
    	<tr>
    	  <td bgcolor="#CCCCCC"><strong>Pasien</strong></td>
    	  <td>&nbsp;</td>
    	  <td>&nbsp;</td>
  	  </tr>
    	<tr>
    	  <td>Poli</td>
    	  <td>:</td>
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
        	<td width="114">Id Regist</td>
        	<td width="3">:</td>
        	<td width="772"><select name="pr_patien_id" >
		<?php
            include "config.php";
            $query = "select sum(a.pr_patien_id +1) as pr_patien_id from
                            (SELECT max(pr_patien_id) as pr_patien_id from mr_patient_registration )a";
            $hasil = mysql_query($query);
            while ($qtabel = mysql_fetch_assoc($hasil))
            {
                echo '<option value="'.$qtabel['pr_patien_id'].'">'.$qtabel['pr_patien_id'].'</option>';               
            }
            ?>
        </select></td>
        </tr>
        <tr>
        	<td>No Identitas (KTP/SIM)</td>
        	<td>:</td>
        	<td><input name="pr_identity_card" type="number" required value="" size="35" maxlength="100" /></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input name="pr_patien_name" type="text" required value="" size="45" maxlength="100" /></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><select name="pr_gender" size="1" id="pr_gender">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
          </select></td>
        </tr>
        <tr>
          <td>Gol. Darah</td>
          <td>:</td>
          <td><select name="pr_blood_type" size="1" id="pr_blood_type">
            <option value="O">O</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
          </select></td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
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
          <td>Tmpt. Tgl Lahir</td>
          <td>:</td>
          <td><input name="pr_place_of_birth" type="text" required value="" size="35" maxlength="35" /> 
            Tanggal lahir
            :            
              <input name="day" type="number" required value="" size="3" maxlength="2" />
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
              <input name="year" type="number" required value="" size="5" maxlength="4" /></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><input name="pr_address" type="text" required value="" size="100" maxlength="100" /></td>
        </tr>
        <tr>
          <td>Tlpn</td>
          <td>:</td>
          <td><input name="pr_phone" type="number" required value="" size="25" maxlength="15" /></td>
        </tr>
        <tr>
          <td>Status Nikah</td>
          <td>:</td>
          <td><select name="pr_status" size="1" id="pr_status">
            <option value="nikah">Nikah</option>
            <option value="lajang">Lajang</option>
            <option value="duda">Duda</option>
            <option value="janda">Janda</option>
          </select></td>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td>:</td>
          <td><input name="pr_employment" type="text" required value="" size="50" maxlength="100" /></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><strong>Keluarga</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Status Keluarga</td>
          <td>:</td>
          <td><select name="pr_family_status" size="1" id="pr_family_status">
            <option value="suami">Suami</option>
            <option value="istri">Istri</option>
            <option value="anak">Anak</option>
          </select></td>
        </tr>
        <tr>
          <td>Nama Keluarga</td>
          <td>:</td>
          <td><input name="pr_family_name" type="text" required value="" size="45" maxlength="100" /></td>
        </tr>
        <tr>
          <td>Tlpn</td>
          <td>:</td>
          <td><input name="pr_family_phone" type="number" required value="" size="50" maxlength="100" /></td>
        </tr>
        <tr>
        	<td>User</td>
        	<td>:</td>
        	<td><input name="pr_user_update" type="text" required value="<?php echo $_SESSION['mu_username'];?>" size="25" maxlength="25" readonly /></td>
        </tr>
        	<td align="left" colspan="3"><input type="submit" name="submit"  value="Simpan" /></td>
        </tr>
    </tbody>

</table>

</form>
<right></right>
</body>
</html>