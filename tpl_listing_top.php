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
include("tpl_style.php");
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="listfont">
  <tr>
    <td>
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td valign="top">
            <table cellpadding="2" cellspacing="0" width="100%">
              <tr>
                <td align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" class="even" colspan="8"><a href="listing.php?sort=clients_current&direction=desc&showgroup=all">Active Servers</a>: <? getactiveservercount() ?> | <a href="listing.php?sort=clients_current&direction=desc&showgroup=all">Users Online</a>: <? gettotalonline() ?></td>
              </tr>
            </table>
            
        </td>
          <td align="center" width="100%"><b><? if (isset($setting["message"])) { echo ''.$setting["message"].''; } ?></b></td>
        </tr>
      </table>
