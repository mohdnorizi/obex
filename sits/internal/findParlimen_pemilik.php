<? 
include  "../include/db.php";

$negeri=$_GET['negeri_pemilik'];

$query="SELECT id,kawasan FROM parlimen WHERE negeri='$negeri'";
$result=mysql_query($query);

$query2="SELECT id,kod_daerah,daerah FROM daerah WHERE kod_negeri='$negeri'";
$result2=mysql_query($query2);

?>
	<select name="daerah_pemilik" style="margin-bottom:5px;">
		<? while($row2=mysql_fetch_array($result2)) { ?>
			<option value=<?=$row2['kod_daerah']?> selected="selected"><?=$row2['daerah']?></option>
		<? } ?>
	</select> (Daerah) 
    <br />
	<select name="parlimen_pemilik">				 
		<? while($row=mysql_fetch_array($result)) { ?>
			<option value=<?=$row['id']?>><?=$row['kawasan']?></option>
		<? } ?>
	</select>  (Parlimen)	   	    			 
	        		
	 