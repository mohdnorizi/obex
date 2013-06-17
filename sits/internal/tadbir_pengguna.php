<?php
	include("../include/db.php");
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
  <form method="post" action="" name="add_user">
   <table cellspacing="2">
	
				<tbody><tr>
					<td height="39" colspan="2" align="left">
					<img src="images/con_info.png" witdh="13" title="Maklumat" height="13"> Sila lengkapkan semua butiran di bawah.
					</td>
					</tr>
				
				<tr class="sectiontableentry2">
					<td class="key" width="250">
						<label for="name">
							Nama Sebenar :
						</label>
					</td>
					<td>
						<input name="name" id="name" class="inputbox" size="40" type="text">
					</td>
				</tr>
				<tr class="sectiontableentry1">
					<td class="key">
						<label for="email">
							E-mail :
						</label>
					</td>
					<td>
						<input class="inputbox" name="email" id="email" size="40" type="text">
					</td>
				</tr>
				<tr class="sectiontableentry2">
					<td class="key">
						<label for="username">Wilayah :
						</label>
					</td>
					<td><select class="inputbox required" id="user_region" size="1" name="user_region">
						<option value=""> -- Sila Pilih -- </option>
						<option value="PWJ"> Johor </option>
						<option value="PWU"> Utara </option>
						<option value="PWT"> Timur </option>
						<option value="PWC"> Tengah </option>
						<option value="PWSK"> Sarawak </option>
						<option value="PWSH"> Sabah </option>
						<option value="ALL"> Semua </option>
					</select></td>
				</tr>
				<tr class="sectiontableentry1">
					<td class="key" valign="top">
						<label for="gid">
							Kategori Pengguna :
						</label>
					</td>
					<td>
					<select name="type" id="filter_type" class="inputbox" size="1">
                        <option value="0" selected="selected">- Sila Pilih -</option>
                        <option value="SUPER ADMIN">SUPER ADMIN</option>
                        <option value="Pemproses Data">Pemproses Data</option>
                    </select>					
                    </td>
				</tr>
				<tr class="sectiontableentry2">
					<td class="key">
						<label for="username">
							ID Pengguna :
						</label>
					</td>
					<td>
						<input name="username" id="username" class="inputbox" size="40" type="text">
					</td>
				</tr>
				<tr class="sectiontableentry1">
					<td class="key">
						<label for="password">
							Kata Laluan :
						</label>
					</td>
					<td>
													<input class="inputbox" name="password" id="password" size="40" value="" type="password">
											</td>
				</tr>
				<tr class="sectiontableentry2">
					<td class="key">
						<label for="password2">
							Sahkan Kata Laluan :
						</label>
					</td>
					<td>
													<input class="inputbox" name="password2" id="password2" size="40" value="" type="password">
											</td>
				</tr>
								<tr class="sectiontableentry1">
					<td class="key">
						Blok Pengguna ini? :
					</td>
					<td>
						
	<input name="block" id="block0" value="0" checked="checked" class="inputbox" size="1" type="radio">
	<label for="block0">Tidak</label>
	<input name="block" id="block1" value="1" class="inputbox" size="1" type="radio">
	<label for="block1">Ya</label></td>
				</tr>
								<tr class="sectiontableentry1">
								  <td height="31" class="key">&nbsp;</td>
								  <td><input type="submit" name="submit" id="button" value="Submit" /></td>
				  </tr>
				
				
        		
			</tbody></table></form>
  </div>
</div>
<?php
if($_POST['submit']){
	
	extract($_REQUEST);
	
	$query = mysql_query("select *from pengguna where id = '$username'");
	$check = mysql_num_rows($query);
	
	if($check<1){
		$pwd = md5($password);
		
		$sql="INSERT INTO pengguna(nama,email,wilayah,kategori_pengguna,id,password,akses,reg_date)
			  VALUES('$name','$email','$user_region','$type','$username','$pwd','$block',now())";
		$result=mysql_query($sql);
		
		if($result){
			echo "<script type='text/javascript'>";
			echo "alert('Tambah User Berjaya')";
			echo "</script>";
		}
		else{
			echo "<script type='text/javascript'>";
			echo "alert('Tambah User Gagal')";
			echo "</script>";
		}
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Username Telah Digunakan')";
	echo "</script>";
	}
}
?>
</body>
</html>
