<?php
	session_start();
	include("../include/db.php");
	include "../include/function.php";
	
	$id_mak = $_GET['id_mak'];
	
	$sql = mysql_query("select * from umum where appinfo = '".$_SESSION['appinfo']."'");
	$result = mysql_fetch_array($sql);
	
	$que = mysql_query("select * from pemohon where appinfo = '".$_SESSION['appinfo']."'");
	$check = mysql_num_rows($que);
		
	if($check>0){
		$sql2 = mysql_query("select * from pemohon where appinfo = '".$_SESSION['appinfo']."'");
		$result2 = mysql_fetch_array($sql2);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script language="JavaScript" src="../include/dropdown.js" type="text/javascript"></script>
<script language="JavaScript" src="../include/dropdown2.js" type="text/javascript"></script>
<script type="text/javascript">
function startCalc(){
  interval = setInterval("calc()",1);
}
function calc(){
  luas_muda = document.mak_pemohon.luas_muda.value;
  luas_matang = document.mak_pemohon.luas_matang.value;
  
  $prebaki = document.mak_pemohon.total_tanam.value = (luas_muda*1 + luas_matang*1);
  document.mak_pemohon.total_tanam.value = $prebaki.toFixed(4);
}
function stopCalc(){
  clearInterval(interval);
}
</script>

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
<h2>MAKLUMAT TANAMAN KELAPA SAWIT</h2>
<hr color="#333333" />
<form method="post" action="" name="mak_pemohon">
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
<td width="25%" class="label"><div align="right">NAMA PEMOHON</div></td>
      <td width="1%" class="label">:</td>
    <td colspan="2"><input size="60" name="nama_pemohon" type="text" value="<?php echo $result['nama']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">NO. K/P PEMOHON</div></td>
      <td class="label">:</td>
      <td colspan="2"> <input maxlength="15" size="15" name="ic_pemohon" type="text" value="<?php echo $result['ic_no']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">NO. RUJUKAN</div></td>
  <td class="label">:</td>
  <td colspan="2"> 
    <input size="40" maxlength="40" name="no_ruj" type="text" value="<?php echo $result2['refno']; ?>" /></td>
</tr>
<tr>
  <td width="25%" class="label"><div align="right">NAMA PEMILIK TANAH</div></td>
      <td width="1%" class="label">:</td>
    <td colspan="2"> <input size="40" maxlength="40" name="owner_name" type="text" value="<?php echo $result2['nama_pemilik']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">NO. K/P/NO.PENDAFTARAN SYARIKAT</div></td>
      <td class="label">:</td>
      <td colspan="2"> <input maxlength="15" size="15" name="no_kp_pemilik" type="text" value="<?php echo $result2['no_kp_pemilik']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">NO LESEN MPOB</div></td>
      <td class="label">:</td>
      <td width="74%"> 
    <input size="40" maxlength="40" name="no_lesen" type="text" value="<?php echo $result2['no_lesen']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">ALAMAT SURAT MENYURAT PELESEN </div></td>
      <td class="label">:</td>
      <td colspan="2"> 
      <input size="40" maxlength="40" name="alamat_surat_pemilik" type="text" value="<?php echo $result2['alamat_surat_pemilik']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">ALAMAT BARIS 2</div></td>
      <td class="label">:</td>
      <td colspan="2"> 
      <input size="40" maxlength="40" name="alamat2_pemilik" type="text" value="<?php echo $result2['alamat2_pemilik']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">ALAMAT BARIS 3</div></td>
  <td class="label">:</td>
  <td colspan="2"> 
    <input size="40" maxlength="40" name="alamat3_pemilik" type="text" value="<?php echo $result2['alamat3_pemilik']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">POSKOD</div></td>
  <td class="label">:</td>
  <td colspan="2"> 
    <input maxlength="5" size="5" name="poskod_pemilik" type="text" value="<?php echo $result2['poskod_pemilik']; ?>" /></td>
</tr>
<tr>
  <td><div align="right">NEGERI</div></td>
      <td>:</td>
      <td> <select name="negeri_pemilik" onChange="getParlimen_pemilik(this.value)">
						<option value="">--Sila Pilih--</option>
                        <option value="KDH" <?php if($result2['negeri_pemilik'] == 'KDH'){echo selected;} ?>>KEDAH</option>
						<option value="PL" <?php if($result2['negeri_pemilik'] == 'PL'){echo selected;} ?>>PERLIS</option>
						<option value="PP" <?php if($result2['negeri_pemilik'] == 'PP'){echo selected;} ?>>PULAU PINANG</option>
						<option value="PRK" <?php if($result2['negeri_pemilik'] == 'PRK'){echo selected;} ?>>PERAK</option>
                        <option value="SEL" <?php if($result2['negeri_pemilik'] == 'SEL'){echo selected;} ?>>SELANGOR</option>
						<option value="NS" <?php if($result2['negeri_pemilik'] == 'NS'){echo selected;} ?>>NEGERI SEMBILAN</option>
						<option value="WKL" <?php if($result2['negeri_pemilik'] == 'WKL'){echo selected;} ?>>WILAYAH PERSEKUTUAN KL</option>
						<option value="WPP" <?php if($result2['negeri_pemilik'] == 'WPP'){echo selected;} ?>>WILAYAN PERSEKUTUAN PUTRAJAYA</option>
                        <option value="WPL" <?php if($result2['negeri_pemilik'] == 'WPL'){echo selected;} ?>>WILAYAN PERSEKUTUAN LABUAN</option>
						<option value="MLK" <?php if($result2['negeri_pemilik'] == 'MLK'){echo selected;} ?>>MELAKA</option>
						<option value="JHR" <?php if($result2['negeri_pemilik'] == 'JHR'){echo selected;} ?>>JOHOR</option>
						<option value="PHG" <?php if($result2['negeri_pemilik'] == 'PHG'){echo selected;} ?>>PAHANG</option>
						<option value="TRG" <?php if($result2['negeri_pemilik'] == 'TRG'){echo selected;} ?>>TERENGGANU</option>
						<option value="KEL" <?php if($result2['negeri_pemilik'] == 'KEL'){echo selected;} ?>>KELANTAN</option>
						<option value="SWK" <?php if($result2['negeri_pemilik'] == 'SWK'){echo selected;} ?>>SARAWAK</option>
						<option value="SBH" <?php if($result2['negeri_pemilik'] == 'SBH'){echo selected;} ?>>SABAH</option>
					</select></td>
</tr>
<tr>
  <td class="label" valign="top"><div align="right">DAERAH DAN KAWASAN PARLIMEN</div></td>
      <td class="label" valign="top">:</td>
      <td colspan="2"><?php if($check>0){ ?><div id="getParlimen_pemilik">
		<select name="daerah_pemilik" style="margin-bottom:5px;">
		<option value="<?php echo $result2['daerah_pemilik']; ?>" selected><?php echo getDaerah($result2['daerah_pemilik']); ?></option>
	    </select> (Daerah)
	    <br>
	    <select name="parlimen_pemilik">
		<option value="<?php echo $result2['parlimen_pemilik']; ?>" selected><?php echo getParlimen($result2['parlimen_pemilik']); ?></option>
	    </select> (Parlimen)
        </div>
        <?php }else{ ?>
        <div id="getParlimen_pemilik">
		<select name="">
		<option>--Sila Pilih Negeri --</option>
		</select>
	    </div><?php } ?></td>
</tr>
<tr>
  <td class="label"><div align="right">ALAMAT TANAMAN/KEBUN KELAPA SAWIT(BARIS 1) </div></td>
      <td class="label">:</td>
      <td colspan="2"> 
      <input size="40" maxlength="40" name="add1" type="text" value="<?php echo $result2['alamat_kebun']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">ALAMAT BARIS 2</div></td>
      <td class="label">:</td>
      <td colspan="2"> 
      <input size="40" maxlength="40" name="add2" type="text" value="<?php echo $result2['alamat_kebun2']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">ALAMAT BARIS 3</div></td>
  <td class="label">:</td>
  <td colspan="2"> 
    <input size="40" maxlength="40" name="add3" type="text" value="<?php echo $result2['alamat_kebun3']; ?>" /></td>
</tr>
<tr>
  <td class="label"><div align="right">POSKOD</div></td>
  <td class="label">:</td>
  <td colspan="2"> 
    <input maxlength="5" size="5" name="poskod" type="text" value="<?php echo $result2['poskod']; ?>" /></td>
</tr>
<tr>
  <td><div align="right">NEGERI</div></td>
      <td>:</td>
      <td><select name="negeri" onChange="getParlimen(this.value)">
						<option value="">--Sila Pilih--</option>
                        <option value="KDH" <?php if($result2['negeri'] == 'KDH'){echo selected;} ?>>KEDAH</option>
						<option value="PL" <?php if($result2['negeri'] == 'PL'){echo selected;} ?>>PERLIS</option>
						<option value="PP" <?php if($result2['negeri'] == 'PP'){echo selected;} ?>>PULAU PINANG</option>
						<option value="PRK" <?php if($result2['negeri'] == 'PRK'){echo selected;} ?>>PERAK</option>
                        <option value="SEL" <?php if($result2['negeri'] == 'SEL'){echo selected;} ?>>SELANGOR</option>
						<option value="NS" <?php if($result2['negeri'] == 'NS'){echo selected;} ?>>NEGERI SEMBILAN</option>
						<option value="WKL" <?php if($result2['negeri'] == 'WKL'){echo selected;} ?>>WILAYAH PERSEKUTUAN KL</option>
						<option value="WPP" <?php if($result2['negeri'] == 'WPP'){echo selected;} ?>>WILAYAN PERSEKUTUAN PUTRAJAYA</option>
                        <option value="WPL" <?php if($result2['negeri'] == 'WPL'){echo selected;} ?>>WILAYAN PERSEKUTUAN LABUAN</option>
						<option value="MLK" <?php if($result2['negeri'] == 'MLK'){echo selected;} ?>>MELAKA</option>
						<option value="JHR" <?php if($result2['negeri'] == 'JHR'){echo selected;} ?>>JOHOR</option>
						<option value="PHG" <?php if($result2['negeri'] == 'PHG'){echo selected;} ?>>PAHANG</option>
						<option value="TRG" <?php if($result2['negeri'] == 'TRG'){echo selected;} ?>>TERENGGANU</option>
						<option value="KEL" <?php if($result2['negeri'] == 'KEL'){echo selected;} ?>>KELANTAN</option>
						<option value="SWK" <?php if($result2['negeri'] == 'SWK'){echo selected;} ?>>SARAWAK</option>
						<option value="SBH" <?php if($result2['negeri'] == 'SBH'){echo selected;} ?>>SABAH</option>
					</select></td>
</tr>
<tr>
  <td class="label" valign="top"><div align="right">DAERAH DAN KAWASAN PARLIMEN</div></td>
      <td class="label" valign="top">:</td>
      <td colspan="2">
      <?php if($check>0){ ?><div id="getParlimen">
		<select name="daerah" style="margin-bottom:5px;">
		<option value="<?php echo $result2['daerah']; ?>" selected><?php echo getDaerah($result2['daerah']); ?></option>
	    </select> (Daerah)
	    <br>
	    <select name="parlimen">
		<option value="<?php echo $result2['parlimen']; ?>" selected><?php echo getParlimen($result2['parlimen']); ?></option>
	    </select> (Parlimen)
        </div>
        <?php }else{ ?>
        <div id="getParlimen">
		<select name="">
		<option>--Sila Pilih Negeri --</option>
		</select>
	    </div><?php } ?>
    </td>
</tr>
<tr>
  <td class="label"><div align="right">BILANGAN PENEROKA</div></td>
  <td class="label">:</td>
  <td> <input maxlength="10" size="10" name="bil_peneroka" type="text" value="<?php echo $result2['bil_peneroka']; ?>" />
    &nbsp;
    Orang</td>
</tr>
<tr>
  <td class="label"><div align="right">LUAS TANAMAN MATANG</div></td>
  <td class="label">:</td>
  <td> <input maxlength="10" size="10" name="luas_matang" type="text" value="<?php echo number_format($result2['luas_tanaman'],4); ?>" onFocus="startCalc();" onBlur="stopCalc();"/>
    &nbsp;
    Ha</td>
</tr>
<tr>
  <td class="label"><div align="right">LUAS TANAMAN MUDA</div></td>
      <td class="label">:</td>
      <td> <input maxlength="10" size="10" name="luas_muda" type="text" value="<?php echo number_format($result2['luas_tanaman_muda'],4); ?>" onFocus="startCalc();" onBlur="stopCalc();" />
        &nbsp;
        Ha</td>
</tr>
<tr>
  <td class="label"><div align="right">JUMLAH LUAS TANAMAN</div></td>
      <td class="label">:</td>
      <td> <input maxlength="5" size="10" name="total_tanam" type="text" value="<?php echo number_format($result2['jumlah_luas'],4); ?>" />
        &nbsp; Ha</td>
</tr>
<tr>
  <td class="label">&nbsp;</td>
  <td class="label">&nbsp;</td>
  <td><input value="Simpan Permohonan" name="submit" type="submit" style="padding:1px;"  /></td>
</tr>

</table>
<br>
<br>
</form>
<?php

if($_POST['submit']){

extract($_REQUEST);

if($check<1){
$sql3="INSERT INTO pemohon(refno,appinfo,nama_pemilik,no_kp_pemilik,no_lesen,alamat_surat_pemilik,alamat2_pemilik,alamat3_pemilik,poskod_pemilik,negeri_pemilik,daerah_pemilik,parlimen_pemilik,alamat_kebun,alamat_kebun2,alamat_kebun3,poskod,negeri,daerah,parlimen,tahun_tanam,luas_tanaman,luas_tanaman_muda,jumlah_luas,bil_peneroka)

VALUES('$no_ruj','".$_SESSION['appinfo']."','$owner_name','$no_kp_pemilik','$no_lesen','$alamat_surat_pemilik','$alamat2_pemilik','$alamat3_pemilik','$poskod_pemilik','$negeri_pemilik','$daerah_pemilik','$parlimen_pemilik','$add1','$add2','$add3','$poskod','$negeri','$daerah','$parlimen','$tahun_tanam','$luas_matang','$luas_muda','$total_tanam','$bil_peneroka')";
$result3=mysql_query($sql3);

	if($result){
		echo "<script type='text/javascript'>";
		echo "alert('Success')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0; url=maklumat_permohonan.php?id=".$_SESSION['appinfo']."&id_mak=$id_mak'>";
	}

}elseif($check>0){
$result4 = mysql_query("update pemohon set refno='$no_ruj', nama_pemilik='$owner_name', no_kp_pemilik='$no_kp_pemilik', no_lesen='$no_lesen', alamat_surat_pemilik='$alamat_surat_pemilik', alamat2_pemilik='$alamat2_pemilik', alamat3_pemilik='$alamat3_pemilik', poskod_pemilik='$poskod_pemilik', negeri_pemilik='$negeri_pemilik', daerah_pemilik='$daerah_pemilik', parlimen_pemilik='$parlimen_pemilik', alamat_kebun='$add1', alamat_kebun2='$add2', alamat_kebun3='$add3', poskod='$poskod', negeri='$negeri', daerah='$daerah', parlimen='$parlimen', tahun_tanam='$tahun_tanam', luas_tanaman='$luas_matang', luas_tanaman_muda='$luas_muda', jumlah_luas='$total_tanam',bil_peneroka='$bil_peneroka' where appinfo='".$_SESSION['appinfo']."'");

if($result4){
		echo "<script type='text/javascript'>";
		echo "alert('Maklumat Berjaya Disimpan')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0; url=maklumat_permohonan.php?id=".$_SESSION['appinfo']."'>";
	}
}
}


?>


</body>
</html>
