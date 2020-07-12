<?

include('../../mainfile.php'); 
include('admin/db_inc.php');

$sql = query("SELECT * FROM ".$xoopsDB->prefix("ts2_weblist")." WHERE server_ip='$server_ip' AND server_port='$server_port'");
echo $dbname;
?>