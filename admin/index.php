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
  include("./db_inc.php");

if($xoopsUser->isAdmin()) {
  include("../tpl_style.php");
  include("tpl_admin_top.php");
  if (isset($HTTP_GET_VARS["action"])) {
    if ($HTTP_GET_VARS["action"] == 'settings') {
      include("tpl_settings.php");
    } else if ($HTTP_GET_VARS["action"] == 'email') {
      include("tpl_email.php");
    } else if ($HTTP_GET_VARS["action"] == 'submit') {
      include("tpl_submit.php");
    } else if ($HTTP_GET_VARS["action"] == 'phpinfo') {
      echo ''.phpinfo().'';
    }
  } else {
    include("tpl_admin.php");
  }
  include("tpl_admin_bot.php");
} else {
  header ("location: login.php");
}
?>
<?php
//////////////////////////////////////////XOOPS ADMIN FOOTER INFORMATION/////////////////////////////////////////
CloseTable();
xoops_cp_footer();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>