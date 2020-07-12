<?
//////////////////////////////////////////XOOOPS ADMIN HEADER INFORMATION////////////////////////////////////////
include("admin_header.php");
include("../../mainfile.php");
include_once(XOOPS_ROOT_PATH."/class/xoopstree.php");
include_once(XOOPS_ROOT_PATH."/class/module.errorhandler.php");
	global $xoopsDB;
	xoops_cp_header();
	openTable();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
include("tpl_auth.php");
include("./db_inc.php");
  include("../tpl_style.php");
  include("tpl_admin_top.php");
$REQUEST_URI = str_replace("admin/index.php?action=email&pass=$pass", "", $HTTP_SERVER_VARS["REQUEST_URI"]);
$url = "http://{$HTTP_SERVER_VARS['HTTP_HOST']}{$REQUEST_URI}";
?>
      <br>
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="98%" bgcolor="<?= $setting["bordercolor"]  ?>">
        <tr><form name="report" method="post" action="index.php?action=submit&what=email">
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory" valign="middle" colspan="2" nowrap><b>Email Server Admins</b></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing" colspan="2">This will allow you to send out notices to all server admins who have specified a contact email address in their server settings.  You can notify them of such things as TeamSpeak server upgrades or web site maintenance.</td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing" nowrap><b>Your Name :</b></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing" width="100%"><input type="text" name="email_name" size="35"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing" nowrap><b>Your Email :</b></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing"><input type="text" name="email_email" size="35"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing" nowrap><b>Your Url :</b></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing"><input type="text" name="email_url" value="<?= $url ?>" size="35"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing" valign="top" nowrap><b>Comments :</b></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" class="listing"><textarea cols="60" rows="15" name="email_comments"></textarea></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory" valign="middle" colspan="2" nowrap>Depending on how many servers there are, this can take a while.<br>Please be patient after pressing submit.<br><br>
            <input type="hidden" name="pass" value="<?= $pass ?>"><input type="submit" value="Submit"> <input type="reset" value="Reset" onclick="location.reload()">
          </td>
        </tr></form>
      </table></table></table>
	  	  <?php

//////////////////////////////////////////XOOPS ADMIN FOOTER INFORMATION/////////////////////////////////////////
CloseTable();
xoops_cp_footer();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
