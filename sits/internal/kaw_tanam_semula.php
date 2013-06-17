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
<?php include("sub_menu.php"); ?>
<h2>KAWASAN TANAM SEMULA</h2>
<hr color="#333333" />
<form method="post" action="">
  <table width="43%" border="0" cellpadding="2" cellspacing="2">
    <tr>
      <td width="35%" align="right">NO. LOT</td>
      <td width="65%">:
        <input name="lot_no" type="text" /></td>
    </tr>
    <tr>
      <td align="right">NO. HAKMILIK TANAH</td>
      <td>:
        <input name="land_regno" type="text" /></td>
    </tr>
    <tr>
      <td align="right">MUKIM</td>
      <td>:
        <input name="mukim_name" type="text" /></td>
    </tr>
    <tr>
      <td align="right">NEGERI</td>
      <td>:
        <select size="1" name="state_id">
            <option selected="selected" value="">--SILA PILIH--</option>
            <option value="JHR">JOHOR</option>
          <option value="KDH">KEDAH</option>
            <option value="KTN">KELANTAN</option>
          <option value="KUL">KUALA LUMPUR</option>
            <option value="LBN">LABUAN</option>
          <option value="MLK">MELAKA</option>
            <option value="NSN">NEGERI SEMBILAN</option>
          <option value="PHG">PAHANG</option>
            <option value="PJY">PUTRAJAYA</option>
          <option value="PLS">PERLIS</option>
            <option value="PNG">PULAU PINANG</option>
          <option value="PRK">PERAK</option>
            <option value="SBH">SABAH</option>
          <option value="SGR">SELANGOR</option>
            <option value="SRW">SARAWAK</option>
          <option value="TRG">TERENGGANU</option>
        </select></td>
    </tr>
    <tr>
      <td align="right">DAERAH</td>
      <td>:
        <select size="1" name="district_id">
            <option selected="selected">--SILA PILIH--</option>
        </select></td>
    </tr>
     <tr>
      <td align="right">PARLIMEN</td>
      <td>:
        <select size="1" name="district_id">
            <option selected="selected">--SILA PILIH--</option>
        </select></td>
    </tr>
    <tr>
      <td align="right">KELUASAN LOT</td>
      <td>:
        <input name="req_lot_size" maxlength="10" size="10" type="text" />
        &nbsp; Ha</td>
    </tr>
    <tr>
      <td align="right">KELULUSAN YANG DIPOHON</td>
      <td>: 
      <input name="req_lot_size2" maxlength="10" size="10" type="text" /> &nbsp; Ha</td>
    </tr>
    <tr>
      <td align="right">UMUR POKOK</td>
      <td>:
        <input name="req_plant_age" maxlength="10" size="10" type="text" />
        &nbsp; Tahun</td>
    </tr>
    <tr>
      <td align="right">HASIL TAHUNAN</td>
      <td>:
        <input name="req_plant_revenue" maxlength="10" size="10" type="text" />
        &nbsp; Tan</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><input value="SIMPAN" type="submit" style="padding:3px;"  /></td>
    </tr>
    
    <!--<tr>
<td colspan="2" bgcolor="#051954"><font color="#FFFFFF"><b>SILA MASUKKAN MAKLUMAT BERIKUT JIKA LOT DI ATAS DICAGARKAN KEPADA BANK</b><font></font></font></td>
</tr>
<tr>
<td colour="" align="right">NAMA BANK</td>
<td>: 
<select size="1" name="req_lot_bank_name">
<option selected="selected">--SILA PILIH--</option>
<option value="AFFIN BANK">AFFIN BANK</option>
<option value="OCBC BANK">OCBC BANK</option>
<option value="PUBLIC BANK">PUBLIC BANK</option>
<option value="RHB BANK">RHB BANK</option>
<option value="ALLIANCE BANK MALAYSIA">ALLIANCE BANK MALAYSIA</option>
<option value="AMBANK">AMBANK</option>	<option value="CIMB">CIMB</option>
<option value="CITIBANK">CITIBANK</option>	<option value="EON BANK">EON BANK</option>
<option value="HONG LEONG BANK">HONG LEONG BANK</option>
<option value="HSBC">HSBC</option>
<option value="MAYBANK">MAYBANK</option>
</select></td>
</tr>
<tr>
<td align="right">ALAMAT BANK</td>
<td valign="top">: <textarea rows="2" cols="50" name="req_lot_bank_address"></textarea></td>
</tr>
<tr>
<td align="right">RUJUK PINJAMAN</td>
<td>: <input name="req_lot_bank_ref" maxlength="30" size="30" type="text"></td>
</tr>
<tr>
<td align="right"></td>
</tr>
<tr>
<td align="right"></td>
</tr>
<tr align="left">
<td colspan="2">
<input value="SIMPAN" type="button"></td>
</tr>-->
  </table>
</form>
</div>


<br>
<br>
<table class="hovertable" width="100%">
	<tr>
		<th width="91" class="sectiontableheader">NO.
	  LOT</th>
      <th width="108" class="sectiontableheader">NO.
      HAKMILIK</th>
      <th width="72" class="sectiontableheader">MUKIM</th>
      <th width="123" class="sectiontableheader">PARLIMEN</th>
      <th width="123" class="sectiontableheader">DAERAH</th>
      <th width="164" class="sectiontableheader">NEGERI</th>
      <th width="121" class="sectiontableheader">KELUASAN LOT (Ha)</th>
      <th width="200" class="sectiontableheader">KELUASAN TANAMAN SAWIT (HA)</th>
      <th width="119" class="sectiontableheader">UMUR POKOK</th>
      <th width="146" class="sectiontableheader">HASIL/HEKTAR/SETAHUN</th>
      <th width="112" class="sectiontableheader" align="center">ACTION</th>
  </tr>
	<tr onmouseover="this.style.backgroundColor='#FFFFCC';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	  <td class="sectiontableheader">1112</td>
	  <td class="sectiontableheader">8765432345</td>
	  <td class="sectiontableheader">LUNDANG</td>
	  <td class="sectiontableheader">PASIR PUTEH</td>
	  <td class="sectiontableheader">PASIR PUTEH</td>
	  <td class="sectiontableheader">KELANTAN</td>
	  <td class="sectiontableheader">232</td>
	  <td class="sectiontableheader">232</td>
	  <td class="sectiontableheader">3 TAHUN</td>
	  <td class="sectiontableheader">232</td>
	  <td class="sectiontableheader" align="center">&nbsp;</td>
  </tr>
</table>


</body>
</html>
