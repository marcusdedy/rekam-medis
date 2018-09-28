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
<html>
<head>
	<title>Medical Records Application</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_popupMsg(msg) { 
  alert(msg);
}
function MM_openBrWindow(theURL,winName,features) {
  window.open(theURL,winName,features);
}
</script>
        
</head>
<body>
<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="397" height="115" align="left" bgcolor="#FFFFFF"><img src="image/medical-logo-png-5.png" width="230" height="150"/></td>
        <td width="567" align="right" bgcolor="#FFFFFF"><img src="image/home-head.png" width="750" height="112"></td>
	</tr>
</table>
<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td><hr></td>
	</tr>
</table>

<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#F8F8FF" height="32">
		<td width="10" height="50" bgcolor="#FFFFFF">&nbsp;</td>
	  <th width="944" height="22" align="center" valign="middle" bgcolor="#FFFFFF">
      
        <ul id="MenuBar1" class="MenuBarHorizontal">
        	<li><a href="home-user.php?page=home-user&mu_username=<?=$_SESSION['mu_username']?>" title="Home">Home</a></li>
        	<li><a href="#" class="MenuBarItemSubmenu">Master</a>
	          	<ul>
	              <li><a href="home-user.php?page=form-ms-user&mu_username=<?=$_SESSION['mu_username']?>">MS User</a></li>
	              <li><a href="home-user.php?page=form-ms-dokter&mu_username=<?=$_SESSION['mu_username']?>">MS Poly + Doctor</a></li>
	            </ul>
          	</li>
        	<li><a href="#" class="MenuBarItemSubmenu">Transaction</a>
            	<ul> 
            		<li><a href="home-user.php?page=form-view-pendaftaran&mu_username=<?=$_SESSION['mu_username']?>">Patient Registration</a></li>
            		<li><a href="home-user.php?page=form-view-periksa&mu_username=<?=$_SESSION['mu_username']?>">Patient Check Up</a></li>
            		<li><a href="home-user.php?page=form-view-resep&mu_username=<?=$_SESSION['mu_username']?>">Prescription</a></li>
					<li><a href="home-user.php?page=form-view-pembayaran&mu_username=<?=$_SESSION['mu_username']?>">Payment</a></li>
            	</ul>
          	</li>
          	<li><a href="#" title="Utility" class="MenuBarItemSubmenu">Utility</a>
            <ul>
            	<li><a href="home-user.php?page=software-information&mu_username=<?=$_SESSION['mu_username']?>" title="Change Password">Software Information</a></li>
              	<li><a href="home-user.php?page=form-ganti-password&mu_username=<?=$_SESSION['mu_username']?>" title="Change Password">Change Password</a></li>
              	<li><a href="login-user/logout.php" title="Log Out">Log Out</a></li>
            </ul>
          </li>
                  </ul>
                
		</td>
		<td width="10" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
</table>
<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#F8F8FF">
		<td bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
</table>
<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#F8F8FF">
		<td width="10" bgcolor="#FFFFFF">&nbsp;</td>
		<td rowspan="4" valign="top" bgcolor="#FFFFFF">
			<table width="1228" height="auto" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
				<tr height="36" width="938">
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF"><strong><?php echo "Date : ".date("d-M-y");?></strong>&nbsp;&nbsp;&nbsp;&nbsp;Welcome <u><strong> <?=$_SESSION['mu_name']?></strong></u></font></td>
				</tr>
				<tr>
					<td width="938" align="center" valign="middle">
						<?php
						$page = (isset($_GET['page']))? $_GET['page'] : "main";
						switch ($page) {
							case 'form-view-pendaftaran' : include "form-view-pendaftaran.php"; break;
							case 'proses-pendaftaran' : include "proses-pendaftaran.php"; break;
							case 'form-view-periksa' : include "form-view-periksa.php"; break;
							case 'form-periksa' : include "form-periksa.php"; break;
							case 'proses-periksa' : include "proses-periksa.php"; break;
							case 'form-view-resep' : include "form-view-resep.php"; break;
							case 'form-resep' : include "form-resep.php"; break;
							case 'proses-resep' : include "proses-resep.php"; break;
							case 'form-view-pembayaran' : include "form-view-pembayaran.php"; break;
							case 'form-pembayaran' : include "form-pembayaran.php"; break;
							case 'proses-pembayaran' : include "proses-pembayaran.php"; break;
							case 'form-ganti-password' : include "form-ganti-password.php"; break;
							case 'proses-update-password' : include "proses-ganti-password.php"; break;
							case 'proses-hapus-pendaftaran' : include "proses-hapus-pendaftaran.php"; break;
							case 'proses-edit-pendaftaran' : include "proses-edit-pendaftaran.php"; break;
							case 'form-ms-dokter' : include "form-ms-dokter.php"; break;
							case 'form-buat-ms-dokter' : include "form-buat-ms-dokter.php"; break;
							case 'proses-buat-ms-dokter' : include "proses-buat-ms-dokter.php"; break;
							case 'proses-hapus-dokter' : include "proses-hapus-dokter.php"; break;
							case 'form-ms-user' : include "form-ms-user.php"; break;
							case 'form-buat-ms-user' : include "form-buat-ms-user.php" ; break;
							case 'proses-buat-ms-user' : include "proses-buat-ms-user.php"; break;
							case 'proses-hapus-user' : include "proses-hapus-user.php"; break;
							case 'software-information' : include "software-information.php"; break;
							case 'main' :
							default : include 'about-login.php';	
						}
						?></td>	
				</tr>
			</table>
		</td>
		<td width="10" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
</table>
<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#F8F8FF">
		<td width="1106" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
</table>
<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#B0C4DE">
		<td width="1101" height="36" colspan="5" bgcolor="#0000FF"><div align="right" style="margin:0 12px 0 0;"><font color="#FFFFFF"><strong>Copyright &copy; 2018. By Marcus Dedy</strong></font><br></div></td>
	</tr>
</table>
<div align="center"></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</div>
</html>