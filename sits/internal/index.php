<?php 
	session_start();
	include("../include/db.php");
		
	if($_SESSION['kategori'] == ''){ header("location:../index.php");} 
?>
<frameset border="0" frameborder="0" framespacing="0" rows="14%,*">
<frame src="header.php" noresize="yes" SCROLLING="no">
  
<frameset cols = "*, 84%">
  <?php if($_SESSION['kategori'] == 'SUPER ADMIN'){ ?>
  <frame src ="menu.php" noresize="yes" SCROLLING="no"/>
  <?php }elseif($_SESSION['kategori'] == 'Pemproses Data'){ ?>
  <frame src ="menu_pemproses_data.php" noresize="yes" SCROLLING="no"/>
  <?php }else{} ?>
  <frame src ="main_page.php" name="content" noresize="yes"/>
</frameset>

</frameset><noframes></noframes>
