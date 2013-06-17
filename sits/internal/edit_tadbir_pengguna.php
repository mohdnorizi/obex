<?php
	session_start();
	include("../include/db.php");
	$id = $_GET['id'];
	$sql = mysql_query("select * from pengguna where id_pengguna = '$id'"); 
	$result = mysql_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<div>
  <div align="left">
  <h1>Maklumat Pengguna</h1>
  <hr />
  <form method="post" action="">
   <table cellspacing="2">
	
				<tbody><tr>
					<td height="34" align="left">
					<img src="images/con_info.png" witdh="13" title="Maklumat" height="13"> Sila lengkapkan semua butiran di bawah.
					</td>
					<td align="right">&nbsp;</td>
				</tr>
				
				<tr class="sectiontableentry2">
					<td class="key" width="250">
						<label for="name">
							Nama Sebenar :
						</label>
					</td>
					<td>
						<input name="name" id="name" class="inputbox" size="40" value="<?php echo $result['nama']; ?>" type="text">
					</td>
				</tr>
				<tr class="sectiontableentry1">
					<td class="key">
						<label for="email">
							E-mail :
						</label>
					</td>
					<td>
						<input class="inputbox" name="email" id="email" size="40" value="<?php echo $result['email']; ?>" type="text">
					</td>
				</tr>
				<tr class="sectiontableentry2">
					<td class="key">
						<label for="username">Wilayah :
						</label>
					</td>
					<td><select class="inputbox required" id="user_region" size="1" name="user_region">
						<option value=""> -- Sila Pilih -- </option>
						<option value="PWJ" <?php if($result['wilayah']=='PWJ'){echo selected;} ?>> Johor </option>
						<option value="PWU" <?php if($result['wilayah']=='PWU'){echo selected;} ?>> Utara </option>
						<option value="PWT" <?php if($result['wilayah']=='PWT'){echo selected;} ?>> Timur </option>
						<option value="PWC" <?php if($result['wilayah']=='PWC'){echo selected;} ?>> Tengah </option>
						<option value="PWSK" <?php if($result['wilayah']=='PWSK'){echo selected;} ?>> Sarawak </option>
						<option value="PWSH" <?php if($result['wilayah']=='PWSH'){echo selected;} ?>> Sabah </option>
						<option value="ALL" <?php if($result['wilayah']=='ALL'){echo selected;} ?>> Semua </option>
					</select></td>
				</tr>
				<tr class="sectiontableentry1">
					<td class="key" valign="top">
						<label for="gid">
							Kategori Pengguna :
						</label>
					</td>
					<td>
						<select name="filter_type" id="filter_type" class="inputbox" size="1" onchange="document.adminForm.submit( );">
        <option value="0" selected="selected">- Sila Pilih -</option>
        <option value="SUPER ADMIN" <?php if($result['kategori_pengguna']=='SUPER ADMIN'){echo selected;} ?>>Super Admin</option>
        <option value="Pemproses Data" <?php if($result['kategori_pengguna']=='Pemproses Data'){echo selected;} ?>>Pemproses Data</option>
<!--        <option value="Jawatankuasa" <?php if($result['kategori_pengguna']=='Jawatankuasa'){echo selected;} ?>>Jawatankuasa</option>
        <option value="Pemeriksa" <?php if($result['kategori_pengguna']=='Pemeriksa'){echo selected;} ?>>Pemeriksa</option>
        <option value="Penyelia Kewangan" <?php if($result['kategori_pengguna']=='Penyelia Kewangan'){echo selected;} ?>>Penyelia Kewangan</option>
        <option value="Penyelia" <?php if($result['kategori_pengguna']=='Penyelia'){echo selected;} ?>>Penyelia</option>
        <option value="Pemproses Data PRE2" <?php if($result['kategori_pengguna']=='Pemproses Data PRE2'){echo selected;} ?>>Pemproses Data PRE2</option>
        <option value="Pemproses_Data" <?php if($result['kategori_pengguna']=='Pemproses_Data'){echo selected;} ?>>Pemproses_Data</option>
        <option value="Pelawat" <?php if($result['kategori_pengguna']=='Pelawat'){echo selected;} ?>>Pelawat</option>-->
    </select>					</td>
				</tr>
				<tr class="sectiontableentry2">
					<td class="key">
						<label for="username">
							ID Pengguna :
						</label>
					</td>
					<td>
						<input name="username" id="username" class="inputbox" size="40" value="<?php echo $result['id']; ?>" autocomplete="off" type="text">
					</td>
				</tr>
				<tr class="sectiontableentry1">
					<td class="key">
						<label for="password">
							Kata Laluan :
						</label>
					</td>
					<td>
													<input class="inputbox" name="password" id="password" size="40" value="" type="password" readonly="readonly">
											</td>
				</tr>
				<tr class="sectiontableentry2">
					<td class="key">
						<label for="password2">
							Sahkan Kata Laluan :
						</label>
					</td>
					<td>
													<input class="inputbox" name="password2" id="password2" size="40" value="" type="password" readonly="readonly">
											</td>
				</tr>
								<tr class="sectiontableentry1">
					<td class="key">
						Blok Pengguna ini? :
					</td>
					<td>
						
	<input name="block" id="block0" value="0" class="inputbox" size="1" type="radio" <?php if($result['akses']==0){echo checked;} ?>>
	<label for="block0">Tidak</label>
	<input name="block" id="block1" value="1" class="inputbox" size="1" type="radio" <?php if($result['akses']==1){echo checked;} ?>>
	<label for="block1">Ya</label></td>
				</tr>
				
				<!--?php } if ($this->me->authorize( 'com_users', 'email_events' )) { ? -->
				<!-- tr class="sectiontableentry1">
					<td class="key">
						Terima E-mail Dari system
 					</td>
					<td>
						
	<input type="radio" name="sendEmail" id="sendEmail0" value="0" checked="checked" class="inputbox" size="1" />
	<label for="sendEmail0">no</label>
	<input type="radio" name="sendEmail" id="sendEmail1" value="1" class="inputbox" size="1" />
	<label for="sendEmail1">yes</label>
					</td>
				</tr -->
				<!-- ?php } if( $this->user->get('id') ) { ? -->
				
								<tr class="sectiontableentry2">
					<td class="key">
						Tarikh Daftar :
					</td>
					<td><?php echo $result['reg_date']; ?></td>
				</tr>
				<tr class="sectiontableentry1">
				  <td class="key">&nbsp;</td>
				  <td>&nbsp;</td>
				  </tr>
				<tr class="sectiontableentry1">
				  <td class="key">&nbsp;</td>
				  <td><input value="Kemaskini" type="submit" /></td>
				  </tr>
								<!-- td width="100%" height="20" class="sectiontableheader" colspan="2" align="center" style="text-align:center;"></td -->
        		
			</tbody></table></form>
  </div>
</div>
</body>
</html>
