<?php
	session_start();
	include("../include/db.php");
	include "../include/function.php";
	
 	extract($_REQUEST);
	
	if($act == "edit"){
		$sql2 = mysql_query("select *from lawatan_tebang_kelulusan where appinfo = '".$_SESSION['appinfo']."' and id='$id_lawatan'");
		$result2 =mysql_fetch_array($sql2);
	}
	if($act=='del'){
		$sql = mysql_query("delete from lawatan_tebang_kelulusan where id = $id");
		header("location:lawatan_tebang_kelulusan.php?id='".$_SESSION['appinfo']."");
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

<form action="lawatan_tebang_kelulusan.php" method="post">
<h2>LAWATAN PENEBANGAN UNTUK KELULUSAN BAYARAN</h2>
<hr color="#333333" />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<!--
<tr>
      <td class="label"><div align="right">LOT LAWAT</div></td>
      <td colspan="2">: <input maxlength="40" size="40" name="lot_lawat" type="text" /></td>
</tr>
-->
<tr>
      <td width="25%" class="label"><div align="right">TARIKH TERIMA SURAT AKUAN TEBANG</div></td>
    <td width="75%" colspan="2">: <input type="text" id="tarikh_surat_akuan" name="tarikh_surat_akuan" readonly="readonly" size="20" value="<?php echo $result2['tarikh_surat_akuan']; ?>">
                        <img src="../datepicker/Image/cal.gif" style="cursor: pointer;" onclick="javascript:NewCssCal ('tarikh_surat_akuan','yyyyMMdd')"  /></td>
</tr>
<tr>
      <td width="25%" class="label"><div align="right">LUAS AKUAN TEBANG</div></td>
    <td colspan="2">: <input size="20" name="luas_akuan" type="text" value="<?php echo $result2['luas_akuan']; ?>" /> Ha</td>
</tr>

<tr>
      <td class="label"><div align="right">TARIKH DAN MASA LAWATAN</div></td>
      <td colspan="2">: <input type="text" id="tarikh_lawatan" name="tarikh_lawatan" readonly="readonly" size="20" value="<?php echo $result2['tarikh_lawatan']; ?>">
                        <img src="../datepicker/Image/cal.gif" style="cursor: pointer;" onclick="javascript:NewCssCal('tarikh_lawatan','yyyyMMdd','dropdown',true,'12')"  /> </td>
</tr>

<tr>
      <td width="25%" class="label"><div align="right">LUAS YANG LAYAK UNTUK SITS</div></td>
    <td colspan="2">: <input size="20" name="luas_sits" type="text" value="<?php echo $result2['luas_sits']; ?>" /> Ha</td>
</tr>

    
<tr>
      <td><div align="right">ASAS CADANG PEMBAYARAN</div></td>
      <td>: <select size="1" name="asas_pembayaran">
        <option value="0">--SILA PILIH--</option>
        <option value="PENGISTIARAN AGENS KERAJAAN" <?php if($result2['asas_pembayaran']=="PENGISTIARAN AGENS KERAJAAN"){echo selected;} ?>">PENGISTIARAN AGENS KERAJAAN</option>
        
        <option value="JURU UKUR" <?php if($result2['asas_pembayaran']=="JURU UKUR"){echo selected;} ?>" >JURU UKUR</option>
        
        <option value="PENGURUSAN PEGAWAI MPOB" <?php if($result2['asas_pembayaran']=="PENGURUSAN PEGAWAI MPOB"){echo selected;} ?>">PENGURUSAN PEGAWAI MPOB</option>
        
        <option value="BILANGAN POKOK" <?php if($result2['asas_pembayaran']=="BILANGAN POKOK"){echo selected;} ?>">BILANGAN POKOK</option>
        
      </select></td>
</tr>    

<tr>
      <td width="25%" class="label"><div align="right">NAMA PEGAWAI YANG MEMBUAT LAWATAN</div></td>
    <td colspan="2">: <input size="45" name="nama_peg_lawat" type="text" value="<?php echo $result2['nama_peg_lawat']; ?>" /></td>
</tr>



<tr>
      <td class="label" valign="bottom"><div align="right">CATATAN</div></td>
      <td colspan="2">: 
        <textarea name="catatan" type="text" rows="4" cols="33"><?php echo $result2['catatan']; ?></textarea><input type="hidden" name="id_lawatan" value="<?php echo $result2['id']; ?>" />
        <input type="hidden" name="act" value="<?php echo $act; ?>" /></td>
</tr>
<tr>
  <td class="label" valign="bottom">&nbsp;</td>
  <td colspan="2"><input name="cancel" value="Cancel" type="button" onClick="location='lawatan_tebang_kelulusan.php?id=<?php echo $_SESSION['appinfo']; ?>'" style="padding:1px;" /><input value="Simpan Rekod" name="submit" type="submit" style="padding:1px;"  /></td>
</tr>
</table>
<br>
</form>

<table class="hovertable" width="100%">
	<tr>
	<!--  <th width="75" class="sectiontableheader">NO LAWAT</th> -->
      <th width="112" class="sectiontableheader">TARIKH TERIMA SURAT AKUAN TEBANG</th>
      <th width="147" class="sectiontableheader">LUAS AKUAN TEBANG</th>
      <th width="122" class="sectiontableheader">TARIKH DAN MASA LAWATAN</th>
      <th width="115" class="sectiontableheader">LUAS YANG LAYAK UNTUK SITS</th>
      <th width="139" class="sectiontableheader">ASAS CADANG PEMBAYARAN</th>
     
       <th width="135" class="sectiontableheader">NAMA PEGAWAI YANG MEMBUAT LAWATAN</th>
      <th width="88" class="sectiontableheader">CATATAN LAWATAN</th>
     
      <th width="69" class="sectiontableheader">ACTION</th>
  </tr>
   <?php
		
		$sql = mysql_query("select * from lawatan_tebang_kelulusan where appinfo='".$_SESSION['appinfo']."'");
		$row=mysql_num_rows($sql);
		if($row>0){
		while($result =mysql_fetch_array($sql)){
	?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td class="sectiontableheader"><?php 
	  echo $result['tarikh_surat_akuan']; 
	  
	   ?></td>
	  <td class="sectiontableheader"><?php  echo number_format($result['luas_akuan'],4); ?></td>
	  <td class="sectiontableheader"><?php echo $result['tarikh_lawatan']; ?></td>
	  <td class="sectiontableheader"><?php echo number_format($result['luas_sits'],4); ?></td>
	  <td class="sectiontableheader"><?php echo $result['asas_pembayaran']; ?></td>
      <td class="sectiontableheader"><?php echo $result['nama_peg_lawat']; ?></td>
	  <td class="sectiontableheader" align="center"><?php echo $result['catatan']; ?></td>
	  
	  <td class="sectiontableheader" align="center"><a href="lawatan_tebang_kelulusan.php?id=<?php echo $_SESSION['appinfo']; ?>&act=edit&id_lawatan=<?php echo $result['id']; ?>"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="lawatan_tebang_kelulusan.php?id=<?php echo $result['id']; ?>&act=del&id_mak=<?php echo $result['id']; ?>"><img src="images/b_drop.png" width="16" height="16" border="0" /></a></td>
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
$sql3="INSERT INTO lawatan_tebang_kelulusan(appinfo,tarikh_surat_akuan,luas_akuan, tarikh_lawatan, luas_sits, asas_pembayaran, nama_peg_lawat, catatan)
VALUES('".$_SESSION['appinfo']."','$tarikh_surat_akuan','$luas_akuan','$tarikh_lawatan','$luas_sits','$asas_pembayaran','$nama_peg_lawat','$catatan')";

$result3=mysql_query($sql3);

	if($result3){
		echo "<script type='text/javascript'>";
		echo "alert('Data Telah Disimpan')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0; url=lawatan_tebang_kelulusan.php?id=".$_SESSION['appinfo']."'>";
	}
}
if($act=="edit"){
		$result4 = mysql_query("update lawatan_tebang_kelulusan set tarikh_surat_akuan='$tarikh_surat_akuan',luas_akuan='$luas_akuan', tarikh_lawatan='$tarikh_lawatan', luas_sits='$luas_sits', asas_pembayaran='$asas_pembayaran', nama_peg_lawat='$nama_peg_lawat', catatan='$catatan' where appinfo='".$_SESSION['appinfo']."' and id='$id_lawatan'");
		
			if($result4){
				echo "<script type='text/javascript'>";
				echo "alert('Kemaskini Berjaya')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0; url=lawatan_tebang_kelulusan.php?id=".$_SESSION['appinfo']."'>";
			}
	}
}


?>

</body>
</html>
<script src="../datepicker/Scripts/DateTimePicker.js" type="text/javascript"></script>

