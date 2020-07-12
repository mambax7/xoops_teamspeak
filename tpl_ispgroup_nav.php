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
          <td align="center" bgcolor="<?= $setting["catrowcolor1"] ?>" class="catagory" colspan="8">
<?
$numlink = 1;
$pagelinks = ceil($servercount / $setting["ispperpage"]);

$pageprev = $page -1;

if ($page == $pagelinks) {
  $pagenext = $page;
} else {
  $pagenext = $page +1;
}

echo '<a href="groups.php?page=1">&#60;&#60;</a> ';
echo '<a href="groups.php?page='.$pageprev.'">&#60;</a> | ';
echo ' <a href="groups.php?page='.$pagenext.'">&#62;</a>';
echo ' <a href="groups.php?page='.$pagelinks.'">&#62;&#62;</a><br>';


while ($numlink <= $pagelinks) {
 if ($page == $numlink) {
   echo '<b>[';
 }
 echo '<a href="groups.php?page='.$numlink.'">'.$numlink.'</a>';
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
