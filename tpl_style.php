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
<html>
<head>
<title><?= $setting["pagetitle"] ?> - TeamSpeak2 Serverlist</title>
<meta name="keywords" content="teamspeak, serverlist, webpost, <?= $setting["pagetitle"] ?>">
<meta name="description" content="gllcTS2 for TeamSpeak 2 (c) Gryphon, LLC www.gryphonllc.com">
<meta name="robots" content="all">

<script language="javascript" type="text/javascript">
var win = null;
function NewWindow(mypage,myname,w,h) {
  LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
  TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
  settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+''
  win = window.open(mypage,myname,settings)
}
function upc(preview,newvalue,findword) {
  preview.style.backgroundColor = newvalue;
}
</script>
</script>
<? if ($setting["refresh"] == 'on') { echo '<meta http-equiv="refresh" content="'.$setting["refreshtime"].'">'; } ?>
<? if (isset($tickerrefresh)) { echo ''.$tickerrefresh.''; } ?>

</head>

<body bgcolor="<?= $setting["bodybgcolor"] ?>" text="<?= $setting["bodytxtcolor"] ?>" link="<?= $setting["bodylnkcolor"] ?>" vlink="<?= $setting["bodyvlnkcolor"] ?>" alink="<?= $setting["bodyalnkcolor"] ?>" <? if (isset($tickermarg)) { echo ''.$tickermarg.''; } ?>>
