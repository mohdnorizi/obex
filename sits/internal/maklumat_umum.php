<?php
	session_start();
	include("../include/db.php");
	$appinfo = $_GET['id'];
	
	$_SESSION['appinfo'] = $appinfo;
	
	$sql = mysql_query("select * from umum where appinfo = '".$_SESSION['appinfo']."'");
	$result = mysql_fetch_array($sql);

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

<h2>MAKLUMAT UMUM</h2>
<hr color="#333333" />
<form method="post" action="">
<table border="0" cellpadding="2" cellspacing="2">
<tr>
      <td width="199" class="label"><div align="right">TAHUN PELAKSANAAN/TEBANG</div></td>
      <td width="240" colspan="2">: <label for="tahun_laksana"></label>
        <select name="tahun_laksana" id="tahun_laksana">
          <option value="2013" <?php if($result['tahun_laksana'] == '2013'){echo selected;} ?>>2013</option>
          <option value="2012" <?php if($result['tahun_laksana'] == '2012'){echo selected;} ?>>2012</option>
          <option value="2011" <?php if($result['tahun_laksana'] == '2011'){echo selected;} ?>>2011</option>
          <option value="2010" <?php if($result['tahun_laksana'] == '2010'){echo selected;} ?>>2010</option>
      </select></td>
    </tr>
    <tr>
      <td class="label"><div align="right">NAMA PEMOHON</div></td>
      <td colspan="2">: <input maxlength="150" size="40" name="req_name" type="text" value="<?php echo $result['nama']; ?>" />
        &nbsp;<font color="red">*</font></td>
    </tr>
    <tr>
      <td class="label"><div align="right">NO. K/P</div></td>
      <td>: <input maxlength="15" size="15" name="req_ic_no" type="text" value="<?php echo $result['ic_no']; ?>" />
        &nbsp;</td>
    </tr>
    <tr>
      <td class="label"><div align="right">NAMA SYARIKAT</div></td>
      <td colspan="2">: <input size="40" maxlength="40" name="req_company_name" type="text" value="<?php echo $result['nama_syarikat']; ?>" /></td>
    </tr>
    <tr>
      <td class="label"><div align="right">NO. PENDAFTARAN SYARIKAT</div></td>
      <td colspan="2">: <input size="40" maxlength="40" name="req_company_reg_no" type="text" value="<?php echo $result['no_syarikat']; ?>" /></td>
    </tr>
    <tr>
      <td class="label"><div align="right">TARIKH DITERIMA</div></td>
      <td colspan="2">: <input size="10" id="date_receive" maxlength="10" name="date_receive" type="text" value="<?php echo $result['tarikh_terima']; ?>"/>
        <img src="images/cal.gif" onclick="javascript:NewCssCal('date_receive')" style="cursor:pointer"/>
        &nbsp;<font color="red">*</font>
        </td>
    </tr>
    <tr>
      <td class="label"><div align="right">KATEGORI</div></td>
      <td>: 
        <select name="kategori" id="kategori">
        	<option value="0">-- Sila Pilih --</option>
          <option value="ESTET SWASTA" <?php if($result['kategori'] == 'ESTET SWASTA'){echo selected;} ?>>ESTET SWASTA</option>
          <option value="FELDA PLANTATION" <?php if($result['kategori'] == 'FELDA PLANTATION'){echo selected;} ?>>FELDA PLANTATION</option>
          <option value="PENEROKA FELDA" <?php if($result['kategori'] == 'PENEROKA FELDA'){echo selected;} ?>>PENEROKA FELDA</option>
          <option value="FELCRA PLANTATION" <?php if($result['kategori'] == 'FELCRA PLANTATION'){echo selected;} ?>>FELCRA PLANTATION</option>
          <option value="RISDA PLANTATION" <?php if($result['kategori'] == 'RISDA PLANTATION'){echo selected;} ?>>RISDA PLANTATION</option>
          <option value="LADANG AGENSI KERAJAAN NEGERI" <?php if($result['kategori'] == 'LADANG AGENSI KERAJAAN NEGERI'){echo selected;} ?>>LADANG AGENSI KERAJAAN NEGERI</option>
          <option value="PEKEBUN KECIL SYARIKAT" <?php if($result['kategori'] == 'PEKEBUN KECIL SYARIKAT'){echo selected;} ?>>PEKEBUN KECIL SYARIKAT</option>
      </select></td>
    </tr>
    <tr>
      <td class="label"><div align="right">JENIS PERMOHONAN</div></td>
      <td>: <input name="app_type" value="SEMASA" type="radio" <?php if(!empty($result['jenis_permohonan'])){ if($result['jenis_permohonan']=='SEMASA'){echo checked;} }?> />
        &nbsp;SEMASA&nbsp;
        <input name="app_type" value="TERDAHULU" type="radio" <?php if($result['jenis_permohonan']=='TERDAHULU'){echo checked;} ?> />
        &nbsp;TERDAHULU</td>    </tr>
    <tr>
      <td class="label"><div align="right">LENGKAP DOKUMEN SOKONG</div></td>
      <td>: <input name="is_document_complete" value="YA" type="radio" <?php if($result['lengkap_dokumen']=='YA'){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="is_document_complete" value="TIDAK" type="radio"  <?php if($result['lengkap_dokumen']=='TIDAK'){echo checked;} ?>/>
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">DOKUMEN PENDAFTARAN SSM</div></td>
      <td>: <input name="doc_ssm" value="YA" type="radio"  <?php if($result['doc_ssm']=='YA'){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="doc_ssm" value="TIDAK" type="radio"  <?php if($result['doc_ssm']=='TIDAK'){echo checked;} ?> />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">GERAN TANAH</div></td>
      <td>: <input name="geran_tanah" value="YA" type="radio"  <?php if($result['geran_tanah']=='YA'){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="geran_tanah" value="TIDAK" type="radio"  <?php if($result['geran_tanah']=='TIDAK'){echo checked;} ?> />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">LESEN MPOB</div></td>
      <td>: <input name="is_license_attached" value="YA" type="radio"  <?php if($result['lesen_mpob']=='YA'){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="is_license_attached" value="TIDAK" type="radio"  <?php if($result['lesen_mpob']=='TIDAK'){echo checked;} ?> />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">KAD PENGENALAN</div></td>
      <td>: <input name="is_ic_attached" value="YA" type="radio" <?php if($result['kad_pengenalan']=='YA'){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="is_ic_attached" value="TIDAK" type="radio" <?php if($result['kad_pengenalan']=='TIDAK'){echo checked;} ?> />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">SURAT KUASA</div></td>
      <td>: <input name="is_rep_letter_attached" value="YA" type="radio" <?php if($result['surat_kuasa']=='YA'){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="is_rep_letter_attached" value="TIDAK" type="radio" <?php if($result['surat_kuasa']=='TIDAK'){echo checked;} ?>/>
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">SURAT SOKONGAN FELDA</div></td>
      <td>: <input name="is_support_letter_attached" value="YA" type="radio" <?php if($result['surat_sokongan_felda']=='YA'){echo checked;} ?> />
        &nbsp;YA&nbsp;
        <input name="is_support_letter_attached" value="TIDAK" type="radio" <?php if($result['surat_sokongan_felda']=='TIDAK'){echo checked;} ?> />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td colspan="2" class="label" align="center"><input value="Kemaskini" type="submit" name="submit" style="padding:1px;"  /></td>
    </tr>
</table>
</form>
<?php
if($_POST['submit']){

extract($_REQUEST);

$sql2 = "update umum set nama='$req_name', ic_no='$req_ic_no', nama_syarikat='$req_company_name', no_syarikat='$req_company_reg_no', tarikh_terima='$date_receive', jenis_permohonan='$app_type', lengkap_dokumen='$is_document_complete', geran_tanah='$geran_tanah', lesen_mpob='$is_license_attached', kad_pengenalan='$is_ic_attached', surat_kuasa='$is_rep_letter_attached' ,surat_sokongan_felda='$is_support_letter_attached', doc_ssm='$doc_ssm', tahun_laksana = '$tahun_laksana',kategori = '$kategori' where appinfo='".$_SESSION['appinfo']."'";

$result2=mysql_query($sql2);
 
if($result2){
	echo "<script type='text/javascript'>";
	echo "alert('Kemaskini Berjaya')";
	echo "</script>";
	echo "<meta http-equiv='refresh' content='0; url=maklumat_umum.php?id=$appinfo'>";
}}
?>
</body>
</html>
