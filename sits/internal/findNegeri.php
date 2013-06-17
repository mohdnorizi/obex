<?php
include("../include/db.php");

$country=intval($_GET['country']);

$query="SELECT id_daerah,diskripsi FROM ma_daerah WHERE id_negeri='$country'";
$result=mysql_query($query);

?>
<select name="daerah" onchange="getDaerah(<?=$country?>,this.value)">
<option>Pilih Daerah</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value=<?=$row['id_daerah']?>><?=$row['diskripsi']?></option>
<? } ?>
</select>
