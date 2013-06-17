<?php
	session_start();
	include("../include/db.php");
	include "../include/function.php";
	
	extract($_REQUEST);
	
	if($act == 'edit'){
		$sql2 = mysql_query("select *from tempahan where appinfo = '".$_SESSION['appinfo']."' and id_tempahan='$id_tempah'");
		$result2 =mysql_fetch_array($sql2);
	}
	if($act == "del"){	
		$sql = mysql_query("delete from tempahan where appinfo='".$_SESSION['appinfo']."' and id_tempahan='$id_tempahan'");
	}
?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
-->
</style>

</head>

<body>
<?php include("sub_menu.php"); ?>
<h2>TEMPAHAN ANAK BENIH</h2>
<hr color="#333333" />
<form method="post" action="">
<table border="0" cellpadding="2" cellspacing="2">
<tr>
	<td width="166" align="right">NAMA PEMBEKAL</td>
	<td width="415">: &nbsp;<input value="<?php echo $result2['nama_pembekal']; ?>" name="supplier_name" size="50" type="text"></td>
</tr>
<tr>
	<td align="right">&nbsp;JUMLAH PESANAN</td>
	<td>: &nbsp;<input value="<?php echo $result2['jum_pesanan']; ?>" name="jum_pesanan" maxlength="10" size="10" id="seed_supply_volume" type="text"></td>
</tr>
<tr>
  <td align="right">SUDAH TEMPAH</td>
  <td>: &nbsp;<input name="sudah_tempah" value="YA" type="radio" <?php if($result2['status']=="YA"){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="sudah_tempah" value="TIDAK" type="radio" <?php if($result2['status']=="TIDAK"){echo checked;} ?> />
        &nbsp;TIDAK</td>
</tr>
<tr align="center">
	<td colspan="2"><input type="hidden" name="id_tempahan" value="<?php echo $result2['id_tempahan']; ?>" /><input type="hidden" name="act" value="<?php echo $act; ?>" />
	  <input name="cancel" value="Cancel" type="button" onClick="location='tempahan_anak_benih.php?id=<?php echo $_SESSION['appinfo']; ?>'" />	  <input name="submit" value="Simpan" type="submit"></td>
</tr>
</table>
</form>

<br>
<br>
<table class="hovertable" width="66%">
	<tr>
	  <th width="62" height="21">NO</th>
      <th width="371">NAMA PEMBEKAL</th>
      <th width="131">JUMLAH PESANAN</th>
      <th width="128">STATUS TEMPAH</th>
      <th width="75">&nbsp;</th>
  </tr>
  <?php
		$a=1;
		$sql = mysql_query("select *from tempahan where appinfo = '".$_SESSION['appinfo']."'");
		$row=mysql_num_rows($sql);
		if($row>0){
		while($result =mysql_fetch_array($sql)){
	?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td><?php echo $a++; ?></td>
	  <td><?php echo $result['nama_pembekal']; ?></td>
	  <td align="center"><?php echo $result['jum_pesanan']; ?></td>
	  <td><?php echo $result['status']; ?></td>
	  <td align="center"><a href="tempahan_anak_benih.php?id=<?php echo $_SESSION['appinfo']; ?>&act=edit&id_tempah=<?php echo $result['id_tempahan']; ?>"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="tempahan_anak_benih.php?id=<?php echo $_SESSION['appinfo']; ?>&act=del&id_tempahan=<?php echo $result['id_tempahan']; ?>"><img src="images/b_drop.png" width="16" height="16" border="0" /></a></td>
  </tr>
  <?php }}else{ ?>
	<tr onmouseover="this.style.backgroundColor='#FFFFCC';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td height="27" colspan="5" align="center" class="sectiontableheader">Tiada Tempahan Dibuat</td>
  </tr>
  <?php } ?>
</table>
<?php
if($_POST['submit']){

	extract($_REQUEST);
	if($act == ""){
		
		$sql3="INSERT INTO tempahan(nama_pembekal, jum_pesanan, status, appinfo)
		VALUES('$supplier_name','$jum_pesanan','$sudah_tempah','".$_SESSION['appinfo']."')";
		$result3=mysql_query($sql3);
		
			if($result3){
				echo "<script type='text/javascript'>";
				echo "alert('Tambah Tempahan Berjaya')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0; url=tempahan_anak_benih.php?id=".$_SESSION['appinfo']."'>";
			}
	}

	if($act == "edit"){
		
		$result4 = mysql_query("update tempahan set nama_pembekal='$supplier_name', jum_pesanan='$jum_pesanan', status='$sudah_tempah' where appinfo='".$_SESSION['appinfo']."' and id_tempahan='$id_tempahan'");
		
			if($result4){
				echo "<script type='text/javascript'>";
				echo "alert('Kemaskini Berjaya')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0; url=tempahan_anak_benih.php?id=".$_SESSION['appinfo']."'>";
			}
		
		}
	}

?>

</body>
</html>
