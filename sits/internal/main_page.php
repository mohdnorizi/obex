<?php
session_start();
include("../include/db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
.style1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div>
  <div align="left">Selamat Datang <strong><?php echo $_SESSION['username']; ?></strong> Ke Sistem Maklumat bagi Skim Insentif Tanam Semula Kelapa Sawit.<br />
    Untuk maklumat lanjut, Sila hubungi:- <br />
    <br />
    <strong>Object Expression Sdn Bhd</strong><br />
    Telefon No : 6 03 8940 8385<br />
    Email : <a href="whashim@objectexpression.com">whashim@objectexpression.com</a><a href="mailto:ikin@mpob.gov.my"></a> <br />
    <br />
    <br />
  </div>
</div>
Last Updated on THURSDAY, 30 MEI 2013 6:54 PM
</body>
</html>
