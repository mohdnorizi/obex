<?php
	session_start();
	include("include/db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Pengurusan Kursus eSPEK</title>
<link href="../bg/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/background.gif);
	background-repeat: repeat;
	background-color: #CCCCCC;
}
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
}

-->
.body {
	
	text-align:center;
	background-repeat:no-repeat;
	background-image:url(images/bg-index.jpg);
	background-position:center;
	background-repeat:no-repeat;
	margin-top:50px;
	background-color: #FFFFFF;
	width: 800px;
	height:500px;
	box-shadow: 0px 0px 8px #000000; 
	-webkit-box-shadow: 0px 0px 8px #000000; 
	-moz-box-shadow: 0px 0px 8px #000000;
	margin-left:255px;
	border-radius: 9px;
		-webkit-border-radius: 9px;
		-moz-border-radius: 9px;
	text-decoration: none;
	padding: 10px;
	/*border:1px solid #D6EEFB;*/
}
#bottom {

	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#003300;
	clear: both;
	margin-top:460px;
}
#apDiv3 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 763px;
	top: 331px;
}
.style13 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style15 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; font-style: italic; }
</style></head>

<body>
<div class="body" align="center">

<div id="apDiv3">
  <form method="post" action="">
  <table width="300" border="0" cellspacing="1" cellpadding="1">

    <tr>
      <td align="left"><span class="style13"><strong><u>Login SITS</u></strong></span></td>
      <td> </td>
    </tr>
    <tr>
      <td width="138" align="left"><span class="style13">ID Pengguna</span></td>
      <td width="155">
          : 
          <input name="username" type="text" id="username" size="19" />      </td>
    </tr>
    <tr>
      <td align="left"><span class="style13">Kata Laluan</span></td>
      <td>: 
          <input name="password" type="password" id="password" size="19" />      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Log Masuk" /></td>
      </tr>
  </table>
  </form></div>
<div id="bottom">
<a href = "http://sits.mpob.gov.my/sits2008/">SITS</a><br />
Selamat Datang Ke Sistem Maklumat bagi Skim Insentif Tanam Semula Kelapa Sawit.<br />Untuk maklumat lanjut, Sila hubungi:-
<strong>Object Expression Sdn Bhd</strong> Telefon No : 6 03 8940 8385 Email : <a href="whashim@objectexpression.com">whashim@objectexpression.com</a></div>
</div>
<?php
  if($_POST['submit']){
  		$myusername=$_POST['username'];	
		$mypassword=$_POST['password'];	

		$login=mysql_real_escape_string($myusername);
		$katalaluan=mysql_real_escape_string($mypassword);
		
		$passwords=md5($katalaluan);
		
		$check=mysql_query("SELECT * FROM pengguna WHERE id='$login' and password='$passwords' and akses = 0");
		$rows=mysql_num_rows($check);
		
		if($rows>0){
			$result = mysql_fetch_array($check);
			$username=$result['id'];
			$kategori=$result['kategori_pengguna'];
			$_SESSION['username']=$username;
			$_SESSION['kategori']=$kategori;
			echo "<meta http-equiv='refresh' content='0; url=internal/index.php'>";
		}
		else{
			echo "<script type='text/javascript'>";
			echo "alert('Log Masuk Gagal')";
			echo "</script>";
		}
  }
  ?>
</body>
</html>
