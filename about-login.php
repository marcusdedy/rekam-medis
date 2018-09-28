<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<style type="text/css">
		body {
			background-image: url();
		}
		</style>
	</head>
	<body>
		<div style="border: 0; padding: 10px; width: 1100px; height: 360px; background-image: url(image/page-ps.png);">

		<center>
			<div id="content">
				<table width="394" cellpadding="0" cellspacing="5" bgcolor= "#B0C4DE">
					<tr height="36" bgcolor="#F8F8FF">
						<th width="470" colspan="5" bgcolor="#FFFFFF"><font color="#0000FF">Your Login Detail</font></th>
					</tr>
					<tr>
						<td height="94" >
							<table width="384" >
								<tr>
									<td width="112" rowspan="3" align="right"><img src="image/login.png" width="92" height="82" /></td>
									<td height="21" align="left" valign="middle" style="vertical-align: top"><strong>Username</strong></td>
									<td align="left" valign="middle" style="vertical-align: top"><strong>:</strong></td>
									<td align="left" valign="middle" style="vertical-align: top"><strong><?php echo $_SESSION['mu_username'];?></strong></td>
								</tr>
								<tr>
									<td height="21" align="left" valign="middle" style="vertical-align: top"><strong>Name</strong></td>
									<td align="left" valign="middle" style="vertical-align: top"><strong>:</strong></td>
									<td align="left" valign="middle" style="vertical-align: top"><strong><?php echo $_SESSION['mu_name'];?></strong></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</center>
		</div>
	</body>
</html>