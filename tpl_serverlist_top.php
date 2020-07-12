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
      <br>
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="100%" bgcolor="<?= $setting["bordercolor"]  ?>">
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="odd" valign="middle" nowrap><b><?= $servercount ?></b></td>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="odd" valign="middle" nowrap><b><a href="listing.php?sort=server_password&direction=<? if ($sort == 'server_password') { echo "$direction"; } ?>&showgroup=<?= $showgroup ?>">Priv/Pub</a> <? if ($sort == 'server_password') { echo '<img src="images/'.$pagedirection.'.gif" border="0">'; } ?></b></td>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="odd" valign="middle" nowrap><b><a href="listing.php?sort=server_name&direction=<? if ($sort == 'server_name') { echo "$direction"; } ?>&showgroup=<?= $showgroup ?>">Name</a> <? if ($sort == 'server_name') { echo '<img src="images/'.$pagedirection.'.gif" border="0">'; } ?></b></td>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="odd" valign="middle" nowrap><b><a href="listing.php?sort=server_ip&direction=<? if ($sort == 'server_ip') { echo "$direction"; } ?>&showgroup=<?= $showgroup ?>">Server IP : Port</a> <? if ($sort == 'server_ip') { echo '<img src="images/'.$pagedirection.'.gif" border="0">'; } ?></b></td>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="odd" valign="middle" nowrap><b><? if ($sort == 'clients_current') { echo '<img src="images/'.$pagedirection.'.gif" border="0">'; } ?> <a href="listing.php?sort=clients_current&direction=<? if ($sort == 'clients_current') { echo "$direction"; } ?>&showgroup=<?= $showgroup ?>">On</a>/<a href="listing.php?sort=clients_maximum&direction=<? if ($sort == 'clients_maximum') { echo "$direction"; } ?>&showgroup=<?= $showgroup ?>">Max</a> <? if ($sort == 'clients_maximum') { echo '<img src="images/'.$pagedirection.'.gif" border="0">'; } ?></b></td>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="odd" valign="middle" nowrap><b><a href="listing.php?sort=server_platform&direction=<? if ($sort == 'server_platform') { echo "$direction"; } ?>&showgroup=<?= $showgroup ?>">Server</a> <? if ($sort == 'server_platform') { echo '<img src="images/'.$pagedirection.'.gif" border="0">'; } ?></b></td>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="odd" valign="middle" nowrap><b><a href="listing.php?sort=server_version&direction=<? if ($version_direction == 'server_version') { echo "$direction"; } ?>&showgroup=<?= $showgroup ?>">Version</a> <? if ($version_direction == 'server_version') { echo '<img src="images/'.$pagedirection.'.gif" border="0">'; } ?></b></td>
        </tr>
