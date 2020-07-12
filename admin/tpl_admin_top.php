<?
/*
********************************************************************************
********************************************************************************
*                                                                              *
*        **************************************************************        *
*        * gllcTS2 for TeamSpeak 2 © Gryphon, LLC                     *        *
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
<table align="center" border="0" cellpadding="0" cellspacing="0" width="<?= $setting["tablewidth"] ?>" class="listfont">
  <tr>
    <td>
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td valign="top">
            <table cellpadding="2" cellspacing="0" width="261">
              <tr>
                <td align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" class="catagory" colspan="8"><a href="../listing.php?sort=clients_current&direction=desc&showgroup=all">Active Servers</a>: <? getservercount() ?> | <a href="../listing.php?sort=clients_current&direction=desc&showgroup=all">Users Online</a>: <? gettotalonline() ?></td>
              </tr>
            </table>
            <a href="../<?= $setting["homepage"] ?>"><img src="../images/ts_logo.gif" border="0" alt="<?= $setting["pagetitle"] ?>"></a>
          </td>
          <td align="center"><b><? if (isset($setting["message"])) { echo ''.$setting["message"].''; } ?></b></td>
        </tr>
      </table>
      <br>
      <table align="center" border="0" cellpadding="4" cellspacing="1" width="100%" bgcolor="<?= $setting["bordercolor"]  ?>">
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory" valign="middle" colspan="2" nowrap><b><?= $setting["pagetitle"] ?> Admin</b></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor1"] ?>" class="listing" valign="top" align="center" nowrap>
            <? include("tpl_admin_menu.php"); ?>
          </td>
          <td bgcolor="<?= $setting["rowcolor1"] ?>" width="100%" class="listing" valign="top" align="center">
