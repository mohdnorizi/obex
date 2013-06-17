<?PHP
function getDaerah($kod)
{
   	$sql_query = mysql_query("SELECT daerah FROM daerah where kod_daerah='$kod'");
    $myrow = mysql_fetch_array($sql_query);
    mysql_free_result($sql_query);
    return $myrow[0];
}
function getParlimen($id)
{
   	$sql_query = mysql_query("SELECT kawasan FROM parlimen where id=$id");
    $myrow = mysql_fetch_array($sql_query);
    mysql_free_result($sql_query);
    return $myrow[0];
}
function getNegeri($id)
{
   	$sql_query = mysql_query("SELECT diskripsi FROM ma_negeri where id_negeri=$id");
    $myrow = mysql_fetch_array($sql_query);
    mysql_free_result($sql_query);
    return $myrow[0];
}
function getDaerahKebun($id)
{
   	$sql_query = mysql_query("SELECT diskripsi FROM ma_daerah where id_daerah=$id");
    $myrow = mysql_fetch_array($sql_query);
    mysql_free_result($sql_query);
    return $myrow[0];
}
function getMukim($id)
{
   	$sql_query = mysql_query("SELECT diskripsi FROM ma_mukim where kod_mukim = '$id'");
	$myrow = mysql_fetch_array($sql_query);
    mysql_free_result($sql_query);
    return $myrow[0];
}
?>