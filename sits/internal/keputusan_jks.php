<?php
	session_start();
	include("../include/db.php");
	$appinfo = $_GET['id'];
	//echo "---------->".$appinfo;
	$_SESSION['appinfo'] = $appinfo;
	//echo "session---------->".$_SESSION['appinfo'];
	$sql = mysql_query("select * from keputusan_jks where appinfo = '".$_SESSION['appinfo']."'");
	$result = mysql_fetch_array($sql);
	
	
	$que = mysql_query("select * from keputusan_jks where appinfo = '".$_GET['id']."'");
	$check = mysql_num_rows($que);
//echo "--------->".$check;		
	if($check>0){
		$sql2 = mysql_query("select * from keputusan_jks where appinfo = '".$_SESSION['appinfo']."'");
		$result2 = mysql_fetch_array($sql2);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="css/datetimepicker_css.js"></script>
<style type="text/css">
body {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
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
<?php include("sub_menu.php"); ?>

<h2>KEPUTUSAN JKS</h2>
<hr color="#333333" />
<form method="post" action="keputusan_jks.php">
<table border="0" cellpadding="2" cellspacing="2">

    <tr>
      <td class="label"><div align="right">KEPUTUSAN</div></td>
      <td>: <input name="keputusan_jks" value="LULUS" type="radio" <?php if(!empty($result['keputusan_jks'])){ if($result['keputusan_jks']=='LULUS'){echo checked;} }?> />
        &nbsp;LULUS SITS&nbsp;
        <input name="keputusan_jks" value="TOLAK" type="radio" <?php if($result['keputusan_jks']=='TOLAK'){echo checked;} ?> />
        &nbsp;TOLAK SITS</td>    </tr>
        
         <tr>
      <td class="label"><div align="right">TARIKH KEPUTUSAN</div></td>
      <td colspan="2">: <input size="10" id="tarikh_keputusan" maxlength="10" name="tarikh_keputusan" type="text" value="<?php echo $result['tarikh_keputusan']; ?>"/>
        <img src="images/cal.gif" onclick="javascript:NewCssCal('tarikh_keputusan')" style="cursor:pointer"/>
        &nbsp;<font color="red">*</font>
        </td>
    </tr>
    <tr>
      <td width="20%" class="label"><div align="right">LUAS DILULUSKAN</div></td>
    <td colspan="2">: <input size="15" name="luas_diluluskan" type="text" value="<?php echo number_format($result2['luas_diluluskan'],4); ?>" /> Ha</td>
</tr>
    <tr>
      <td class="label" valign="bottom"><div align="right">CATATAN</div></td>
      <td colspan="2" valign="top"> : 
        <textarea name="catatan" type="text" rows="4" cols="30" ><?php echo $result2['catatan']; ?></textarea>
        
      </td>
</tr>
<tr>
  <td class="label" valign="bottom">&nbsp;</td>
  <td colspan="2" valign="top">
  <input name="id" value="<?php echo $result2['id']; ?>" type="hidden"  />
   <input name="appinfo" value="<?php echo $_SESSION['appinfo']; ?>" type="hidden"  />
  <input name="cancel" value="Cancel" type="button" onClick="location='keputusan_jks.php?id=<?php echo $_SESSION['appinfo']; ?>'" />
  <input value="Simpan Rekod" name="submit" type="submit" style="padding:1px;"  /></td>
</tr>
</table>
</form>
<?php

if($_POST['submit']){

extract($_REQUEST);

$que = mysql_query("select * from keputusan_jks where appinfo = '".$appinfo."'");
	$check = mysql_num_rows($que);
	
//echo "--------->check".$check;	
if($check > 0){

	
	$result4 = mysql_query("update keputusan_jks set keputusan_jks='$keputusan_jks', tarikh_keputusan='$tarikh_keputusan', luas_diluluskan='$luas_diluluskan', catatan='$catatan' where appinfo='".$_SESSION['appinfo']."'");

		echo "<script type='text/javascript'>";
		echo "alert('Maklumat Berjaya Disimpan')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0; url=keputusan_jks.php?id=".$_SESSION['appinfo']."'>";
//echo "update";

}else{


$sql3="INSERT INTO keputusan_jks(keputusan_jks,appinfo,tarikh_keputusan,luas_diluluskan,catatan)

VALUES('$keputusan_jks','".$appinfo."','$tarikh_keputusan','$luas_diluluskan','$catatan')";
$result=mysql_query($sql3);

	
		echo "<script type='text/javascript'>";
		echo "alert('Success')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0; url=keputusan_jks.php?id=".$_SESSION['appinfo']."&id_mak=$id_mak'>";
	//echo "insert";
}
	
}


?>
</body>
</html>
