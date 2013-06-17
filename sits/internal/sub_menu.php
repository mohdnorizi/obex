<?php
@session_start();
?>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="100%"><span class="style1"><!--Menu Start-->
        <div class="menu_div">
        <ul>
        <li><a href="maklumat_umum.php?id=<?php echo $_SESSION['appinfo'] ?>">Maklumat Umum</a></li>
        <li><a href="maklumat_permohonan.php?id=<?php echo $_SESSION['appinfo'] ?>">Mak. Permohonan</a></li>
        <li><a href="maklumat_kebun.php?id=<?php echo $_SESSION['appinfo'] ?>">Tanam Semula</a></li>
         <li><a href="tempahan_anak_benih.php?id=<?php echo $_SESSION['appinfo'] ?>">Tempahan Anak Benih</a></li>
        <!--<li><a href="kaw_tanam_semula.php?id=<?php echo $_SESSION['appinfo'] ?>">Kaw. Tanam Semula</a></li>-->
      	<li><a href="lawatan_tebang.php?id=<?php echo $_SESSION['appinfo'] ?>">Lawatan Pertama</a></li>
        <li><a href="perakuan_wilayah.php?id=<?php echo $_SESSION['appinfo'] ?>">Perakuan K. Wilayah</a></li>
        <li><a href="keputusan_jks.php?id=<?php echo $_SESSION['appinfo'] ?>">Keputusan JKS</a></li>
       <li><a href="lawatan_tebang_kelulusan.php?id=<?php echo $_SESSION['appinfo'] ?>">Lawatan Penebangan Kelulusan Bayaran</a></li>
        
       
          
        <!--<li><a href="pembayaran.php?id=<?php echo $_SESSION['appinfo'] ?>">Pembayaran</a></li>
        <li><a href="surat.php?id=<?php echo $_SESSION['appinfo'] ?>">Surat</a></li>-->
        </ul>
        </div>
        <div class="menu_div">
        <ul>
        
        
        <li><a href="perakuan_wilayah_sokongan.php?id=<?php echo $_SESSION['appinfo'] ?>">Perakuan K. Wilayah Bayaran</a></li>
        
       
          
        <!--<li><a href="pembayaran.php?id=<?php echo $_SESSION['appinfo'] ?>">Pembayaran</a></li>
        <li><a href="surat.php?id=<?php echo $_SESSION['appinfo'] ?>">Surat</a></li>-->
        </ul>
        </div><!--Menu End--></span>
	</td>
  </tr>
</table>