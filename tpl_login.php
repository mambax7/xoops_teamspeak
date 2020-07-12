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
<link href="http://www.tswn.com/themes/default/style.css" rel="stylesheet" type="text/css">

 <table width="<?= ($setting["popupwidth"])-20 ?>" height="100%" class="listfont" align="center">
  <tr>
    <td align="center" valign="middle">
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="100%" bgcolor="<?= $setting["bordercolor"] ?>" class="listfont">
        <tr><form action="login.php" method="post">
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="server" value="teamspeak://<?php echo ''.$row->server_ip.':'.$row->server_port.''; ?>">
            <input type="hidden" name="servername" value="<?php echo ''.str_replace(" ", "", $row->server_name).''; ?>">
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory"><b><?php echo ''.$row->server_name.''; ?></b></td>
        </tr>
        <tr>
          <td class="head" align="center" class="listing">Nickname<br>
          <input type="text" name="nickname" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" class="catagory"><b>Optional Login</b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="listing">Login Name<br>
          <input type="text" name="loginname" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="listing">Login Password<br>
          <input type="password" name="password" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory"><b>Join Channel</b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="listing">Channel<br>
          <input type="text" name="channel" size="15" value="<? if (isset($HTTP_GET_VARS["channel"])) { echo ''.stripslashes($HTTP_GET_VARS["channel"]).''; } ?>">
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="listing">Channel Password<br>
          <input type="password" name="channelpassword" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" class="catagory"><input type="submit" value="Submit" class="button"> <input type="submit" value="Cancel" class="button" onclick="window.close();"></td>
        </tr></form>
      </table>
    </td>
  </tr>
</table>

</body>
</html>