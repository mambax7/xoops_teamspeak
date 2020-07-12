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
?>
        <tr>
          <td width="100%" align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" class="odd" colspan="7">Servers update in 5 minute intervals | <? // Please do not remove copyright, Thank you. ?><a href="http://www.gryphonllc.com" target="_blank">© 2002-<?= date("Y") ?> Gryphon, LLC</a><? // Please do not remove copyright, Thank you. ?> | Total Servers: <? getservercount() ?> | Total Channels: <? getchannelcount(); ?></td>
        </tr>
<?
if ((($setting["listadmin"]) and ($setting["listadmin"] != 'admin@yoursite.com')) or ($setting["refresh"] == 'on')) {
  echo '        <tr>
          <td align="center" bgcolor="'.$setting["catrowcolor1"].'" class="even" colspan="7">';
  if (($setting["listadmin"]) and ($setting["listadmin"] != 'admin@yoursite.com')) {
    echo 'Contact the serverlist administrator at <a href="mailto:'.$setting["listadmin"].'">'.$setting["listadmin"].'</a>';
  }
  if ((($setting["listadmin"]) and ($setting["listadmin"] != 'admin@yoursite.com')) and ($setting["refresh"] == 'on')) {
    echo ' | ';
  }
  if ($setting["refresh"] == 'on') {
    echo ''.$setting["refreshtime"].' second Auto-refresh.';
  }
  echo "          </td>
        </tr>\n";
}
?>
      </table>
    </td>
  </tr>
</table>

<?
if (file_exists("z_donate.php")) {
  include("z_donate.php");
}
?>

</body>
</html>