<?
/*
********************************************************************************
********************************************************************************
*                                                                              *
*        **************************************************************        *
*        * gllcts2 for TeamSpeak 2 (c) Gryphon, LLC                   *        *
*        * www.gryphonllc.com                                         *        *
*        *                                                            *        *
*        * (c) Copyright TeamCom Team, Ralf Ludwig, Niels Werensteijn *        *
*        * All rights are reserved.                                   *        *
*        * Copying or other reproduction of this                      *        *
*        * program except for archival purposes is prohibited without *        *
*        * the prior written consent of TC-Team.                      *        *
*        **************************************************************        *
*                                                                              *
********************************************************************************
********************************************************************************
*/
include("./admin/db_inc.php");

if (empty($HTTP_POST_VARS['server_port'])) {
  header ("location: $setting[homepage]");
}

if (getenv("HTTP_X_FORWARDED_FOR")) {
  $server_ip = getenv("HTTP_X_FORWARDED_FOR");
  if ($server_ip == '') {
    $server_ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
  }
  $server_ip = preg_replace( "/,.*$/", "", $server_ip );
} else {
  $server_ip = getenv("REMOTE_ADDR");
  if ($server_ip == '') {
    $server_ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
  }
}
if ($server_ip == '192.168.1.6'){//<-- LOCAL IP ADDRESS
$server_ip = "teamspeak.tswn.com";//<-- WAN IP ADDRESS
}else{
$server_ip = $server_ip;
}

$server_port = $HTTP_POST_VARS["server_port"];

$sql = query("SELECT * FROM $dbtable1 WHERE server_ip='$server_ip' AND server_port='$server_port'");

$server_adminemail = urldecode($HTTP_POST_VARS['server_adminemail']);

$server_isplinkurl = urldecode($HTTP_POST_VARS['server_isplinkurl']);
if (isset($server_isplinkurl) && $server_isplinkurl != 'na' && $server_isplinkurl != '') {
  if (preg_match("/http:\/\//i", $server_isplinkurl)) {
    $server_isplinkurl = $server_isplinkurl;
  } else {
    $server_isplinkurl = 'http://'.$server_isplinkurl.'';
  }
}

$server_linkurl = urldecode($HTTP_POST_VARS['server_linkurl']);
if (isset($server_linkurl) && $server_linkurl != 'na' && $server_linkurl != '') {
  if (preg_match("/http:\/\//i", $server_linkurl)) {
    $server_linkurl = $server_linkurl;
  } else {
    $server_linkurl = 'http://'.$server_linkurl.'';
  }
}

$server_name = urldecode($HTTP_POST_VARS['server_name']);
$server_name = trim(str_replace("", "", $server_name));

$server_ispname = addslashes(urldecode($HTTP_POST_VARS['server_ispname']));
$server_ispcountry = addslashes(urldecode($HTTP_POST_VARS['server_ispcountry']));

$server_password = addslashes(urldecode($HTTP_POST_VARS['server_password']));

if ($server_ispname == 'na') {
  $server_ispname = Private;
}

//$server_uptodate = ''.$HTTP_POST_VARS["server_version_major"].''.$HTTP_POST_VARS["server_version_minor"].''.$HTTP_POST_VARS["server_version_release"].''.$HTTP_POST_VARS["server_version_build"].'';

//if ($server_uptodate < "201940") { // Enter the version number you wish to allow, no decimals. Anything under this version will not be allowed.
//  exit;
//}

// update existing server
if (mysql_num_rows($sql)!= 0) {
  query("UPDATE $dbtable1 SET
    server_adminemail='$server_adminemail',
    server_isplinkurl='$server_isplinkurl',
    server_ispname='$server_ispname',
    server_ispcountry='$server_ispcountry',
    server_platform='$HTTP_POST_VARS[server_platform]',
    server_version_major='$HTTP_POST_VARS[server_version_major]',
    server_version_minor='$HTTP_POST_VARS[server_version_minor]',
    server_version_release='$HTTP_POST_VARS[server_version_release]',
    server_version_build='$HTTP_POST_VARS[server_version_build]',
    server_ip='$server_ip',
    server_port='$server_port',
    server_name='$server_name',
    server_uptime='$HTTP_POST_VARS[server_uptime]',
    server_password='$server_password',
    server_type1='$HTTP_POST_VARS[server_type1]',
    server_type2='$HTTP_POST_VARS[server_type2]',
    clients_current='$HTTP_POST_VARS[clients_current]',
    clients_maximum='$HTTP_POST_VARS[clients_maximum]',
    channels_current='$HTTP_POST_VARS[channels_current]',
    server_linkurl='$server_linkurl',
    server_queryport='$HTTP_POST_VARS[server_queryport]',
    server_timestamp='$server_timestamp'
      WHERE server_ip='$server_ip' AND server_port='$server_port'");
} else if ($server_port) {
// insert new server
  query("INSERT INTO $dbtable1
    (server_adminemail,
     server_isplinkurl,
     server_ispname,
     server_ispcountry,
     server_platform,
     server_version_major,
     server_version_minor,
     server_version_release,
     server_version_build,
     server_ip,
     server_port,
     server_name,
     server_uptime,
     server_password,
     server_type1,
     server_type2,
     clients_current,
     clients_maximum,
     channels_current,
     server_linkurl,
     server_queryport,
     server_timestamp)
      VALUES
    ('$server_adminemail',
     '$server_isplinkurl',
     '$server_ispname',
     '$server_ispcountry',
     '$HTTP_POST_VARS[server_platform]',
     '$HTTP_POST_VARS[server_version_major]',
     '$HTTP_POST_VARS[server_version_minor]',
     '$HTTP_POST_VARS[server_version_release]',
     '$HTTP_POST_VARS[server_version_build]',
     '$server_ip',
     '$server_port',
     '$server_name',
     '$HTTP_POST_VARS[server_uptime]',
     '$server_password',
     '$HTTP_POST_VARS[server_type1]',
     '$HTTP_POST_VARS[server_type2]',
     '$HTTP_POST_VARS[clients_current]',
     '$HTTP_POST_VARS[clients_maximum]',
     '$HTTP_POST_VARS[channels_current]',
     '$server_linkurl',
     '$HTTP_POST_VARS[server_queryport]',
     '$server_timestamp')");
}

if ($server_port) {
  $ts_version = "$HTTP_POST_VARS[server_version_major]" . "$HTTP_POST_VARS[server_version_minor]" . "$HTTP_POST_VARS[server_version_release]" . "$HTTP_POST_VARS[server_version_build]";
  insertchannelinfo($server_ip, $HTTP_POST_VARS["server_queryport"], $server_port, $ts_version);
  insertuserinfo($server_ip, $HTTP_POST_VARS["server_queryport"], $server_port, $ts_version);
}

$sqlg = query("SELECT * FROM $dbtable4 WHERE group_ispname='$server_ispname'");

// update existing server
if (mysql_num_rows($sqlg)!= 0) {
  $sqlg2 = query("SELECT * FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $groupservercount = mysql_num_rows($sqlg2);

  if (($server_ispname == 'Private') or ($server_ispname == '')) {
    $server_ispname = 'Private';
    $server_isplinkurl = 'na';
  }
  $sqlg3 = mysql_query("SELECT sum(clients_current) FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $sqlg3data = mysql_fetch_row($sqlg3);

  query("UPDATE $dbtable4 SET group_ispurl='$server_isplinkurl', group_ispname='$server_ispname', group_servers='$groupservercount', group_users='$sqlg3data[0]', server_timestamp='$server_timestamp' WHERE group_ispname='$server_ispname'");
} else if ($server_ispname) {
// insert new server
  $sqlg2 = query("SELECT * FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $groupservercount = mysql_num_rows($sqlg2);

  if (($server_ispname == 'Private') or ($server_ispname == '')) {
    $server_ispname = 'Private';
    $server_isplinkurl = 'na';
  }
  $sqlg3 = mysql_query("SELECT sum(clients_current) FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $sqlg3data = mysql_fetch_row($sqlg3);

  query("INSERT INTO $dbtable4 (group_ispurl,group_ispname,group_servers,group_users,server_timestamp) VALUES ('$server_isplinkurl','$server_ispname','$groupservercount','$sqlg3data[0]','$server_timestamp')");
}
?>