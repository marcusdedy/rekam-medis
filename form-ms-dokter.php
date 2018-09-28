
<?php
include "config.php";
?>

    <h6><font color="orange" size="5"><u>MS Doctor</u></font>       <u>
    <left></left>
    </u></h6>
<form action="home-user.php?page=form-ms-dokter&mu_username=<?=$_SESSION['mu_username']?>" method="post" name="postform">
  <table width="546" border="0" align="left">
<tr>
  <td width="69">&nbsp;</td>
    <td width="159">Search Name</td>
    <td width="304" colspan="2"><input type="text" name="mp_doctor_name" value="<?php if(isset($_POST['mp_doctor_name'])){ echo $_POST['mp_doctor_name']; }?>"/></td>
</tr>

<tr>
  <td align="center" >&nbsp;</td>
    <td align="center" ><a href="javascript:void(0);"
    onclick="window.open('form-buat-ms-dokter.php','nama_window_pop_up','height = 400, width = 950, resizable = 0')">++ New Doctor</a></td>
    <td><input type="submit" value="Tampilkan Data" name="cari"></td>

    
</tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>

<?php
//di proses untuk penacarian
if(isset($_POST['cari'])){
	
	$mp_doctor_name=$_POST['mp_doctor_name'];

	
	if(empty($mp_doctor_name) ){
		$Tampil=mysql_query("select * from mr_ms_poly");
		$jumlah=mysql_fetch_array(mysql_query("select count(mp_poly_id)total from mr_ms_poly"));
		
	}else{
		// create by Marcuz Dedy
		?>
		<?php
		
		$Tampil=mysql_query("select * from mr_ms_poly where mp_doctor_name like '%$mp_doctor_name%'");
		$jumlah=mysql_fetch_array(mysql_query("select count(mp_poly_id)total from mr_ms_poly where mp_doctor_name like '%$mp_doctor_name%'"));
	}
	
	?>
</p>

<table width="1206" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr bgcolor="#0066FF">
	<th width="9%"><font color="#FFFFFF"> No </font></td>&nbsp;
	  <th width="9%"><font color="#FFFFFF"> Id </font>      
	  <th width="29%"><font color="#FFFFFF"> Nama Dokter </font>     
	  <th width="22%"><font color="#FFFFFF"> Poly </font>
      <th width="17%"><font color="#FFFFFF"> Tgl Buat </font>      
      <th width="14%"><font color="#FFFFFF"> Action </font></td>&nbsp; 
</tr>
	<?php
$no=0;
	
    while (	$hasil = mysql_fetch_array ($Tampil)) {
			$mp_poly_id 		= stripslashes ($hasil['mp_poly_id']);
			$mp_poly_name		= stripslashes ($hasil['mp_poly_name']);
			$mp_doctor_name		= stripslashes ($hasil['mp_doctor_name']);
			$mp_information 	= stripslashes ($hasil['mp_information']);
			$mp_user_update 	= stripslashes ($hasil['mp_user_update']);
			$mp_update_date 	= stripslashes ($hasil['mp_update_date']);
		{
	
?>
	
    <tr align="center">
    	<td height="19" bgcolor="#EEF2F7"><?php echo $no=$no+1; ?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$mp_poly_id?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$mp_doctor_name?></td>
      	<td align="center" bgcolor="#EEF2F7"><?=$mp_poly_name?><div align="center"></div></td>
      	<td align="center" bgcolor="#EEF2F7"><?=$mp_update_date?></td>
		<td bgcolor="#EEF2F7"><div align="center">
        <a href="home-user.php?page=proses-hapus-dokter&mp_poly_id=<?=$mp_poly_id?>">Delete</a></div></td>
    </tr>
    <tr>
    	<td colspan="15" align="center"> 
		<?php
		//jika data tidak ditemukan
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


