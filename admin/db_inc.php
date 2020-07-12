<?
/*
********************************************************************************
********************************************************************************
*                                                                              *
*        **************************************************************        *
*        * gllcTS2 for TeamSpeak 2 (c) Gryphon, LLC                   *        *
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
//error_reporting(E_ALL);
error_reporting  (E_ERROR | E_WARNING | E_PARSE);

if (file_exists("config.php")) {
  include("./config.php");
} else {
  include("./admin/config.php");
}

$wpost2version = "4.1.4";
$server_timestamp = time();

$dbtable1 = "$dbprefix" . "weblist"; // Table for servers
$dbtable2 = "$dbprefix" . "user"; // Table for server details
$dbtable3 = "$dbprefix" . "channel"; // Table for server details
$dbtable4 = "$dbprefix" . "group"; // Table for server isp groups
$dbtable5 = "$dbprefix" . "admin"; // Table for admin and options

  // main db info
  function db_main() {
    global $dblink;
    global $dbuser;
    global $dbpw;
    global $dbname;

    $main_db = @mysql_connect($dblink, $dbuser, $dbpw);
    if (!$main_db) {
      echo "Could not connect to main MySQL.";
      exit();
    }
    if (!@mysql_select_db($dbname, $main_db)) {
      echo "Unable to select database.";
      exit();
    }
    return $main_db;
  }

  function query($query) {
    $result = mysql_query($query);
    if (!$result) {
    echo "MySQL Error in [ <b>".$query."</b> ]: ".mysql_error()."<br><br>Please contact a the site admin immediately.<br>";
    exit();
    }
    return $result;
  }

  // connect to the main db
  $main_db = db_main();

  function fetch_row($insert) {
    $result = query($insert);
    if(mysql_num_rows($result)==0){
      return "";
    } else {
      while($x = mysql_fetch_row($result)) { $xx[]= htmlspecialchars($x[0]);}
      return $xx;
    }
    mysql_free_result($result);
  }

  function mod($f,$g) {
    $r = floor($f / $g);
    $f = $f - ($r * $g);
    return $f;
  }

  function getuptime($var2) {
    $r = floor($var2);
    $uptimes = mod($r,60);

    $r = floor($r / 60);
    $uptimem = mod($r,60);

    $r = floor($r / 60);
    $uptimeh = mod($r,24);

    $uptimed = number_format(floor($r / 24));

    echo ''.$uptimed.'d '.$uptimeh.'h<br>'.$uptimem.'m '.$uptimes.'s';
  }

  function getlogindetail($var3) {
    global $dbtable1;
    $logindata = query("SELECT * FROM $dbtable1 WHERE server_id='$var3'");
    $servername = str_replace(" ", "", $logindata[12]);
    $servername = preg_replace("/[^0-9a-z -#]/i",'', $servername);

    global $channel;

    $channel = stripslashes($channel);

    include("tpl_login.php");
  }

  function getservercount() {
    global $dbtable1;
    $sql = query("SELECT * FROM $dbtable1");
    $servercount = number_format(mysql_num_rows($sql));
    echo ''.$servercount.'';
  }

  function getgroupcount() {
    global $dbtable4;
    $sql = query("SELECT * FROM $dbtable4");
    $groupcount = number_format(mysql_num_rows($sql));
    echo ''.$groupcount.'';
  }

  function getactiveservercount() {
    global $dbtable1;
    $sql = query("SELECT * FROM $dbtable1 WHERE clients_current > 0");
    $activeservercount = number_format(mysql_num_rows($sql));
    echo ''.$activeservercount.'';
  }

  function getchannelcount() {
    global $dbtable3;
    $sql = query("SELECT * FROM $dbtable3");
    $channelcount = number_format(mysql_num_rows($sql));
    echo ''.$channelcount.'';
  }

  function gettotalonline() {
    $users = '0';
    global $dbtable1;
    $sql = query("SELECT * FROM $dbtable1 WHERE clients_current > 0");
    $servercount = number_format(mysql_num_rows($sql));
    while ($data = mysql_fetch_row($sql)) {
      $users = $users + $data[17];
    }
    echo ''.$users.'';
  }

  function table_exists($table, $db) {
    $tables = mysql_list_tables($db);
    while (list($temp) = mysql_fetch_array($tables)) {
      if($temp == $table) {
        return TRUE;
      }
    }
    return FALSE;
  }

  if (table_exists($dbtable5, $dbname)) {
    $settingsql = query("SELECT * FROM $dbtable5");
    $setting = mysql_fetch_array($settingsql);
    $rowcolor = $setting["rowcolor2"];
  }

  function getpldetail($var1, $var2, $var3, $var4) {
    global $dbtable2;
    global $setting;
    if ($var4 == 'sub') { $plsub = "sub"; }
    $sql = query("SELECT * FROM $dbtable2 WHERE server_ip='$var1' AND server_port='$var2' and pl_channelid='$var3' ORDER BY pl_playerprivileges desc, pl_nickname asc");
    while ($pldata = mysql_fetch_row($sql)) {

      if ($pldata[14] == '13') {
        $plpriv = "R <b>SA</b>";
      } else if ($pldata[14] == '5') {
        $plpriv = "R SA";
      } else if ($pldata[14] == '4') {
        $plpriv = "R";
      } else if ($pldata[14] == '0') {
        $plpriv = "U";
      }
      if ($pldata[13] == '1') {
        $clpriv = " CA";
      } else {
        $clpriv = "";
      }
      if ($pldata[15] != '0') {
        $plflag = $pldata[15];
      } else {
        $plflag = "0";
      }
      if ($var4 == 'sub') {
      echo '<nobr><img src="images/bullet_sub.gif">';
      } else if ($var4 == 'nonsub') {
        echo '<nobr>';
      }
      echo '<img src="images/bullet_'.$plflag.'.gif" align="absmiddle" alt="User" title="Ping '.$pldata[10].' | Packet Loss '.$pldata[9].'"> '.$pldata[17].' ('.$plpriv.''.$clpriv.')</nobr><br>';
    }
  }

  function getsubcldetail($var1, $var2, $var3, $var4, $var5) {
    global $detail;
    global $dbtable3;
    global $setting;
    $sql = query("SELECT * FROM $dbtable3 WHERE server_ip='$var1' AND server_port='$var2' and cl_parent='$var3' ORDER BY cl_order asc, cl_number");
    while ($clsubdata = mysql_fetch_row($sql)) {
      $clsubname = stripslashes($clsubdata[8]);
      $clsubnamelink = urlencode($clsubname);

      $topic = htmlentities($clsubdata[11]);
      echo '<nobr><img src="images/bullet_subchannel.gif" align="absmiddle"> <a href="login.php?detail='.$var5.'&channel='.$clsubnamelink.'" title="Click to join subchannel \''.$clsubdata[8].'\' on server '.$var1.':'.$var2.' | Topic: '.$topic.' | This opens in a popup window." onClick="NewWindow(this.href,\'login\',\''; echo ''.$setting["popupwidth"].''; echo '\',\''; echo ''.$setting["popupheight"].''; echo '\');return false">'.$clsubname.'</a></nobr><br>';  echo "\n                  ";
      getpldetail($var1, $var2, $clsubdata[3], "sub");
    }
  }

  function getcldetail($var1, $var2, $var3) {
    global $dbtable3;
    global $setting;
    $sql = query("SELECT * FROM $dbtable3 WHERE server_ip='$var1' AND server_port='$var2' and cl_parent='-1' ORDER BY cl_order asc, cl_name, cl_number");
    if (mysql_num_rows($sql) == 0) {
      echo '<center><b>Data unavailable.<br>TCPQueryPort may not be open.</b></center>';
    }
    while ($cldata = mysql_fetch_row($sql)) {
      $clname = stripslashes($cldata[8]);
      $clnamelink = urlencode($clname);

      $topic = htmlentities($cldata[11]);

      if ($cldata[10] == '0') {
         $clpriv = "0";
      } else {
         $clpriv = "1";
      }

      // (RMPSD) (0 2 4 6 8 16)

      if ($cldata[9] == '30') {
        $clflag = "(RMPSD)";
      } else if ($cldata[9] == '28') {
        $clflag = "(RPSD)";
      } else if ($cldata[9] == '26') {
        $clflag = "(RMSD)";
      } else if ($cldata[9] == '24') {
        $clflag = "(RSD)";
      } else if ($cldata[9] == '22') {
        $clflag = "(RMPD)";
      } else if ($cldata[9] == '20') {
        $clflag = "(RPD)";
      } else if ($cldata[9] == '18') {
        $clflag = "(RMD)";
      } else if ($cldata[9] == '16') {
        $clflag = "(RD)";
      } else if ($cldata[9] == '15') {
        $clflag = "(UMPS)";
      } else if ($cldata[9] == '14') {
        $clflag = "(RMPS)";
      } else if ($cldata[9] == '13') {
        $clflag = "(UPS)";
      } else if ($cldata[9] == '12') {
        $clflag = "(RPS)";
      } else if ($cldata[9] == '11') {
        $clflag = "(UMS)";
      } else if ($cldata[9] == '10') {
        $clflag = "(RMS)";
      } else if ($cldata[9] == '9') {
        $clflag = "(US)";
      } else if ($cldata[9] == '8') {
        $clflag = "(RS)";
      } else if ($cldata[9] == '7') {
        $clflag = "(UMP)";
      } else if ($cldata[9] == '6') {
        $clflag = "(RMP)";
      } else if ($cldata[9] == '5') {
        $clflag = "(UP)";
      } else if ($cldata[9] == '4') {
        $clflag = "(RP)";
      } else if ($cldata[9] == '3') {
        $clflag = "(UM)";
      } else if ($cldata[9] == '2') {
        $clflag = "(RM)";
      } else if ($cldata[9] == '1') {
        $clflag = "(U)";
      } else if ($cldata[9] == '0') {
        $clflag = "(R)";
      } else {
        $clflag = "";
      }

      echo '<nobr><img src="images/bullet_channel.gif" align="absmiddle"> <a href="login.php?detail='.$var3.'&channel='.$clnamelink.'" title="Click to join channel \''.$clname.'\' on server '.$var1.':'.$var2.' | Topic: '.$topic.'" onClick="NewWindow(this.href,\'login\',\''; echo ''.$setting["popupwidth"].''; echo '\',\''; echo ''.$setting["popupheight"].''; echo '\');return false">'.$clname.'</a>&nbsp;&nbsp;'.$clflag.'</nobr><br>';  echo "\n                  ";
      getsubcldetail($var1, $var2, $cldata[3], $clpriv, $var3);
      getpldetail($var1, $var2, $cldata[3], "nonsub");
    }
  }

  function insertchannelinfo($var1, $var2, $var3, $var4) {
    global $server_timestamp;
    global $dbtable3;

    $cmd = "cl $var3\nquit\n";

    $connection = @fsockopen ("$var1", $var2, &$errno, &$errstr, 1);
    if (!$connection) {
     // echo "Cannot connect: ($errno)-$errstr<br>";
    } else {
      @fputs($connection,$cmd, strlen($cmd));
      while($channeldata = @fgets($connection, 4096)) {
        $channeldata = explode("	", $channeldata);
        $channeldata0 = trim($channeldata[0]);  // number
        $channeldata1 = trim($channeldata[1]);  // codec
        $channeldata2 = trim($channeldata[2]);  // parent
        $channeldata3 = trim($channeldata[3]);  // order
        $channeldata4 = trim($channeldata[4]);  // maxuser
        $channeldata5 = addslashes(htmlspecialchars(trim($channeldata[5], "\x22\x27"))); // name
        $channeldata6 = trim($channeldata[6]);  // channel flags
        $channeldata7 = trim($channeldata[7]);  // priv/pub
        $channeldata8 = addslashes(htmlspecialchars(trim($channeldata[8], "\x22\x27\x0D\n"))); // topic

        $sql = query("SELECT * FROM $dbtable3 WHERE server_ip='$var1' AND server_port='$var3' AND cl_number='$channeldata0'");

        if ((mysql_num_rows($sql) != 0) && is_numeric($channeldata0)) {
            query("UPDATE $dbtable3 SET
              server_ip='$var1',
              server_port='$var3',
              cl_number='$channeldata0',
              cl_codec='$channeldata1',
              cl_parent='$channeldata2',
              cl_order='$channeldata3',
              cl_maxuser='$channeldata4',
              cl_name='$channeldata5',
              cl_flags='$channeldata6',
              cl_private='$channeldata7',
              cl_topic='$channeldata8',
              server_timestamp='$server_timestamp'
                 WHERE server_ip='$var1'
                 AND server_port='$var3'
                 AND cl_number='$channeldata0'
          ");
        } else if (is_numeric($channeldata0)) {
          query("INSERT INTO $dbtable3
           (server_ip, server_port, cl_number, cl_codec, cl_parent, cl_order, cl_maxuser, cl_name, cl_flags, cl_private, cl_topic, server_timestamp)
             VALUES
           ('$var1','$var3','$channeldata0','$channeldata1','$channeldata2','$channeldata3','$channeldata4','$channeldata5','$channeldata6','$channeldata7','$channeldata8','$server_timestamp')
          ");
        }
      }
      @fclose($connection);
    }
  }

  function insertuserinfo($var1, $var2, $var3, $var4) {
    global $server_timestamp;
    global $dbtable2;

    $cmd = "pl $var3\nquit\n";

    $connection = @fsockopen ("$var1", $var2, &$errno, &$errstr, 1);
    if (!$connection) {
      // echo "Cannot connect: ($errno)-$errstr<br>";
    } else {
      @fputs($connection,$cmd, strlen($cmd));
      while($userdata = @fgets($connection, 4096)) {
        $userdata = explode("	", $userdata);
        $userdata0 = trim($userdata[0]);  // pl_id
        $userdata1 = trim($userdata[1]);  // pl_channelid
        $userdata2 = trim($userdata[2]);  // pl_pktssend
        $userdata3 = trim($userdata[3]);  // pl_bytessend
        $userdata4 = trim($userdata[4]);  // pl_pktsrecv
        $userdata5 = trim($userdata[5]);  // pl_bytesrecv
        $userdata6 = trim($userdata[6]);  // pl_pktloss
        $userdata7 = trim($userdata[7]);  // pl_ping
        $userdata8 = trim($userdata[8]);  // pl_logintime
        $userdata9 = trim($userdata[9]);  // pl_idletime
        $userdata10 = trim($userdata[10]);  // pl_channelprivileges
        $userdata11 = trim($userdata[11]);  // pl_playerprivileges
        $userdata12 = trim($userdata[12]);  // pl_playerflags
        $userdata13 = trim($userdata[13], "\x22\x27");  // pl_ipaddress
        $userdata14 = addslashes(htmlspecialchars(trim($userdata[14], "\x22\x27"))); // pl_nickname
        $userdata15 = trim($userdata[15], "\x22\x27"); // pl_loginname

        $sql = query("SELECT * FROM $dbtable2 WHERE server_ip='$var1' AND server_port='$var3' AND pl_nickname='$userdata14'");

        if ((mysql_num_rows($sql) != 0) && is_numeric($userdata0)) {
          query("UPDATE $dbtable2 SET
              server_ip='$var1',
              server_port='$var3',
              pl_id='$userdata0',
              pl_channelid='$userdata1',
              pl_pktssend='$userdata2',
              pl_bytessend='$userdata3',
              pl_pktsrecv='$userdata4',
              pl_bytesrecv='$userdata5',
              pl_pktloss='$userdata6',
              pl_ping='$userdata7',
              pl_logintime='$userdata8',
              pl_idletime='$userdata9',
              pl_channelprivileges='$userdata10',
              pl_playerprivileges='$userdata11',
              pl_playerflags='$userdata12',
              pl_ipaddress='$userdata13',
              pl_nickname='$userdata14',
              pl_loginname='$userdata15',
              server_timestamp='$server_timestamp'
                 WHERE server_ip='$var1'
                 AND server_port='$var3'
                 AND pl_nickname='$userdata14'
          ");
        } else if (is_numeric($userdata0)) {
          query("INSERT INTO $dbtable2
           (server_ip, server_port, pl_id, pl_channelid, pl_pktssend, pl_bytessend, pl_pktsrecv, pl_bytesrecv, pl_pktloss, pl_ping, pl_logintime, pl_idletime, pl_channelprivileges, pl_playerprivileges, pl_playerflags, pl_ipaddress, pl_nickname, pl_loginname, server_timestamp)
             VALUES
           ('$var1','$var3','$userdata0','$userdata1','$userdata2','$userdata3','$userdata4','$userdata5','$userdata6','$userdata7','$userdata8','$userdata9','$userdata10','$userdata11','$userdata12','$userdata13','$userdata14','$userdata15','$server_timestamp')
          ");
        }
      }
      @fclose($connection);
    }
  }

  function clearinactive($var1) {
    global $server_timestamp;
    global $dbtable1;
    global $dbtable2;
    global $dbtable3;
    global $dbtable4;
    global $PHP_SELF;

    if ($var1 != '0' && !preg_match("/admin/i", $PHP_SELF)) {
      query("delete from $dbtable1 where (server_timestamp + $var1) < '$server_timestamp'");
      query("delete from $dbtable2 where (server_timestamp + $var1) < '$server_timestamp'");
      query("delete from $dbtable3 where (server_timestamp + $var1) < '$server_timestamp'");
      query("delete from $dbtable4 where (server_timestamp + $var1) < '$server_timestamp'");
    }
  }

  if (isset($HTTP_POST_VARS["pass"])) {
    $pass = $HTTP_POST_VARS["pass"];
  } else if (isset($HTTP_GET_VARS["pass"])) {
    $pass = $HTTP_GET_VARS["pass"];
  } else {
    $pass = "";
  }
?>