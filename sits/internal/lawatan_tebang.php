<?php
	session_start();
	include("../include/db.php");
	include "../include/function.php";
	
	extract($_REQUEST);
	
 	if($act == "edit"){
		$sql2 = mysql_query("select *from lawatan_tebang where appinfo = '".$_SESSION['appinfo']."' and id='$id_lawat'");
		$result2 =mysql_fetch_array($sql2);
	}
	if($act == "del"){
		$sql = mysql_query("delete from lawatan_tebang where id = $id_lawat");
		header("location:lawatan_tebang.php?id=".$_SESSION['appinfo']."");
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

<form action="lawatan_tebang.php" method="post">
<h2>LAWATAN PERTAMA/PENGESAHAN KEBUN</h2>
<hr color="#333333" />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
      <td class="label"><div align="right">MAKLUMAT PENEBANGAN</div></td>
      <td>: <input name="maklumat_penebangan" value="1" type="radio" <?php if($result2['maklumat_penebangan']=="1"){echo checked;} ?>  />
        &nbsp;SEBAHAGIAN&nbsp;
        <input name="maklumat_penebangan" value="2" type="radio" <?php if($result2['maklumat_penebangan']=="2"){echo checked;} ?>  />
        &nbsp;SEPENUHNYA&nbsp;
        <input name="maklumat_penebangan" value="3" type="radio" <?php if($result2['maklumat_penebangan']=="3"){echo checked;} ?>  />
        &nbsp;BELUM TEBANG</td>
    </tr>
    
<tr>
      <td><div align="right">KAEDAH PENEBANGAN</div></td>
      <td>: <select size="1" name="amalan_penebangan">
        <option value="0">--SILA PILIH--</option>
        <option value="1" <?php if($result2['amalan_penebangan']==1){echo selected;} ?>>TEBANG</option>
        <option value="2" <?php if($result2['amalan_penebangan']==2){echo selected;} ?>>RACIK</option>
        <option value="3" <?php if($result2['amalan_penebangan']==3){echo selected;} ?>>RACUN</option>
        <option value="4" <?php if($result2['amalan_penebangan']==4){echo selected;} ?>>UNDER PLANTING</option>
        
      </select></td>
</tr>    
<tr>
      <td width="20%" class="label"><div align="right">TARIKH PENEBANGAN</div></td>
    <td colspan="2">: <input size="15" type="text" id="tarikh_penebangan" name="tarikh_penebangan" readonly="readonly" value="<?php echo $result2['tarikh_penebangan']; ?>">
                        <img src="../datepicker/Image/cal.gif" style="cursor: pointer;" onclick="javascript:NewCssCal ('tarikh_penebangan','yyyyMMdd')"  /></td>
</tr>
<tr>
      <td width="20%" class="label"><div align="right">LUAS DIUKUR</div></td>
    <td colspan="2">: <input size="15" name="luas_diukur" type="text" value="<?php echo $result2['luas_diukur']; ?>" /> Ha</td>
</tr>
<tr>
      <td width="20%" class="label"><div align="right">LUAS CADANG DILULUSKAN </div></td>
    <td colspan="2">: <input size="15" name="luas_diluluskan" type="text" value="<?php echo $result2['luas_diluluskan']; ?>" /> Ha</td>
</tr>

<tr>
      <td class="label"><div align="right">TARIKH DAN MASA LAWATAN</div></td>
      <td colspan="2">: <input size="15" type="text" id="tarikh_lawatan" name="tarikh_lawatan" readonly="readonly" value="<?php echo $result2['tarikh_lawatan']; ?>">
                        <img src="../datepicker/Image/cal.gif" style="cursor: pointer;" onclick="javascript:NewCssCal('tarikh_lawatan','yyyyMMdd','dropdown',true,'12')"  /> </td>
</tr>

<tr>
      <td class="label"><div align="right">NAMA PEGAWAI MEMBUAT LAWATAN</div></td>
      <td colspan="2">: <input size="40" name="pegawai_lawat" type="text" value="<?php echo $result2['pegawai_lawat']; ?>" /></td>
</tr>

<tr>
      <td class="label" valign="bottom"><div align="right">CATATAN LAWATAN</div></td>
      <td colspan="2" valign="top"> : 
        <textarea name="catatan" type="text" rows="4" cols="30" ><?php echo $result2['catatan']; ?></textarea><input type="hidden" name="id_lawat" value="<?php echo $result2['id']; ?>" /><input type="hidden" name="act" value="<?php echo $act; ?>" /></td>
</tr>
<tr>
  <td class="label" valign="bottom">&nbsp;</td>
  <td colspan="2" valign="top"><input name="cancel" value="Cancel" type="button" onClick="location='lawatan_tebang.php?id=<?php echo $_SESSION['appinfo']; ?>'" /><input value="Simpan Rekod" name="submit" type="submit" style="padding:1px;"  /></td>
</tr>
</table>
<br>
</form>

<table class="hovertable" width="100%">
	<tr>
	<!--  <th width="75" class="sectiontableheader">NO LAWAT</th> -->
      <th width="112" class="sectiontableheader">MAKLUMAT PENEBANGAN</th>
      <th width="147" class="sectiontableheader">KAEDAH PENEBANGAN</th>
      <th width="122" class="sectiontableheader">TARIKH PENEBANGAN</th>
      <th width="115" class="sectiontableheader">LUAS DIUKUR</th>
      <th width="139" class="sectiontableheader">LUAS DICADANG (HA)</th>
      <th width="135" class="sectiontableheader">TARIKH DAN MASA LAWATAN</th>
       <th width="135" class="sectiontableheader">NAMA PEGAWAI YANG MEMBUAT LAWATAN</th>
      <th width="88" class="sectiontableheader">CATATAN LAWATAN</th>
     
      <th width="69" class="sectiontableheader">ACTION</th>
  </tr>
   <?php
		
		$sql = mysql_query("select * from lawatan_tebang where appinfo = '".$_SESSION['appinfo']."'");
		$row=mysql_num_rows($sql);
		if($row>0){
		while($result =mysql_fetch_array($sql)){
	?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
<!--	  <td class="sectiontableheader"><?php //echo $result['lot_lawat']; ?></td> -->
	  <td class="sectiontableheader"><?php 
	  $maklumat_penebangan = $result['maklumat_penebangan']; 
	  if($maklumat_penebangan==1){
		  echo "SEBAHAGIAN";
	  }else if($maklumat_penebangan==2){
		  echo "SEPENUHNYA";
	  }else{
		  echo "BELUM TEBANG";
	  }
	   ?></td>
	  <td class="sectiontableheader"><?php  
	  $amalan_penebangan = $result['amalan_penebangan']; 
	  if($amalan_penebangan==1){
		  echo "TEBANG";
	  }else if($amalan_penebangan==2){
		  echo "RACIK";
	  }else if($amalan_penebangan==3){
		  echo "RACUN";
	  }else if($amalan_penebangan==4){
		  echo "UNDER PLANTING";
	  }
	  else{}
	  ?></td>
	  <td class="sectiontableheader"><?php echo $result['tarikh_penebangan']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['luas_diukur']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['luas_diluluskan']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['tarikh_lawatan']; ?></td>
      <td class="sectiontableheader"><?php echo $result['pegawai_lawat']; ?></td>
	  <td class="sectiontableheader" align="center"><?php echo $result['catatan']; ?></td>
	  
	  <td class="sectiontableheader" align="center"><a href="lawatan_tebang.php?id=<?php echo $_SESSION['appinfo']; ?>&act=edit&id_lawat=<?php echo $result['id']; ?>"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="lawatan_tebang.php?id_lawat=<?php echo $result['id']; ?>&act=del"><img src="images/b_drop.png" width="16" height="16" border="0" /></a></td>
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
	
		$sql3="INSERT INTO lawatan_tebang(appinfo,lot_lawat, maklumat_penebangan, amalan_penebangan, tarikh_penebangan, luas_diukur, luas_diluluskan, tarikh_lawatan, pegawai_lawat, catatan)
		
		VALUES('".$_SESSION['appinfo']."','$lot_lawat','$maklumat_penebangan','$amalan_penebangan','$tarikh_penebangan','$luas_diukur','$luas_diluluskan','$tarikh_lawatan','$pegawai_lawat','$catatan')";
		$result3=mysql_query($sql3);
		
			if($result3){
				echo "<script type='text/javascript'>";
				echo "alert('Rekod Disimpan')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0; url=lawatan_tebang.php?id=".$_SESSION['appinfo']."&id_mak=$id_mak'>";
			}
	}
	
	if($act=="edit"){
		
		$result4 = mysql_query("update lawatan_tebang set lot_lawat='$lot_lawat',maklumat_penebangan='$maklumat_penebangan',amalan_penebangan='$amalan_penebangan',tarikh_penebangan='$tarikh_penebangan',luas_diukur='$luas_diukur',luas_diluluskan='$luas_diluluskan',tarikh_lawatan='$tarikh_lawatan',pegawai_lawat='$pegawai_lawat',catatan='$catatan' where appinfo='".$_SESSION['appinfo']."' and id='$id_lawat'");
		
			if($result4){
				echo "<script type='text/javascript'>";
				echo "alert('Kemaskini Berjaya')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0; url=lawatan_tebang.php?id=".$_SESSION['appinfo']."'>";
			}
	}
}


?>

</body>
</html>
<script src="../datepicker/Scripts/DateTimePicker.js" type="text/javascript"></script>

