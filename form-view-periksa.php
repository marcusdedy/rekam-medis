
<?php
include "config.php";
?>

    <h6><font color="orange" size="5"><u>Patient Check Up</u></font>       <u>
    <left></left>
    </u></h6>
<form action="home-user.php?page=form-view-periksa" method="post" name="postform">
  <table width="546" border="0" align="left">
<tr>
  <td width="69">&nbsp;</td>
    <td width="159">Search Name</td>
    <td width="304" colspan="2"><input type="text" name="pr_patien_name" value="<?php if(isset($_POST['pr_patien_name'])){ echo $_POST['pr_patien_name']; }?>"/></td>
</tr>

<tr>
  <td align="center" >&nbsp;</td>
    <td><input type="submit" value="View Data" name="cari"></td>

    
</tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>

<?php
//di proses jika sudah klik tombol cari
if(isset($_POST['cari'])){
	
	$pr_patien_name=$_POST['pr_patien_name'];

	
	if(empty($pr_patien_name) ){
		$Tampil=mysql_query("select a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_gender, b.mp_poly_name, b.mp_doctor_name,  a.pr_phone, a.pr_update_date from
(select pr_patien_id, pr_identity_card, pr_patien_name, pr_gender, pr_poly_id, pr_phone, pr_update_date from mr_patient_registration
where pr_check_up_patient_status is null)a,
(select mp_poly_id, mp_poly_name, mp_doctor_name from mr_ms_poly)b
where a.pr_poly_id = b.mp_poly_id");
		$jumlah=mysql_fetch_array(mysql_query("select count(pr_patien_id)total from mr_patient_registration"));
		
	}else{
		// create by Marcuz Dedy
		?>
		<?php
		
		$Tampil=mysql_query(" select a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_gender, b.mp_poly_name, b.mp_doctor_name,  a.pr_phone, a.pr_update_date from
(select pr_patien_id, pr_identity_card, pr_patien_name, pr_gender, pr_poly_id, pr_phone, pr_update_date from mr_patient_registration
where pr_check_up_patient_status is null and pr_patien_name like '%$pr_patien_name%')a,
(select mp_poly_id, mp_poly_name, mp_doctor_name from mr_ms_poly)b
where a.pr_poly_id = b.mp_poly_id");
		$jumlah=mysql_fetch_array(mysql_query("select count(pr_patien_id)total from mr_patient_registration where pr_check_up_patient_status is null and pr_patien_name like '%$pr_patien_name%'"));
	}
	
	?>
</p>

<table width="1206" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr bgcolor="#0066FF">
		<th width="3%"><font color="#FFFFFF"> No. </font></td>&nbsp;
	  	<th width="7%"><font color="#FFFFFF"> ID Regist </font>
	  	<th width="14%"><font color="#FFFFFF"> Patient ID</font>       
	  	<th width="22%"><font color="#FFFFFF"> Name </font>    
	  	<th width="6%" ><font color="#FFFFFF"> Gender </font>
      	<th width="9%"><font color="#FFFFFF"> Poly </font>
      	<th width="13%"><font color="#FFFFFF"> Doctor </font>
      	<th width="7%"><font color="#FFFFFF"> Registration Date </font>
      	<th width="9%"><font color="#FFFFFF"> Phone </font>         
      	<th width="10%"><font color="#FFFFFF"> Action </font></td>&nbsp; 
	</tr>
	
	<?php
		$no=0;
    	while (	$hasil = mysql_fetch_array ($Tampil)) {
			$pr_patien_id 		= stripslashes ($hasil['pr_patien_id']);
			$pr_identity_card	= stripcslashes($hasil['pr_identity_card']);
			$pr_patien_name		= stripslashes ($hasil['pr_patien_name']);
			$pr_gender			= stripslashes ($hasil['pr_gender']);
			$mp_poly_name 		= stripslashes ($hasil['mp_poly_name']);
			$mp_doctor_name		= stripcslashes($hasil['mp_doctor_name']);
			$pr_phone			= stripcslashes($hasil['pr_phone']);
			$pr_update_date 	= stripslashes ($hasil['pr_update_date']);
		{
	
	?>
	
    <tr align="center">
    	<td height="19" bgcolor="#EEF2F7"><?php echo $no=$no+1; ?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$pr_patien_id?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$pr_identity_card?></td>
	    <td align="center" bgcolor="#EEF2F7"><?=$pr_patien_name?><div align="center"></div></td>
	      <td align="center" bgcolor="#EEF2F7"><?=$pr_gender?></td>
	      <td align="center" bgcolor="#EEF2F7"><?=$mp_poly_name?></td>
	      <td align="center" bgcolor="#EEF2F7"><?=$mp_doctor_name?></td>
	      <td align="center" bgcolor="#EEF2F7"><?=$pr_update_date?></td>
	      <td align="center" bgcolor="#EEF2F7"><?=$pr_phone?></td>
		<td bgcolor="#EEF2F7"><div align="center">
        <a href="javascript:void(0);"
    onclick="window.open('form-periksa.php?pr_patien_id=<?php echo $pr_patien_id; ?>','nama_window_pop_up','height = 400, width = 950, resizable = 0')">Checkup</a></td>
    </tr>
    <tr>
    	<td colspan="15" align="center"> 
		<?php
		//by marcus dedy
		if(mysql_num_rows($Tampil)==0){
			echo "<font color=red><blink>Tidak ada data yang dicari!</blink></font>";
		}
		?>
        
        </td>
    </tr>

<?php  
		}
	
}

?>
</table>
<?php
}else{
	unset($_POST['cari']);
}
?>
</div>


