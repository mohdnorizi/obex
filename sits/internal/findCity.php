<?php

include("../include/db.php");

$countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);

$query="SELECT kod_mukim,diskripsi FROM ma_mukim WHERE id_negeri='$countryId' AND id_daerah='$stateId'";
$result=mysql_query($query);

?>
<select name="city">
<option>Pilih Daerah</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value="<?=$row['kod_mukim']?>"><?=$row['diskripsi']?></option>
<? } ?>
</select>
