<?php
	session_start();
	include("../include/db.php");
	include "../include/function.php";
	$appinfo = $_GET['id'];
	
	$_SESSION['appinfo'] = $appinfo;
	
	$sql = mysql_query("select * from makkebun where appinfo = '".$_SESSION['appinfo']."'");
	$result = mysql_fetch_array($sql);
	
	if($_GET['act']=='del'){
	
	$id_mak = $_GET['id_mak'];
	$id_app = $_SESSION['id'];
	
	$sql = mysql_query("delete from makkebun where id_makkebun = $id_mak");
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

<h2>MAKLUMAT KEBUN</h2>
<hr color="#333333" />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="100%" align="right" bgcolor="#fff"><a href="tambah_kebun.php">Tambah Kebun</a>&nbsp;&nbsp;</td>
  </tr>
</table>
<table class="hovertable" width="100%">
	<tr>
	  <th width="75" class="sectiontableheader">NO LOT</th>
      <th width="112" class="sectiontableheader">NO HAK MILIK TANAH</th>
      <th width="147" class="sectiontableheader">NEGERI</th>
      <th width="122" class="sectiontableheader">DAERAH</th>
      <th width="115" class="sectiontableheader">MUKIM</th>
      <th width="139" class="sectiontableheader">KELUASAN LOT (HA)</th>
      <th width="135" class="sectiontableheader">KELUASAN TANAMAN SAWIT (HA)</th>
      <th width="88" class="sectiontableheader">UMUR POKOK</th>
      <th width="153" class="sectiontableheader">HASIL/HEKTAR/SETAHUN</th>
      <th width="69" class="sectiontableheader">ACTION</th>
  </tr>
   <?php
		
		$sql = mysql_query("select *from makkebun where appinfo = '".$_SESSION['appinfo']."'");
		$row=mysql_num_rows($sql);
		if($row>0){
		while($result =mysql_fetch_array($sql)){
	?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td class="sectiontableheader"><?php echo $result['nolot']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['no_milik_tanah']; ?></td>
	  <td class="sectiontableheader"><?php echo getNegeri($result['negeri']); ?></td>
	  <td class="sectiontableheader"><?php echo getDaerahKebun($result['daerah']); ?></td>
	  <td class="sectiontableheader"><?php echo getMukim($result['mukim']); ?></td>
	  <td class="sectiontableheader"><?php echo $result['keluasan_lot']; ?></td>
	  <td class="sectiontableheader"><?php echo $result['keluasan_tanam']; ?></td>
	  <td class="sectiontableheader" align="center"><?php echo $result['umur']; ?></td>
	  <td class="sectiontableheader" align="center"><?php echo $result['hasil_setahun']; ?></td>
	  <td class="sectiontableheader" align="center"><a href="edit_kebun.php?id=<?php echo $_SESSION['appinfo']; ?>&act=edit&id_mak=<?php echo $result['id_makkebun']; ?>"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="maklumat_kebun.php?id=<?php echo $_SESSION['appinfo']; ?>&act=del&id_mak=<?php echo $result['id_makkebun']; ?>"><img src="images/b_drop.png" width="16" height="16" border="0" /></a></td>
  </tr>
   <?php }}else{ ?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td height="23" colspan="13" align="center">-- Rekod Tidak Dijumpai --</td>
	  </tr>
   <?php } ?>
</table>
</table>
<?php
	if($_GET['act']=='del'){
		
	$id_mak = $_GET['id_mak'];
	$id_app = $_SESSION['id'];
	
	$sql = mysql_query("delete from makkebun where id_makkebun = $id_mak");

}
?>
</body>
</html>
