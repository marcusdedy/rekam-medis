<?php
    session_start();

    $mu_username = $_POST['mu_username'];
    $mu_password = md5($_POST['mu_password']); 
    $koneksi=mysql_connect("localhost", "root", "cahbagoes");
    $db=mysql_select_db("medical_records",$koneksi);


    $query = "SELECT * FROM mr_ms_user WHERE mu_username = '$mu_username'";
    $hasil = mysql_query($query) or die("Error");
    $data  = mysql_fetch_array($hasil);

    if ($data['mu_username'] && $mu_password==$data['mu_password']){

        // jika sesuai, maka buat session
            $_SESSION['mu_username'] = $data['mu_username'];
    		$_SESSION['mu_name'] = $data['mu_name'];
            $_SESSION['mu_access'] = $data['mu_access'];
            if($data['mu_access']=="U"){
                header("location:../home-user.php");
            }else if($data['mu_access']=="U"){
                header("location:../home-admin.php");
            }
    }
    else{
    		?>
    		<script language="JavaScript">
    			alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
    			document.location='../index.php';
    		</script>
    		<?php
        }
?>