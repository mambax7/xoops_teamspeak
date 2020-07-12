<?
/*
********************************************************************************
********************************************************************************
*                                                                              *
*        **************************************************************        *
*        * ssWebpost2 for TeamSpeak 2 (c) Gryphon, LLC                *        *
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
  include("admin/db_inc.php");
  clearinactive($setting["serverremove"]);

  $tickermarg = 'topmargin="0" leftmargin="0" marginwidth="0" marginheight="0"';
  $tickerrefresh = '<meta http-equiv="Refresh" content="30">';

  if (isset($HTTP_GET_VARS["group"])) {
    $show = "WHERE server_ispname='$HTTP_GET_VARS[group]'";
  }
  if (isset($HTTP_GET_VARS["name"])) {
    $show = "WHERE server_name='$HTTP_GET_VARS[name]'";
  }

  $sql = query("SELECT * FROM $dbtable1 $show ORDER BY clients_current DESC LIMIT 1");

  while ($data = mysql_fetch_row($sql)) {
    if ($data[17] != '0') {
      $online = 'on';
    } else {
      $online = 'off';
    }
  }

  include("tpl_style.php");
?>

<table border="0" cellpadding="0" cellspacing="0" width="191" height="20">
  <tr>
    <td align="center" width="15"><a href="index.php" target="_blank"><img src="images/<?= $online ?>.gif" alt="<?= $online ?>"></a></td>
    <td valign="top">
      <marquee direction="up" scrollAmount="1" style="width:170px; height:18px; border:0px solid white; padding:1px" onMouseover="this.scrollAmount=0" onMouseout="this.scrollAmount=1">
        <table border="0" cellpadding="0" cellspacing="1" width="100%" bgcolor="<?= $setting["bordercolor"] ?>" class="listfont">
          <tr>
            <td align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" colspan="2" class="catagory" valign="middle"><b><a href="index.php" target="spf_latest">TeamSpeak Servers</a></b></td>
          </tr><?
  $sql2 = query("SELECT * FROM $dbtable1 $show ORDER BY clients_current DESC");
  while ($data2 = mysql_fetch_row($sql2)) {
    if ($rowcolor == $setting["rowcolor2"]) {
      $rowcolor = $setting["rowcolor1"];
    } else {
      $rowcolor = $setting["rowcolor2"];
    }

    echo '
          <tr>
            <td align="center" bgcolor="'.$rowcolor.'" class="listing" nowrap><a href="listing.php?detail='.$data2[10].'&detailport='.$data2[11].'" target="spf_latest">'.$data2[10].':'.$data2[11].'</a></td>
            <td align="center" bgcolor="'.$rowcolor.'" class="listing">'.$data2[17].'</td>
          </tr>';
  }
?>

        </table>
      </marquee>
    </td>
  </tr>
</table>

</body>
</html>