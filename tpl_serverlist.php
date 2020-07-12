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
?>
        <tr>
          <td align="center" bgcolor="<?= $rowcolor ?>" class="even"><a href="listing.php?detail=<?php echo ''.$row->server_ip.''; ?>&detailport=<?php echo ''.$row->server_port.''; ?>&page=<?= $page ?>&sort=<?php if ($version_direction == 'server_version') { echo 'server_version'; } else { echo ''.$sort.''; } ?>&direction=<?= $pagedirection ?>&showgroup=<?= $showgroup ?>">Details</a></td>
          <td align="center" bgcolor="<?= $rowcolor ?>" class="even"><?php if ($row->server_password == '1') { echo'<img src="images/'.$setting["imgbg"].'_private.gif" border="0" alt="Private" title="This server requires a password to join.">'; } else { echo'<img src="images/'.$setting["imgbg"].'_open.gif" border="0" alt="Open" title="This server does not require password to join.">'; } ?></td>
          <td align="center" bgcolor="<?= $rowcolor ?>" class="even"><?php if (($row->server_linkurl) and (!preg_match("/webpost.php/i", $row->server_linkurl))) { echo '<img src="images/'.$setting["imgbg"].'_www.gif" border="0" alt="WWW" title="Visit '.$row->server_name.' website" align="absmiddle"> <a href="'.$row->server_linkurl.'" title="Visit '.$row->server_linkurl.'" target="_blank">'; } ?><?php echo ''.$row->server_name.''; ?></a></td>
          <td align="center" bgcolor="<?= $rowcolor ?>" class="even"><a href="login.php?detail=<?php echo ''.$row->server_id.''; ?>" title="Click to join <?php echo ''.$row->server_ip.''; ?>:<?php echo ''.$row->server_port.''; ?> | This opens in a popup window." onClick="NewWindow(this.href,'login','<?= $setting["popupwidth"] ?>','<?= $setting["popupheight"] ?>');return false"><?php echo ''.$row->server_ip.''; ?>:<?php echo ''.$row->server_port.''; ?></a></td>
          <td align="center" bgcolor="<?= $rowcolor ?>" class="even"><?= number_format($row->clients_current); ?>/<?= number_format($row->clients_maximum); ?></td>
          <td align="center" bgcolor="<?= $rowcolor ?>" class="even"><img src="images/<?= $setting["imgbg"] ?>_<?php echo ''.$row->server_platform.''; ?>.gif" border="0" alt="<?php echo ''.$row->server_platform.''; ?>" title="<?php echo ''.$row->server_platform.''; ?> v<?php echo ''.$row->server_version_major.''; ?>.<?php echo ''.$row->server_version_minor.''; ?>.<?php echo ''.$row->server_version_release.''; ?>.<?php echo ''.$row->server_version_build.''; ?>"></td>
          <td align="center" bgcolor="<?= $rowcolor ?>" class="even"><nobr>v<?php echo ''.$row->server_version_major.''; ?>.<?php echo ''.$row->server_version_minor.''; ?>.<?php echo ''.$row->server_version_release.''; ?>.<?php echo ''.$row->server_version_build.''; ?></nobr></td>
        </tr>
