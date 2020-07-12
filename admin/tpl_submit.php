<?
//////////////////////////////////////////XOOOPS ADMIN HEADER INFORMATION////////////////////////////////////////
include("admin_header.php");
include("../../mainfile.php");
include_once(XOOPS_ROOT_PATH."/class/xoopstree.php");
include_once(XOOPS_ROOT_PATH."/class/module.errorhandler.php");
	global $xoopsDB;
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
include("tpl_auth.php");

if ($HTTP_GET_VARS["what"] == 'settings') {
  query("UPDATE $dbtable5 SET
    admin_pass='$HTTP_POST_VARS[set_admin_pass]',
    pagetitle='$HTTP_POST_VARS[set_pagetitle]',
    listadmin='$HTTP_POST_VARS[set_listadmin]',
    homepage='$HTTP_POST_VARS[set_homepage]',
    tablewidth='$HTTP_POST_VARS[set_tablewidth]',
    popupwidth='$HTTP_POST_VARS[set_popupwidth]',
    popupheight='$HTTP_POST_VARS[set_popupheight]',
    perpage='$HTTP_POST_VARS[set_perpage]',
    ispperpage='$HTTP_POST_VARS[set_ispperpage]',
    serverremove='$HTTP_POST_VARS[set_serverremove]',
    showgroups='$HTTP_POST_VARS[set_showgroups]',
    imgbg='$HTTP_POST_VARS[set_imgbg]',
    refresh='$HTTP_POST_VARS[set_refresh]',
    refreshtime='$HTTP_POST_VARS[set_refreshtime]',
    message='$HTTP_POST_VARS[set_message]',
    bodybgcolor='$HTTP_POST_VARS[set_bodybgcolor]',
    bodytxtcolor='$HTTP_POST_VARS[set_bodytxtcolor]',
    bodylnkcolor='$HTTP_POST_VARS[set_bodylnkcolor]',
    bodyvlnkcolor='$HTTP_POST_VARS[set_bodyvlnkcolor]',
    bodyalnkcolor='$HTTP_POST_VARS[set_bodyalnkcolor]',
    bordercolor='$HTTP_POST_VARS[set_bordercolor]',
    catrowcolor1='$HTTP_POST_VARS[set_catrowcolor1]',
    cattxtcolor='$HTTP_POST_VARS[set_cattxtcolor]',
    catlnkcolor='$HTTP_POST_VARS[set_catlnkcolor]',
    cathvrcolor='$HTTP_POST_VARS[set_cathvrcolor]',
    lsttxtcolor='$HTTP_POST_VARS[set_lsttxtcolor]',
    lstlnkcolor='$HTTP_POST_VARS[set_lstlnkcolor]',
    lstvlnkcolor='$HTTP_POST_VARS[set_lstvlnkcolor]',
    lstalnkcolor='$HTTP_POST_VARS[set_lstalnkcolor]',
    lsthvrcolor='$HTTP_POST_VARS[set_lsthvrcolor]',
    rowcolor1='$HTTP_POST_VARS[set_rowcolor1]',
    rowcolor2='$HTTP_POST_VARS[set_rowcolor2]',
    updatecheck='$HTTP_POST_VARS[set_updatecheck]'");
	redirect_header("tpl_settings.php",5,"Data Successfully Updated!!!");
} else if ($HTTP_GET_VARS["what"] == 'email') {
  $sqlemail = query("SELECT DISTINCT server_adminemail FROM $dbtable1 WHERE server_adminemail like '%@%'");
  $emailtothismany = number_format(mysql_num_rows($sqlemail));
  $fromname = $setting["pagetitle"];

  $message = "Email Sent to $emailtothismany server admins.";

  $sendname = stripslashes($HTTP_POST_VARS["email_name"]);
  $sendemail = stripslashes($HTTP_POST_VARS["email_email"]);
  $sendurl = stripslashes($HTTP_POST_VARS["email_url"]);
  $sendcomments = stripslashes($HTTP_POST_VARS["email_comments"]);

  $body = "From: $sendname\n";
  $body .= "Url: $sendurl\n\n";
  $body .= "Message: $sendcomments\n";

  while ($emaildata = mysql_fetch_row($sqlemail)) {
    mail("$emaildata[0]", "$fromname Teamspeak Serverlist", "$body", "From: $sendemail");
	redirect_header("tpl_email.php",5,"Email Successfully Sent!!!");
  }

} else {
  $message = 'Not sure what is updated here.';
}
?>