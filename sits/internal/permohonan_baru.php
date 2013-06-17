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
<script src="css/datetimepicker_css.js"></script>
<style type="text/css">
body {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
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
    <td width="100%" bgcolor="#051954"><span class="style1">PERMOHONAN BARU</span></td>
  </tr>
</table>
<form action="" method="post">
<table class="sitsform" border="0" cellpadding="2" cellspacing="2">
    <tr>
      <td class="label"><div align="right">TAHUN PELAKSANAAN/TEBANG</div></td>
      <td colspan="2"><label for="tahun_laksana"></label>
        <select name="tahun_laksana" id="tahun_laksana">
          <option value="2013" selected="selected">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
      </select></td>
    </tr>
    <tr>
      <td width="198" class="label"><div align="right">NAMA PEMOHON</div></td>
      <td width="293" colspan="2"><input class="cf_inputbox" maxlength="150" size="40" name="req_name" type="text" />
        &nbsp;<font color="red">*</font></td>
    </tr>
    <tr>
      <td class="label"><div align="right">NO. K/P</div></td>
      <td><input class="cf_inputbox" maxlength="15" size="15" id="req_ic_no" name="req_ic_no" type="text" />
        &nbsp;</td>
    </tr>
    <tr>
      <td class="label"><div align="right">NAMA SYARIKAT</div></td>
      <td colspan="2"><input class="cf_inputbox " size="40" maxlength="40" id="req_company_name" name="req_company_name" type="text" /></td>
    </tr>
    <tr>
      <td class="label"><div align="right">NO. PENDAFTARAN SYARIKAT</div></td>
      <td colspan="2"><input class="cf_inputbox " size="40" maxlength="40" id="req_company_reg_no" name="req_company_reg_no" type="text" /></td>
    </tr>
    <tr>
      <td class="label"><div align="right">TARIKH DITERIMA</div></td>
      <td colspan="2"><input type="Text" name="datereg" maxlength="25" size="15" id="date_receive"/>
        <img src="images/cal.gif" onclick="javascript:NewCssCal('date_receive')" style="cursor:pointer"/></td>
    </tr>
    <tr>
      <td class="label"><div align="right">KATEGORI</div></td>
      <td><select name="kategori" id="kategori">
        	<option value="0">-- Sila Pilih --</option>
          <option value="ESTET SWASTA">ESTET SWASTA</option>
          <option value="FELDA PLANTATION">FELDA PLANTATION</option>
          <option value="PENEROKA FELDA">PENEROKA FELDA</option>
          <option value="FELCRA PLANTATION">FELCRA PLANTATION</option>
          <option value="RISDA PLANTATION">RISDA PLANTATION</option>
          <option value="LADANG AGENSI KERAJAAN NEGERI">LADANG AGENSI KERAJAAN NEGERI</option>
          <option value="PEKEBUN KECIL SYARIKAT">PEKEBUN KECIL SYARIKAT</option>
      </select></td>
    </tr>
    <tr>
    <tr>
      <td class="label"><div align="right">JENIS PERMOHONAN</div></td>
      <td><input name="app_type" value="SEMASA" type="radio" />
        &nbsp;SEMASA&nbsp;
        <input name="app_type" value="TERDAHULU" type="radio" />
        &nbsp;TERDAHULU</td>
    </tr>
    
    <tr>
      <td class="label"><div align="right">LENGKAP DOKUMEN SOKONG</div></td>
      <td><input name="is_document_complete" value="YA" type="radio" />
        &nbsp;YA&nbsp;
        <input name="is_document_complete" value="TIDAK" type="radio" />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">DOKUMEN PENDAFTARAN SSM</div></td>
      <td><input name="doc_ssm" value="YA" type="radio" />
        &nbsp;YA&nbsp;
        <input name="doc_ssm" value="TIDAK" type="radio" />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">GERAN TANAH</div></td>
      <td><input name="is_land_title_attached" value="YA" type="radio" />
        &nbsp;YA&nbsp;
        <input name="is_land_title_attached" value="TIDAK" type="radio" />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">LESEN MPOB</div></td>
      <td><input name="is_license_attached" value="YA" type="radio" />
        &nbsp;YA&nbsp;
        <input name="is_license_attached" value="TIDAK" type="radio" />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">KAD PENGENALAN</div></td>
      <td><input name="is_ic_attached" value="YA" type="radio" />
        &nbsp;YA&nbsp;
        <input name="is_ic_attached" value="TIDAK" type="radio" />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">SURAT KUASA</div></td>
      <td><input name="is_rep_letter_attached" value="YA" type="radio" />
        &nbsp;YA&nbsp;
        <input name="is_rep_letter_attached" value="TIDAK" type="radio" />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td class="label"><div align="right">SURAT SOKONGAN FELDA</div></td>
      <td><input name="is_support_letter_attached" value="YA" type="radio" />
        &nbsp;YA&nbsp;
        <input name="is_support_letter_attached" value="TIDAK" type="radio" />
        &nbsp;TIDAK</td>
    </tr>
    <tr>
      <td colspan="2" class="label" align="center"><input value="SIMPAN" type="submit" style="padding:3px;" name="submit"  /></td>
    </tr>
</table>
</form>
<?php
if($_POST['submit']){
	
	extract($_REQUEST);
	
	list($day,$month,$year) = split('-',$datereg); 
	$newdate = $year."-".$month."-".$day; 
	
	$pwd = md5($password);
	$id = time();
	$_SESSION['appinfo'] = $id;
	
	$sql = "INSERT INTO umum(nama, ic_no, nama_syarikat, no_syarikat, tarikh_terima, jenis_permohonan, lengkap_dokumen, geran_tanah, lesen_mpob, kad_pengenalan, surat_kuasa, surat_sokongan_felda, doc_ssm, appinfo, tarikh_pohon, tahun_laksana, kategori)
			  VALUES('$req_name','$req_ic_no','$req_company_name','$req_company_reg_no','$datereg','$app_type','$is_document_complete','$is_land_title_attached','$is_license_attached','$is_ic_attached','$is_rep_letter_attached','$is_support_letter_attached','$doc_ssm','$id',now(),'$tahun_laksana','$kategori')";
	$result=mysql_query($sql);
		
	if($result){
		
			echo "<script type='text/javascript'>";
			echo "alert('Tambah Permohonan Baru Berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0; url=maklumat_permohonan.php?id=".$_SESSION['appinfo']."'>";
	}
	else{
			echo "<script type='text/javascript'>";
			echo "alert('Tambah Permohonan Baru Gagal')";
			echo "</script>";
	}
}
	

?>
</body>
</html>
