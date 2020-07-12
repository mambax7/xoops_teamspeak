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
      <table align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="<?php echo ''.$setting["bordercolor"].'';  ?>">
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="even" colspan="7">
            <b>Server Detail for
              <?php
                if (!preg_match("/webpost.php/i", $detaildata[20])) {
                  echo '<a href="'.$detaildata[20].'" title="Visit '.$detaildata[20].'" target="_blank">'.$detaildata[12].'</a>';
                } else {
                  echo ''.$detaildata[12].'';
                }
              ?>
            </a></b>
          </td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Country</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Priv/Pub</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Admin</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Name</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Server IP : Port</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>On/Max</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Server</b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even"><?php echo ''.$detaildata[4].''; ?></td>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even">
            <?php
              if ($detaildata[14] == 1) {
                echo '<img src="images/'.$setting["imgbg"].'_private.gif" border="0" alt="Private" title="This server requires a password to join.">';
              } else {
              	echo '<img src="images/'.$setting["imgbg"].'_open.gif" border="0" alt="Open" title="This server does not require password to join.">';
              }
            ?>
          </td>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even">
            <?php
              if (($detaildata[1]) and ($detaildata[1] != 'na')) {
                echo '<a href="mailto:'.$detaildata[1].'"><img src="images/'.$setting["imgbg"].'_email.gif" border="0" alt="Email" title="Contact the server administrator at '.$detaildata[1].'"></a>';
              } else {
              	echo 'N/A';
              }
            ?>
          </td>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even">
            <?php
              if (!preg_match("/webpost.php/i", $detaildata[20])) {
                echo '<img src="images/'.$setting["imgbg"].'_www.gif" border="0" alt="WWW" title="Visit '.$detaildata[12].' website" align="absmiddle"> <a href="'.$detaildata[20].'" title="Visit '.$detaildata[20].'" target="_blank">'.$detaildata[12].'</a>';
              } else {
                echo ''.$detaildata[12].'';
              }
            ?>
          </td>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even">
            <a href="login.php?detail=<?php echo ''.$detaildata[0].''; ?>" title="Click to join <?php echo ''.$detaildata[10].':'.$detaildata[11].''; ?>" onClick="NewWindow(this.href,'login','<?php echo ''.$setting["popupwidth"].''; ?>','<?php echo ''. $setting["popupheight"].''; ?>');return false"><?php echo ''.$detaildata[10].':'.$detaildata[11].''; ?></a>
          </td>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even">
            <?php
              echo ''.number_format($detaildata[17]).'/'.number_format($detaildata[18]).'';
            ?>
          </td>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even">
            <?php echo ''.$detaildata[5].'<br>v'.$detaildata[6].'.'.$detaildata[7].'.'.$detaildata[8].'.'.$detaildata[9].''; ?>
          </td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>ISP</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Type 1</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Type 2</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Last Updated</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Current Time</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Channels</b></td>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd"><b>Uptime</b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="even">
            <?php
              if (($detaildata[2]) and ($detaildata[2] != 'na')) {
                echo '<a href="'.$detaildata[2].'" target="_blank">'.$detaildata[3].'</a>';
              } else if ($detaildata[3]) {
              	echo ''.$detaildata[3].'';
              }
            ?>
          </td>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="even"><?php echo ''.ucfirst($detaildata[15]).''; ?></td>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="even"><?php echo ''.ucfirst($detaildata[16]).''; ?></td>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="even" nowrap><?php echo ''.date("h:i:s A T", $detaildata[22]).''; ?></td>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="even" nowrap><?php echo ''.date("h:i:s A T", time()).''; ?></td>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="even"><?php echo ''.$detaildata[19].''; ?></td>
          <td align="center" bgcolor="<?= $setting["rowcolor2"] ?>" class="even"><?php getuptime($detaildata[13]); ?></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="odd" colspan="7"><b>Users and Channels</b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor1"].''; ?>" class="even" colspan="7">
            <br>
            <table border="0" align="center" cellspacing="1" class="odd" width="400%" bgcolor="<?= $setting["bordercolor"]  ?>">
              <tr>
                <td valign="top" width="260" bgcolor="<?php echo ''.$setting["rowcolor2"].''; ?>" class="even">
                  <img src="images/bullet_server.gif" align="absmiddle"> <b>
                  <?php
                    echo ''.$detaildata[12].'</b><br>';
                    getcldetail($detaildata[10], $detaildata[11], $detaildata[0]);
                  ?>
                </td>
                <td valign="top" width="140" bgcolor="<?php echo ''.$setting["rowcolor2"].''; ?>" class="even">
                  <b>Channel Flags</b><br>&nbsp;&nbsp;R = Registered<br>&nbsp;&nbsp;M = Moderated<br>&nbsp;&nbsp;P = Passworded<br>&nbsp;&nbsp;S = Sub-Channels<br>&nbsp;&nbsp;D = Default<br>&nbsp;&nbsp;U = Unregistered
                  <hr width="140">
                  <b>Player Flags</b><br>&nbsp;&nbsp;R = Registered<br>&nbsp;&nbsp;SA = Server Admin<br>&nbsp;&nbsp;CA = Channel Admin<br>&nbsp;&nbsp;AO = Auto-Operator<br>&nbsp;&nbsp;AV = Auto-Voice<br>&nbsp;&nbsp;O = Operator<br>&nbsp&nbsp;V = Voice<br>&nbsp;&nbsp;U = Unregistered
                </td>
              </tr>
            </table>
            <br>
          </td>
        </tr>
      </table>
