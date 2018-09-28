
<?php
include "config.php";
?>

    <h6><font color="orange" size="5"><u>MS User</u></font>       <u>
    <left></left>
    </u></h6>
<form action="home-user.php?page=form-ms-user&mu_username=<?=$_SESSION['mu_username']?>" method="post" name="postform">
  <table width="546" border="0" align="left">
<tr>
  <td width="69">&nbsp;</td>
    <td width="159">Search Name</td>
    <td width="304" colspan="2"><input type="text" name="mu_name" value="<?php if(isset($_POST['mu_name'])){ echo $_POST['mu_name']; }?>"/></td>
</tr>

<tr>
  <td align="center" >&nbsp;</td>
    <td align="center" ><a href="javascript:void(0);"
    onclick="window.open('form-buat-ms-user.php','nama_window_pop_up','height = 400, width = 950, resizable = 0')">++ New User</a></td>
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
	
	$mu_name=$_POST['mu_name'];

	
	if(empty($mu_name) ){
		$Tampil=mysql_query("select * from mr_ms_user");
		$jumlah=mysql_fetch_array(mysql_query("select count(mu_user_id) total from mr_ms_user"));
		
	}else{
		// create by Marcuz Dedy
		?>
		<?php
		
		$Tampil=mysql_query("select * from mr_ms_user where mu_name like '%$mu_name%'");
		$jumlah=mysql_fetch_array(mysql_query("select count(mu_user_id)total from mr_ms_poly where mu_name like '%$mu_name%'"));
	}
	
	?>
</p>

<table width="1206" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr bgcolor="#0066FF">
	<th width="9%"><font color="#FFFFFF"> No </font></td>&nbsp;
	  <th width="9%"><font color="#FFFFFF"> Id </font>      
	  <th width="29%"><font color="#FFFFFF"> Username </font>     
	  <th width="22%"><font color="#FFFFFF"> Nama </font>
      <th width="17%"><font color="#FFFFFF"> Tgl Buat </font>      
      <th width="14%"><font color="#FFFFFF"> Action </font></td>&nbsp; 
</tr>
	<?php
$no=0;
	
    while (	$hasil = mysql_fetch_array ($Tampil)) {
			$mu_user_id 		= stripslashes ($hasil['mu_user_id']);
			$mu_username		= stripslashes ($hasil['mu_username']);
			$mu_name			= stripslashes ($hasil['mu_name']);
			$mu_update_date 	= stripslashes ($hasil['mu_update_date']);
		{
	
?>
	
    <tr align="center">
    	<td height="19" bgcolor="#EEF2F7"><?php echo $no=$no+1; ?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$mu_user_id?></td>
    	<td align="center" bgcolor="#EEF2F7"><?=$mu_username?></td>
      	<td align="center" bgcolor="#EEF2F7"><?=$mu_name?><div align="center"></div></td>
      	<td align="center" bgcolor="#EEF2F7"><?=$mu_update_date?></td>
		<td bgcolor="#EEF2F7"><div align="center">
        <a href="home-user.php?page=proses-hapus-user&mu_user_id=<?=$mu_user_id?>">Delete</a></div></td>
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


