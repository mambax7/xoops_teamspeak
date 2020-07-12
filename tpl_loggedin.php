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
<table width="<?= ($setting["popupwidth"])-20 ?>" height="100%" class="listfont" align="center">
  <tr>
    <td align="center" valign="middle">
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="100%" bgcolor="<?= $setting["bordercolor"]  ?>">
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory"><b>
            <a href="
            <?php
              echo ''.$HTTP_POST_VARS["server"].'/nickname='.$HTTP_POST_VARS["nickname"].'?loginname='.stripslashes($HTTP_POST_VARS["loginname"]).'?password='.$HTTP_POST_VARS["password"].'?channel='.stripslashes($HTTP_POST_VARS["channel"]).'?channelpassword='.$HTTP_POST_VARS["channelpassword"].'';
            ?>">
            Click here<br>to Log in</a></b>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

</body>
</html>
