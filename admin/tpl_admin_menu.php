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
<br><hr><b><a href="index.php">Admin Panel</a></b><hr>
<a href="tpl_settings.php">Settings</a><br>
<a href="tpl_email.php">Email Admins</a><br><hr>
<b>Webpost Stats</b><hr>
Totals<br>
<a href="../groups.php">Groups</a>: <?php getgroupcount() ?><br>
<a href="../listing.php">Servers</a>: <?php getservercount() ?><br>
<a href="../listing.php">Channels</a>: <?php getchannelcount() ?><br>
<a href="../listing.php?sort=clients_current&direction=desc&showgroup=all">Users</a>: <?php gettotalonline() ?><br>
<a href="../listing.php?sort=clients_current&direction=desc&showgroup=all">Active Servers</a>: <?php getactiveservercount() ?><br><hr>
<b>Server Info</b><hr>
gllcTS2: v<?php echo ''.$wpost2version.''; ?><br>
PHP: v<?= phpversion() ?><br>
MySQL: <?php printf("%s\n", mysql_get_server_info()); ?><br>
Server: <?= PHP_OS ?><br>
<a href="index.php?action=phpinfo&pass=<?php echo ''.$pass.''; ?>">PHP Info</a><br>
<br>