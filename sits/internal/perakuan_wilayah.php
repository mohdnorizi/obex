<?php
	session_start();
	include("../include/db.php");
	include "../include/function.php";
 	
	extract($_REQUEST);
	
 	if($act == "edit"){
		$sql2 = mysql_query("select *from perakuan_wilayah where appinfo = '".$_SESSION['appinfo']."' and id='$id_wilayah'");
		$result2 =mysql_fetch_array($sql2);
	}
	if($act == "del"){
		$sql = mysql_query("delete from perakuan_wilayah where id = $id");
		header("location:perakuan_wilayah.php?id=".$_SESSION['appinfo']."");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../datepicker/Scripts/DateTimePicker.js" type="text/javascript"></script>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
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
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<?php include("sub_menu.php"); ?>
<h2>PERAKUAN KETUA WILAYAH UNTUK KELULUSAN PERMOHONAN</h2>
<hr color="#333333" />
<form action="perakuan_wilayah.php" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
      <td class="label"><div align="right">KEPUTUSAN PERMOHONAN</div></td>
      <td>: <input name="kelulusan" value="LULUS" type="radio" <?php if($result2['kelulusan']=="LULUS"){echo checked;} ?>   />
        &nbsp;LULUS&nbsp;
        <input name="kelulusan" value="DITOLAK" type="radio" <?php if($result2['kelulusan']=="DITOLAK"){echo checked;} ?>   />
        &nbsp;TOLAK</td>
    </tr>
<tr>
      <td width="20%" class="label"><div align="right">LOT DILULUS</div></td>
    <td colspan="2">: <input size="35" name="lot_lulus" type="text" value="<?php echo $result2['lot_lulus']; ?>" /></td>
</tr>
<tr>
      <td width="20%" class="label"><div align="right">LUAS DILULUS</div></td>
    <td colspan="2">: <input size="15" name="luas_dilulus" type="text" value="<?php echo $result2['luas_dilulus']; ?>" /> Ha</td>
</tr>
<tr>
      <td width="20%" class="label"><div align="right">TARIKH KEPUTUSAN</div></td>
    <td colspan="2">: <input size="15" type="text" id="tarikh_lulus" name="tarikh_lulus" readonly="readonly" value="<?php echo $result2['tarikh_lulus']; ?>">
                        <img src="../datepicker/Image/cal.gif" style="cursor: pointer;" onclick="javascript:NewCssCal ('tarikh_lulus','yyyyMMdd')"  /></td>
</tr>

<tr>
      <td class="label" valign="bottom"><div align="right">CATATAN </div></td>
      <td colspan="2"> : 
        <textarea name="catatan" rows="4" cols="30"><?php echo $result2['catatan']; ?></textarea>
        <input type="hidden" name="id_wilayah" value="<?php echo $result2['id']; ?>" />
        <input type="hidden" name="act" value="<?php echo $act; ?>" /></td>
</tr>
<tr>
  <td class="label" valign="bottom">&nbsp;</td>
  <td colspan="2"><input name="cancel" value="Cancel" type="button" onClick="location='perakuan_wilayah.php?id=<?php echo $_SESSION['appinfo']; ?>'" style="padding:1px;" /><input value="Simpan Permohonan" name="submit" type="submit" style="padding:1px;"  /></td>
</tr>
</table>
<br>
<br>
</form>


<table class="hovertable" width="100%">
	<tr>
	  <th width="75" class="sectiontableheader">KEPUTUSAN PERMOHONAN</th>
      <th width="112" class="sectiontableheader">LOT DILULUS</th>
      <th width="147" class="sectiontableheader">LUAS DILULUS</th>
      <th width="122" class="sectiontableheader">TARIKH KEPUTUSAN</th>
      <th width="115" class="sectiontableheader">CATATAN</th>
     
     
      <th width="69" class="sectiontableheader">ACTION</th>
  </tr>
   <?php
		
		$sql = mysql_query("select * from perakuan_wilayah where appinfo = '".$_SESSION['appinfo']."'");
		$row=mysql_num_rows($sql);
		
		if($row>0){
		while($result =mysql_fetch_array($sql)){
	?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td class="sectiontableheader"><?php echo $result['kelulusan'];?></td>
	  <td class="sectiontableheader"><?php echo $result['lot_lulus']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['luas_dilulus']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['tarikh_lulus']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['catatan']; ?></td>
	  
	  
	  <td class="sectiontableheader" align="center"><a href="perakuan_wilayah.php?id=<?php echo $_SESSION['appinfo']; ?>&act=edit&id_wilayah=<?php echo $result['id']; ?>"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="perakuan_wilayah.php?id=<?php echo $result['id']; ?>&act=del&id_mak=<?php echo $result['id']; ?>"><img src="images/b_drop.png" width="16" height="16" border="0" /></a></td>
  </tr>
   <?php }}else{ ?>
	<tr onmouseover="this.style.backgroundColor='#FFFFCC';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td height="23" colspan="13" align="center">-- Rekod Tidak Dijumpai --</td>
	  </tr>
   <?php } ?>
</table>		
		

	
<?php

if($_POST['submit']){

extract($_REQUEST);
if($act == ""){

	$sql3="INSERT INTO perakuan_wilayah(kelulusan,lot_lulus, luas_dilulus,tarikh_lulus,catatan,appinfo)
	VALUES('$kelulusan','$lot_lulus','$luas_dilulus','$tarikh_lulus','$catatan','".$_SESSION['appinfo']."')";
	$result3=mysql_query($sql3);
		if($result3){
			echo "<script type='text/javascript'>";
			echo "alert('Data Telah Disimpan')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0; url=perakuan_wilayah.php?id=".$_SESSION['appinfo']."'>";
		}
}
if($act=="edit"){
		
		$result4 = mysql_query("update perakuan_wilayah set kelulusan='$kelulusan',lot_lulus='$lot_lulus',luas_dilulus='$luas_dilulus',tarikh_lulus='$tarikh_lulus',catatan='$catatan' where appinfo='".$_SESSION['appinfo']."' and id='$id_wilayah'");
		
			if($result4){
				echo "<script type='text/javascript'>";
				echo "alert('Kemaskini Berjaya')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0; url=perakuan_wilayah.php?id=".$_SESSION['appinfo']."'>";
			}
	}
}


?>

</body>
</html>
<script src="../datepicker/Scripts/DateTimePicker.js" type="text/javascript"></script>
