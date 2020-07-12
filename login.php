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

if (isset($HTTP_POST_VARS["action"])) {
  include("./admin/db_inc.php");
  include("tpl_style.php");
  include("tpl_loggedin.php");
} else {
  include("./admin/db_inc.php");
  include("tpl_style.php");
  $r = query("SELECT * FROM $dbtable1 WHERE server_id='$HTTP_GET_VARS[detail]'");
  $row = mysql_fetch_object($r);

  include("tpl_login.php");
}
?>