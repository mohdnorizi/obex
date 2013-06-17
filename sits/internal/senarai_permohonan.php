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
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2" bgcolor="#051954"><span class="style1">CARI PERMOHONAN</span></td>
  </tr>
  <tr>
    <td width="7%" bgcolor="#fff">Kriteria</td>
    <td width="93%" bgcolor="#fff">: 
    		<select name="search_by" id="search_by">
			<option selected="selected" value="0">--SILA PILIH--</option>
			<option value="req_ic_no">NO. K/P</option>
			<option value="req_name">NAMA PEMOHON</option>
			<option value="req_company_reg_no">NO. PENDAFTARAN SYARIKAT</option>
			<option value="lot_no">NO. LOT</option>
			<option value="ownership_id">NO HAKMILIK TANAH</option>
			<option value="req_license_no">NO. LESEN MPOB</option>
			<option value="region_id">WILAYAH</option>
			<option value="state_id">NEGERI</option>
			<option value="status_id">STATUS</option>
			<option value="entry_id">NO. RUJUKAN PERMOHONAN</option>
			<option value="category_id">KATEGORI</option>
			<option value="app_type">JENIS PERMOHONAN</option>
			</select></td>
  </tr>
  <tr>
    <td bgcolor="#fff">Key</td>
    <td bgcolor="#fff">: 
      <input type="text" name="key" id="key" />
    </td>
  </tr>
  <tr>
    <td bgcolor="#fff">&nbsp;</td>
    <td bgcolor="#fff">&nbsp;&nbsp;<input value="CARI" type="button" style="padding:1px;" /></td>
  </tr>
</table>
<hr />
<br />
<table class="hovertable" style="width: 100%">
	
	<tbody><tr>
	  <th width="3%" class="sectiontableheader">#</th>
	  <th width="8%" class="sectiontableheader">NO.RUJUKAN</th>
	  <th width="25%" class="sectiontableheader">NAMA PEMOHON</th>
	  <th width="13%" class="sectiontableheader">NO. PEND SYARIKAT</th>
	  <th width="8%" class="sectiontableheader">NO. K/P</th>
	  <th width="9%" class="sectiontableheader">NO. LESEN</th>
	  <th width="12%" class="sectiontableheader">TARIKH PERMOHONAN</th>
	  <th width="9%" class="sectiontableheader">TARIKH KELULUSAN MESYUARAT</th>
	  <th width="6%" class="sectiontableheader">KATEGORI</th>
	  <th width="7%" class="sectiontableheader">STATUS</th>
		
	</tr>
    <?php
		$nom = 1;
		
		$type = $_POST['search_by'];
		$key = $_POST['key'];
		//$sql = mysql_query("select *from umum where nama like '%$key%'");
		$sql = mysql_query("select *from umum");
		$row=mysql_num_rows($sql);
		if($row>0){
		while($result =mysql_fetch_array($sql)){
			
			$app = $result['appinfo'];
			$sql2 = mysql_query("select *from pemohon where appinfo ='$app'");
			$result2 = mysql_fetch_array($sql2);
	?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
		<td height="24" align="center"><?php echo $nom++; ?></td>
		<td><?php echo $result2['refno']; ?></td>
		<td><a href="maklumat_umum.php?id=<?php echo $result['appinfo']; ?>"><?php echo $result['nama']; ?></a></td>
		<td><?php echo $result['no_syarikat']; ?></td>
		<td><?php echo $result['ic_no']; ?></td>
		<td><?php echo $result['no_lesen']; ?></td>
		<td align="center"><?php echo $result['tarikh_pohon']; ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
    <?php }}else{ ?>
	<tr onmouseover="this.style.backgroundColor='#FFFFFF';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td height="23" colspan="10" align="center">-- Tiada Maklumat Pemohon Dijumpai--</td>
	  </tr>
    <?php } ?>
</tbody></table>
</body>
</html>
