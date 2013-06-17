<?php
	session_start();
	include("../include/db.php");
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
<form method="post" action="">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="3" bgcolor="#051954"><span class="style1">SENARAI PENGGUNA</span></td>
  </tr>
  <tr>
    <td width="11%" bgcolor="#fff">Kategori Pengguna</td>
    <td width="87%" bgcolor="#fff">:
      <select name="filter_type" id="filter_type" class="inputbox" size="1" onchange="document.adminForm.submit( );">
        <option value="" selected="selected">- Sila Pilih -</option>
        <option value="Ketua_Wilayah">Ketua_Wilayah</option>
        <option value="Kewangan">Kewangan</option>
        <option value="Jawatankuasa">Jawatankuasa</option>
        <option value="Pemeriksa">Pemeriksa</option>
        <option value="Penyelia Kewangan">Penyelia Kewangan</option>
        <option value="Penyelia">Penyelia</option>
        <option value="Pemproses Data PRE2">Pemproses Data PRE2</option>
        <option value="Pemproses_Data">Pemproses_Data</option>
        <option value="Pelawat">Pelawat</option>
    </select>
    <input type="text" name="key" id="key" />
    <input value="CARI" type="submit" /></td>
    <td width="2%" bgcolor="#fff">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#fff" align="right"><a href="tadbir_pengguna.php"><img src="images/icon-adduser.png" title="Daftar Penguna Baru" border="0"></a>&nbsp;&nbsp;<a href="#"><img src="images/icon-del.png" title="Padam Rekod" border="0"></a></td>
  </tr>
</table>
</form>
<hr />
<br />
<table class="hovertable" style="width: 100%">
	
	<tbody><tr>
		<th width="2%" class="sectiontableheader"></th>
	  <th width="36%" class="sectiontableheader">NAMA</th>
	  <th width="20%" class="sectiontableheader">WILAYAH</th>
	  <th width="14%" class="sectiontableheader">KATEGORI</th>
	  <th width="14%" class="sectiontableheader">EMAIL</th>
	  <th width="14%" class="sectiontableheader">STATUS</th>
		
	</tr>
    <?php
		$nom = 1;
		$type = $_POST['filter_type'];
		$key = $_POST['key'];
		$sql = mysql_query("select *from pengguna where kategori_pengguna like '%$type%' and nama like '%$key%'");
		$row=mysql_num_rows($sql);
		if($row>0){
		while($result =mysql_fetch_array($sql)){
	?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
		<td height="27" align="center"><?php echo $nom++; ?></td>
		<td><a href="edit_tadbir_pengguna.php?id=<?php echo $result['id_pengguna']; ?>"><?php echo $result['nama']; ?></a></td>
		<td><?php echo $result['wilayah']; ?></td>
		<td><?php echo $result['kategori_pengguna']; ?></td>
		<td><?php echo $result['email']; ?></td>
		<td><?php echo $result['akses']; ?></td>
	</tr>
    <?php }}else{ ?>
	<tr onmouseover="this.style.backgroundColor='#FFFFCC';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td height="27" colspan="6" align="center">-- Data Not Found --</td>
	  </tr>
    <?php } ?>
</tbody></table>
</body>
</html>
