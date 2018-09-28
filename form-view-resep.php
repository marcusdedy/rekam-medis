
<?php
include "config.php";
?>

    <h6><font color="orange" size="5"><u>Prescription</u></font>       <u>
    <left></left>
    </u></h6>
<form action="home-user.php?page=form-view-resep&mu_username=<?=$_SESSION['mu_username']?>" method="post" name="postform">
  <table width="546" border="0" align="left">
<tr>
  <td width="69">&nbsp;</td>
    <td width="159">Search Name</td>
    <td width="304" colspan="2"><input type="text" name="cup_patien_name" value="<?php if(isset($_POST['cup_patien_name'])){ echo $_POST['cup_patien_name']; }?>"/></td>
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
	
	$cup_patien_name=$_POST['cup_patien_name'];

	
	if(empty($cup_patien_name) ){
		$Tampil=mysql_query(" select * from mr_check_up_patient where cup_id not in (select p_cup_id from mr_prescription)");
		$jumlah=mysql_fetch_array(mysql_query("select count(cup_id)total from mr_check_up_patient where cup_id not in (select p_cup_id from mr_prescription)"));
		
	}else{
		// create by Marcuz Dedy
		?>
		<?php
		
		$Tampil=mysql_query(" select * from mr_check_up_patient where cup_patien_name ='$cup_patien_name' and where cup_id not in (select p_cup_id from mr_prescription)");
		$jumlah=mysql_fetch_array(mysql_query("select count(cup_id)total from mr_check_up_patient where cup_patien_name ='$cup_patien_name' and where cup_id not in (select p_cup_id from mr_prescription)"));
	}
	
	?>
</p>

<table width="1206" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr bgcolor="#0066FF">
		<th width="5%"><font color="#FFFFFF"> No. </font></td>&nbsp;
	  	<th width="6%"><font color="#FFFFFF"> Patient ID</font>       
	  	<th width="22%"><font color="#FFFFFF"> Name </font>    
	  	<th width="36%" ><font color="#FFFFFF"> Diagnosis </font>
      	<th width="24%"><font color="#FFFFFF"> Medicine </font>        
   	  <th width="7%"><font color="#FFFFFF"> Action </font></td>&nbsp; 
	</tr>
	
	<?php
		$no=0;
    	while (	$hasil = mysql_fetch_array ($Tampil)) {
    		$cup_id 			= stripcslashes($hasil['cup_id']);
			$cup_patien_id 		= stripslashes ($hasil['cup_patien_id']);
			$cup_patien_name	= stripcslashes($hasil['cup_patien_name']);
			$cup_diagnosis		= stripslashes ($hasil['cup_diagnosis']);
			$cup_medicine		= stripslashes ($hasil['cup_medicine']);
		{
	
	?>
	
    <tr align="center">
    	<td height="19" bgcolor="#EEF2F7"><?php echo $no=$no+1; ?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$cup_patien_id?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$cup_patien_name?></td>
	    <td align="left" bgcolor="#EEF2F7"><?=$cup_diagnosis?><div align="center"></div></td>
	    <td align="left" bgcolor="#EEF2F7"><?=$cup_medicine?></td>
		<td bgcolor="#EEF2F7"><div align="center">
        <a href="javascript:void(0);"
    onclick="window.open('form-resep.php?cup_id=<?php echo $cup_id; ?>','nama_window_pop_up','height = 400, width = 950, resizable = 0')">Proses</a></td>
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