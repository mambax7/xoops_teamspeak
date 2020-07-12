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
  include("./db_inc.php");
  include("../tpl_style.php");
?>
<br>
<br>
<form action="index.php" method="post">
<table width="350" border="0" bgcolor="<?= $setting["bordercolor"]  ?>" class="listfont" align="center">
  <tr>
    <td bgcolor="<?= $setting["catrowcolor1"] ?>" align="center"><b><?= $setting["pagetitle"] ?> Admin Login</b></td>
  </tr>
  <tr>
    <td bgcolor="<?= $setting["catrowcolor1"] ?>" align="center"><br>
      <table align="center">
        <tr>
          <!-- <td align="right"><input type="text" name="adminlogin"><br>Username</td> -->
          <td align="right"><input type="password" name="pass"><br>Password</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><br><input type="submit" value="Log in"></td>
        </tr>
      </table><br>
    </td>
  </tr>
</table>
</form>
<center>
  <font size="1"><? // Please do not remove copyright, Thank you. ?><a href="http://www.gryphonllc.com" target="_blank">© 2002-<?= date("Y") ?> Gryphon, LLC</a><? // Please do not remove copyright, Thank you. ?></font>
</center>

</body>
</html>