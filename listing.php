<?
include("../../mainfile.php"); 
include(XOOPS_ROOT_PATH."/header.php");

global $xoopsConfig;$xoopsDB;$xoopsTheme;
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
  include("./admin/db_inc.php");
  clearinactive($setting["serverremove"]);

  if (isset($HTTP_GET_VARS["direction"])) {
    $direction = $HTTP_GET_VARS["direction"];
  }
  if (isset($HTTP_GET_VARS["page"])) {
    $page = $HTTP_GET_VARS["page"];
  }

  if (!isset($HTTP_GET_VARS["sort"])) {
    $version_direction = "void";
    $sort = "server_name";
  } else if ($HTTP_GET_VARS["sort"] == 'server_version') {
    $version_direction = "server_version";
    $sort = "server_version_major ".$direction.", server_version_minor ".$direction.", server_version_release ".$direction.", server_version_build";
  } else {
    $version_direction = "void";
    $sort = $HTTP_GET_VARS["sort"];
  }

  if ((!isset($HTTP_GET_VARS["showgroup"])) or ($HTTP_GET_VARS["showgroup"] == 'all')) {
    $showgroup = "all";
    $group = "WHERE 1";
  } else if ($HTTP_GET_VARS["showgroup"] == 'Private') {
    $group = "WHERE server_ispname='$showgroup' OR server_ispname=''";
  } else if ($HTTP_GET_VARS["showgroup"] != 'Private') {
    $group = "WHERE server_ispname='$HTTP_GET_VARS[showgroup]'";
  }

  include("tpl_listing_top.php");

  if (isset($HTTP_GET_VARS["direction"])) {
    $pagedirection = $HTTP_GET_VARS["direction"];
  }

  if (empty($pagedirection)) {
    $pagedirection = "asc";
  }

  if (empty($direction)) {
    $direction = "asc";
  }
  if (empty($page)) {
    $page = 1;
    $pagestart = $page -1;
  } else {
    $pagestart = (($page -1) * $setting["perpage"]);
  }

  $serverquery = query("SELECT * FROM $dbtable1 $group");
  $servercount = number_format(mysql_num_rows($serverquery));

  $request = query("SELECT * FROM $dbtable1 $group order by $sort $direction, server_name LIMIT $pagestart,$setting[perpage]");

  if ($direction == "asc") {
    $direction = "desc";
  } else if ($direction == "desc") {
    $direction = "asc";
  }

  if (!empty($HTTP_GET_VARS["detail"])) {
    $r = query("SELECT * FROM $dbtable1 WHERE server_ip='$HTTP_GET_VARS[detail]' AND server_port='$HTTP_GET_VARS[detailport]'");
    $detaildata = mysql_fetch_row($r);

    include("tpl_serverdetail.php");
  }

  include("tpl_serverlist_top.php");

  if ($servercount > $setting["perpage"]) {
    include("tpl_serverlist_nav.php");
  }
  while ($row = mysql_fetch_object($request)) {

    if ($rowcolor == $setting["rowcolor2"]) {
      $rowcolor = $setting["rowcolor1"];
    } else {
      $rowcolor = $setting["rowcolor2"];
    }

    include("tpl_serverlist.php");

  }

  if ($servercount > $setting["perpage"]) {
    include("tpl_serverlist_nav.php");
  }

  include("tpl_serverlist_bot.php");
?>
<?php
include(XOOPS_ROOT_PATH."/footer.php");
?>