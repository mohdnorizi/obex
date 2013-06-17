<?php
	session_start();
	include("../include/db.php");
	include "../include/function.php";
 	$id_mak = $_GET['id_mak'];
	
	$sql = mysql_query("select * from makkebun where appinfo = '".$_SESSION['appinfo']."' and id_makkebun = $id_mak");
	$result = mysql_fetch_array($sql);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script language="JavaScript" src="../include/dropdown.js" type="text/javascript"></script>



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
<h2>PERMOHONAN KELUASAN UNTUK TANAM SEMULA</h2>
<hr color="#333333" />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
</table>
<form method="post" action="" name="mak_pemohon">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
  <td width="28%" class="label"><div align="right">NO LOT</div></td>
      <td width="1%" class="label">:</td>
      <td width="71%" colspan="2"> 
      <input size="10" maxlength="40" name="nolot" type="text" value="<?php echo $result['nolot']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">NO HAK MILIK TANAH</div></td>
  <td class="label">&nbsp;</td>
  <td colspan="2"><input size="10" maxlength="40" name="no_milik_tanah" type="text" value="<?php echo $result['no_milik_tanah']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">NEGERI</div></td>
  <td class="label">&nbsp;</td>
  <td colspan="2"><select name="negeri" onChange="getNegeri(this.value)">
    <option value="">--Sila Pilih--</option>
    <option value="2" <?php if($result['negeri'] == '2'){echo selected;} ?>>KEDAH</option>
    <option value="8" <?php if($result['negeri'] == '8'){echo selected;} ?>>PERLIS</option>
    <option value="9" <?php if($result['negeri'] == '9'){echo selected;} ?>>PULAU PINANG</option>
    <option value="7" <?php if($result['negeri'] == '7'){echo selected;} ?>>PERAK</option>
    <option value="10" <?php if($result['negeri'] == '10'){echo selected;} ?>>SELANGOR</option>
    <option value="5" <?php if($result['negeri'] == '5'){echo selected;} ?>>NEGERI SEMBILAN</option>
    <option value="12" <?php if($result['negeri'] == '12'){echo selected;} ?>>WILAYAH PERSEKUTUAN KL</option>
    <option value="19" <?php if($result['negeri'] == '19'){echo selected;} ?>>WILAYAN PERSEKUTUAN PUTRAJAYA</option>
    <option value="18" <?php if($result['negeri'] == '18'){echo selected;} ?>>WILAYAN PERSEKUTUAN LABUAN</option>
    <option value="4" <?php if($result['negeri'] == '4'){echo selected;} ?>>MELAKA</option>
    <option value="1" <?php if($result['negeri'] == '1'){echo selected;} ?>>JOHOR</option>
    <option value="6" <?php if($result['negeri'] == '6'){echo selected;} ?>>PAHANG</option>
    <option value="11" <?php if($result['negeri'] == '11'){echo selected;} ?>>TERENGGANU</option>
    <option value="3" <?php if($result['negeri'] == '3'){echo selected;} ?>>KELANTAN</option>
    <option value="14" <?php if($result['negeri'] == '14'){echo selected;} ?>>SARAWAK</option>
    <option value="13" <?php if($result['negeri'] == '13'){echo selected;} ?>>SABAH</option>
  </select></td>
</tr>

<tr >
    <td  class="label"><div align="right">DAERAH</div></td>
     <td class="label">&nbsp;</td>
    <td colspan="2"><div id="statediv"><select name="state" >
	<option>Pilih Negeri</option>
        </select></div></td>
  </tr>
  <tr >
    <td  class="label"><div align="right">MUKIM</div></td>
     <td class="label">&nbsp;</td>
    <td colspan="2"><div id="citydiv"><select name="city">
	<option>Pilih Daerah</option>
        </select></div></td>
  </tr>
<tr>
  <td><div align="right">KELUASAN LOT (HA)</div></td>
      <td>:</td>
      <td><input size="10" name="kelusan_lot" type="text" value="<?php echo $result['keluasan_lot']; ?>" /></td>
</tr>
<tr>
  <td class="label" valign="top"><div align="right">KELUASAN TANAMAN SAWIT (HA)</div></td>
      <td class="label" valign="top">:</td>
      <td colspan="2">
      
    <input size="10" name="kelusan_tanaman" type="text" value="<?php echo $result['keluasan_tanam']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">UMUR POKOK</div></td>
  <td class="label">:</td>
  <td> <input size="10" name="umur" type="text" value="<?php echo $result['umur']; ?>"/></td>
</tr>
<tr>
  <td class="label"><div align="right">KELUASAN DIPOHON</div></td>
  <td class="label">:</td>
  <td><input maxlength="10" size="10" name="keluasan_pohon" type="text" value="<?php echo $result['keluasan_pohon']; ?>"/></td>
</tr>
<tr>
  <td class="label"><div align="right">HASIL/HEKTAR/SETAHUN</div></td>
      <td class="label">:</td>
      <td> <input maxlength="10" size="10" name="hasil_hektar" type="text" value="<?php echo $result['hasil_setahun']; ?>" />
        &nbsp;
        Ha</td>
</tr>

</table>
<br>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
	<td width="95%" height="42" colspan="6" align="right" bgcolor="#051954"><input value="SIMPAN" name="submit" type="submit" style="padding:3px;"  />&nbsp;</td>
</tr>
</table>
<br>
</form>
<?php

if($_POST['submit']){

extract($_REQUEST);

$result4 = mysql_query("update makkebun set nolot='$nolot', no_milik_tanah='$no_milik_tanah', mukim='$city', daerah='$state', negeri='$negeri', keluasan_lot='$kelusan_lot', keluasan_tanam='$kelusan_tanaman', umur='$umur', hasil_setahun='$hasil_hektar',keluasan_pohon='$keluasan_pohon' where appinfo='".$_SESSION['appinfo']."' and id_makkebun='$id_mak'");

if($result4){
		echo "<script type='text/javascript'>";
		echo "alert('Kemaskini Berjaya')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0; url=maklumat_kebun.php?id=".$_SESSION['appinfo']."'>";
	}
}


?>


</body>
</html>

<script language="javascript" type="text/javascript">
// Roshan's Ajax dropdown code with php
// This notice must stay intact for legal use
// Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
// If you have any problem contact me at http://roshanbh.com.np
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getNegeri(countryId) {		
		
		var strURL="findNegeri.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getDaerah(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
