<? 
include  "../include/db.php";

$negeri=$_GET['negeri'];

$query="SELECT id_daerah,diskripsi FROM ma_daerah WHERE id_negeri='$negeri'";
$result=mysql_query($query);
//echo $query;
$query2="SELECT kod_mukim,diskripsi FROM ma_mukim WHERE id_negeri='$negeri'";
$result2=mysql_query($query2);


?>
	<select name="daerah" style="margin-bottom:5px;">
		<? while($row2=mysql_fetch_array($result2)) { ?>
			<option value=<?=$row2['id_daerah']?> selected="selected"><?=$row2['diskripsi']?></option>
		<? } ?>
	</select> (Daerah) 
    <br />
	<select name="parlimen">				 
		<? while($row=mysql_fetch_array($result)) { ?>
			<option value=<?=$row['kod_mukim']?>><?=$row['diskripsi']?></option>
		<? } ?>
	</select>  (Mukim)	   	    			 
	        		
	 