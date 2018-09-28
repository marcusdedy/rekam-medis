
<?php
include "config.php";
?>

    <h6><font color="orange" size="5"><u>Payment</u></font>       <u>
    <left></left>
    </u></h6>
<form action="home-user.php?page=form-view-pembayaran&mu_username=<?=$_SESSION['mu_username']?>" method="post" name="postform">
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
		$Tampil=mysql_query(" select * from (
      SELECT a.pr_patien_id , a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin, sum(c.p_medical_consultation_fees + c.p_medicines + c.p_admin) total
  FROM (mr_check_up_patient b
        INNER JOIN mr_prescription c
           ON (b.cup_id = c.p_cup_id))
       INNER JOIN
       mr_patient_registration a
          ON (a.pr_patien_id =
                 b.cup_patien_id) 
  group by a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin)a ");
		$jumlah=mysql_fetch_array(mysql_query(" select count( a.pr_patien_id) total from (
			SELECT a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin, sum(c.p_medical_consultation_fees + c.p_medicines + c.p_admin) total
  FROM (mr_check_up_patient b
        INNER JOIN mr_prescription c
           ON (b.cup_id = c.p_cup_id))
       INNER JOIN
       mr_patient_registration a
          ON (a.pr_patien_id =
                 b.cup_patien_id) 
  group by a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin )a "));
		
	}else{
		// create by Marcuz Dedy
		?>
		<?php
		
		$Tampil=mysql_query(" select * from (
			SELECT a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin, sum(c.p_medical_consultation_fees + c.p_medicines + c.p_admin) total
  FROM (mr_check_up_patient b
        INNER JOIN mr_prescription c
           ON (b.cup_id = c.p_cup_id))
       INNER JOIN
       mr_patient_registration a
          ON (a.pr_patien_id =
                 b.cup_patien_id) 
  group by a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin )a where a.pr_patien_name like '$pr_patien_name'");
		$jumlah=mysql_fetch_array(mysql_query("select count( a.pr_patien_id) total from (
			SELECT a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin, sum(c.p_medical_consultation_fees + c.p_medicines + c.p_admin) total
  FROM (mr_check_up_patient b
        INNER JOIN mr_prescription c
           ON (b.cup_id = c.p_cup_id))
       INNER JOIN
       mr_patient_registration a
          ON (a.pr_patien_id =
                 b.cup_patien_id) 
  group by a.pr_patien_id, a.pr_identity_card, a.pr_patien_name, a.pr_update_date,
       b.cup_check_up_date, c.p_update_date, c.p_medical_consultation_fees, c.p_medicines,
       c.p_admin )a where a.pr_patien_name like '$pr_patien_name'"));
	}
	
	?>
</p>

<table width="1206" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr bgcolor="#0066FF">
		<th width="2%"><font color="#FFFFFF"> No. </font></td>&nbsp;
	  	<th width="5%"><font color="#FFFFFF"> Patient ID</font>       
	  	<th width="18%"><font color="#FFFFFF"> Name </font>    
	  	<th width="8%" ><font color="#FFFFFF"> Tgl Regist </font>
      	<th width="8%"><font color="#FFFFFF"> Tgl Periksa </font>
      	<th width="9%"><font color="#FFFFFF"> Tgl Resep </font>
      	<th width="10%"><font color="#FFFFFF"> Biaya Dokter </font>
      	<th width="10%"><font color="#FFFFFF"> Biaya Obat </font> 
      	<th width="9%"><font color="#FFFFFF"> Biaya Admin </font>
      	<th width="10%"><font color="#FFFFFF"> Total </font>                 
   	  <th width="11%"><font color="#FFFFFF"> Action </font></td>&nbsp; 
	</tr>
	
	<?php
		$no=0;
    	while (	$hasil = mysql_fetch_array ($Tampil)) {
    		$pr_patien_id 					= stripcslashes($hasil['pr_patien_id']);
			$pr_identity_card 				= stripslashes ($hasil['pr_identity_card']);
			$pr_patien_name					= stripcslashes($hasil['pr_patien_name']);
			$pr_update_date					= stripslashes ($hasil['pr_update_date']);
			$cup_check_up_date				= stripslashes ($hasil['cup_check_up_date']);
			$p_update_date					= stripslashes ($hasil['p_update_date']);
			$p_medical_consultation_fees	= stripslashes ($hasil['p_medical_consultation_fees']);
			$p_medicines					= stripslashes ($hasil['p_medicines']);
			$p_admin						= stripslashes ($hasil['p_admin']);
			$total							= stripslashes ($hasil['total']);
		{
	
	?>
	
    <tr align="center">
    	<td height="19" bgcolor="#EEF2F7"><?php echo $no=$no+1; ?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$pr_patien_id?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$pr_patien_name?></td>
	    <td align="center" bgcolor="#EEF2F7"><?=$pr_update_date?></td>
	    <td align="center" bgcolor="#EEF2F7"><?=$cup_check_up_date?></td>
      <td align="center" bgcolor="#EEF2F7"><?=$p_update_date?></td>
      <td align="right" bgcolor="#EEF2F7"><?=$p_medical_consultation_fees?></td>
      <td align="right" bgcolor="#EEF2F7"><?=$p_medicines?></td>
      <td align="right" bgcolor="#EEF2F7"><?=$p_admin?></td>
        <td align="right" bgcolor="#EEF2F7"><?=$total?></td>
		<td bgcolor="#EEF2F7"><div align="center">
        <a href="javascript:void(0);"
    onclick="window.open('form-pembayaran.php?pr_patien_id=<?php echo $pr_patien_id; ?>','nama_window_pop_up','height = 460, width = 730, resizable = 0')">Payment</a></td>
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