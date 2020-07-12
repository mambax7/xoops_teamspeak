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
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" class="odd" colspan="8">
<?
$numlink = 1;
$pagelinks = ceil($servercount / $setting["perpage"]);

$pageprev = $page -1;

if ($page == $pagelinks) {
  $pagenext = $page;
} else {
  $pagenext = $page +1;
}

echo '<a href="listing.php?page=1&sort=';  if ($version_direction == 'server_version') { echo 'server_version'; } else { echo ''.$sort.''; }   echo '&direction='.$pagedirection.'&showgroup='.$showgroup.'">&#60;&#60;</a> ';
echo '<a href="listing.php?page='.$pageprev.'&sort=';  if ($version_direction == 'server_version') { echo 'server_version'; } else { echo ''.$sort.''; }   echo '&direction='.$pagedirection.'&showgroup='.$showgroup.'">&#60;</a> | ';
echo ' <a href="listing.php?page='.$pagenext.'&sort=';  if ($version_direction == 'server_version') { echo 'server_version'; } else { echo ''.$sort.''; }   echo '&direction='.$pagedirection.'&showgroup='.$showgroup.'">&#62;</a>';
echo ' <a href="listing.php?page='.$pagelinks.'&sort=';  if ($version_direction == 'server_version') { echo 'server_version'; } else { echo ''.$sort.''; }   echo '&direction='.$pagedirection.'&showgroup='.$showgroup.'">&#62;&#62;</a><br>';


while ($numlink <= $pagelinks) {
 if ($page == $numlink) {
   echo '<b>[';
 }
 echo '<a href="listing.php?page='.$numlink.'&sort=';  if ($version_direction == 'server_version') { echo 'server_version'; } else { echo ''.$sort.''; }   echo '&direction='.$pagedirection.'&showgroup='.$showgroup.'">'.$numlink.'</a>';
 if ($page == $numlink) {
   echo ']</b>';
 }
 if ($numlink != $pagelinks) {
  echo' ';
 }
 $numlink++;
}
?>
          </td>
        </tr>
