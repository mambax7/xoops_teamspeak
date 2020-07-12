<?
//////////////////////////////////////////XOOOPS ADMIN HEADER INFORMATION////////////////////////////////////////
include("admin_header.php");
include("../../mainfile.php");
include_once(XOOPS_ROOT_PATH."/class/xoopstree.php");
include_once(XOOPS_ROOT_PATH."/class/module.errorhandler.php");
	global $xoopsDB;
	xoops_cp_header();
	openTable();
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
  include("../tpl_style.php");
  include("tpl_admin_top.php");
?>
      <br>
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="98%" bgcolor="<?= $setting["bordercolor"]  ?>">
        <tr><form name="styleform" method="post" action="index.php?action=submit&what=settings">
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory" valign="middle" colspan="2" nowrap><b>Settings</b></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Admin Password :</b><br><font size="1">The password for the administrator.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_admin_pass" value="<?= $setting["admin_pass"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Page Title :</b><br><font size="1">The title of the serverlist webpage.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_pagetitle" value="<?= $setting["pagetitle"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Webpost Admin Email :</b><br><font size="1">The email address of the admin.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_listadmin" value="<?= $setting["listadmin"] ?>"></td>
        </tr><!--
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Check For Updates :</b><br><font size="1">If you want the admin panel to automatically check for updates check <b>yes</b>.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <b>Yes <input type="radio" name="set_updatecheck" value="yes" <? if ($setting["updatecheck"] == 'yes') { echo 'checked'; } ?>> | No <input type="radio" name="set_updatecheck" value="no" <? if ($setting["updatecheck"] == 'no') { echo 'checked'; } ?>></b>
          </td>
        </tr> -->
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Homepage :</b><br><font size="1">If you want to rename index.php set the new name here.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_homepage" value="<?= $setting["homepage"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Table Width :</b><br><font size="1">How wide do you want the list? Percentage or Pixle.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_tablewidth" value="<?= $setting["tablewidth"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Popup Width :</b><br><font size="1">How wide do you want the popup in Pixles.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_popupwidth" value="<?= $setting["popupwidth"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Popup Height :</b><br><font size="1">How high do you want the popup in Pixles.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_popupheight" value="<?= $setting["popupheight"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Servers Per Page :</b><br><font size="1">How many servers do you want to be shown on a page.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_perpage" value="<?= $setting["perpage"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Groups Per Page :</b><br><font size="1">How many groups do you want to be shown on a page.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_ispperpage" value="<?= $setting["ispperpage"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Delete Inactive Servers :</b><br><font size="1">How long, in seconds, must a server be inactive before it is removed from the list?  Set to 0 to never remove any.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_serverremove" value="<?= $setting["serverremove"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Show Groups :</b><br><font size="1">If you want to have the index set to show groups instead of all servers set to <b>yes</b>.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <b>Yes <input type="radio" name="set_showgroups" value="yes" <? if ($setting["showgroups"] == 'yes') { echo 'checked'; } ?>> | No <input type="radio" name="set_showgroups" value="no" <? if ($setting["showgroups"] == 'no') { echo 'checked'; } ?>></b>
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Image Background :</b><br><font size="1">Set this to Dark if you use dark colors, it will make the images look better.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <b>Light <input type="radio" name="set_imgbg" value="light" <? if ($setting["imgbg"] == 'light') { echo 'checked'; } ?>> | Dark <input type="radio" name="set_imgbg" value="dark" <? if ($setting["imgbg"] == 'dark') { echo 'checked'; } ?>></b>
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Auto Refresh :</b><br><font size="1">Want the page to automatically refresh?</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <b>Yes <input type="radio" name="set_refresh" value="on" <? if ($setting["refresh"] == 'on') { echo 'checked'; } ?>> | No <input type="radio" name="set_refresh" value="off" <? if ($setting["refresh"] == 'off') { echo 'checked'; } ?>></b>
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Refresh Time :</b><br><font size="1">How often do you want the page to refresh in seconds.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><input type="text" name="set_refreshtime" value="<?= $setting["refreshtime"] ?>"></td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" valign="top"><b>Message of the Day :</b><br><font size="1">The message at the top right of the listing.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center"><textarea name="set_message" cols="40" rows="6"><?= $setting["message"] ?></textarea></td>
        </tr>

        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Page Background Color :</b><br><font size="1">The color of page body background.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_bodybgcolor" style="width: 22; height: 20; background-color:<?= $setting["bodybgcolor"] ?>">
            <input type="text" name="set_bodybgcolor" value="<?= $setting["bodybgcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_bodybgcolor,this.value,'bodybgcolor_set')" id="bodybgcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Page Text Color :</b><br><font size="1">The color of page body text.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_bodytxtcolor" style="width: 22; height: 20; background-color:<?= $setting["bodytxtcolor"] ?>">
            <input type="text" name="set_bodytxtcolor" value="<?= $setting["bodytxtcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_bodytxtcolor,this.value,'bodytxtcolor_set')" id="bodytxtcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Page Link Color :</b><br><font size="1">The color of page body links.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_bodylnkcolor" style="width: 22; height: 20; background-color:<?= $setting["bodylnkcolor"] ?>">
            <input type="text" name="set_bodylnkcolor" value="<?= $setting["bodylnkcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_bodylnkcolor,this.value,'bodylnkcolor_set')" id="bodylnkcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Page Visited Link Color :</b><br><font size="1">The color of page body links that have been visited.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_bodyvlnkcolor" style="width: 22; height: 20; background-color:<?= $setting["bodyvlnkcolor"] ?>">
            <input type="text" name="set_bodyvlnkcolor" value="<?= $setting["bodyvlnkcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_bodyvlnkcolor,this.value,'bodyvlnkcolor_set')" id="bodyvlnkcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Page Active Link Color :</b><br><font size="1">The color of page body links which are active.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_bodyalnkcolor" style="width: 22; height: 20; background-color:<?= $setting["bodyalnkcolor"] ?>">
            <input type="text" name="set_bodyalnkcolor" value="<?= $setting["bodyalnkcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_bodyalnkcolor,this.value,'bodyalnkcolor_set')" id="bodyalnkcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Table Border Color :</b><br><font size="1">The color of the table borders.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_bordercolor" style="width: 22; height: 20; background-color:<?= $setting["bordercolor"] ?>">
            <input type="text" name="set_bordercolor" value="<?= $setting["bordercolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_bordercolor,this.value,'bordercolor_set')" id="bordercolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Category Row Color :</b><br><font size="1">The color of category table row.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_catrowcolor1" style="width: 22; height: 20; background-color:<?= $setting["catrowcolor1"] ?>">
            <input type="text" name="set_catrowcolor1" value="<?= $setting["catrowcolor1"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_catrowcolor1,this.value,'catrowcolor1_set')" id="catrowcolor1_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Category Text Color :</b><br><font size="1">The color of text found in the category row.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_cattxtcolor" style="width: 22; height: 20; background-color:<?= $setting["cattxtcolor"] ?>">
            <input type="text" name="set_cattxtcolor" value="<?= $setting["cattxtcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_cattxtcolor,this.value,'cattxtcolor_set')" id="cattxtcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Category Link Color :</b><br><font size="1">The color of links found in the category row.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_catlnkcolor" style="width: 22; height: 20; background-color:<?= $setting["catlnkcolor"] ?>">
            <input type="text" name="set_catlnkcolor" value="<?= $setting["catlnkcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_catlnkcolor,this.value,'catlnkcolor_set')" id="catlnkcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Category Hover Color :</b><br><font size="1">The color of links found in the category row when the pointer is over them.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_cathvrcolor" style="width: 22; height: 20; background-color:<?= $setting["cathvrcolor"] ?>">
            <input type="text" name="set_cathvrcolor" value="<?= $setting["cathvrcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_cathvrcolor,this.value,'cathvrcolor_set')" id="cathvrcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Listing Text Color :</b><br><font size="1">The color of text found in the server listing.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_lsttxtcolor" style="width: 22; height: 20; background-color:<?= $setting["lsttxtcolor"] ?>">
            <input type="text" name="set_lsttxtcolor" value="<?= $setting["lsttxtcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_lsttxtcolor,this.value,'lsttxtcolor_set')" id="lsttxtcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Listing Link Color :</b><br><font size="1">The color of links found in the server listing.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_lstlnkcolor" style="width: 22; height: 20; background-color:<?= $setting["lstlnkcolor"] ?>">
            <input type="text" name="set_lstlnkcolor" value="<?= $setting["lstlnkcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_lstlnkcolor,this.value,'lstlnkcolor_set')" id="lstlnkcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Listing Visited Link Color :</b><br><font size="1">The color of links that have been visited in the server listing.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_lstvlnkcolor" style="width: 22; height: 20; background-color:<?= $setting["lstvlnkcolor"] ?>">
            <input type="text" name="set_lstvlnkcolor" value="<?= $setting["lstvlnkcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_lstvlnkcolor,this.value,'lstvlnkcolor_set')" id="lstvlnkcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Listing Active Link Color :</b><br><font size="1">The color of links that have been active in the server listing.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_lstalnkcolor" style="width: 22; height: 20; background-color:<?= $setting["lstalnkcolor"] ?>">
            <input type="text" name="set_lstalnkcolor" value="<?= $setting["lstalnkcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_lstalnkcolor,this.value,'lstalnkcolor_set')" id="lstalnkcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Listing Link Hover Color :</b><br><font size="1">The color of links in the server listing when the pointer is over them.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_lsthvrcolor" style="width: 22; height: 20; background-color:<?= $setting["lsthvrcolor"] ?>">
            <input type="text" name="set_lsthvrcolor" value="<?= $setting["lsthvrcolor"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_lsthvrcolor,this.value,'lsthvrcolor_set')" id="lsthvrcolor_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>First Alternating Row Color :</b><br><font size="1">First alternating color for the listing.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_rowcolor1" style="width: 22; height: 20; background-color:<?= $setting["rowcolor1"] ?>">
            <input type="text" name="set_rowcolor1" value="<?= $setting["rowcolor1"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_rowcolor1,this.value,'rowcolor1_set')" id="rowcolor1_set">
          </td>
        </tr>
        <tr>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing"><b>Second Alternating Row Color :</b><br><font size="1">Second alternating color for the listing.</font></td>
          <td bgcolor="<?= $setting["rowcolor2"] ?>" width="50%" class="listing" align="center">
            <input type="button" disabled id="preview_rowcolor2" style="width: 22; height: 20; background-color:<?= $setting["rowcolor2"] ?>">
            <input type="text" name="set_rowcolor2" value="<?= $setting["rowcolor2"] ?>" size="10" maxlength="7" onchange="upc(this.form.preview_rowcolor2,this.value,'rowcolor2_set')" id="rowcolor2_set">
          </td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?= $setting["catrowcolor1"]  ?>" class="catagory" valign="middle" colspan="2" nowrap>
            <input type="hidden" name="pass" value="<?= $pass ?>"><input type="submit" value="Submit"> <input type="reset" value="Reset" onclick="location.reload()">
          </td>
        </tr></form>
      </table>
	  <br>

	  	  <?php

//////////////////////////////////////////XOOPS ADMIN FOOTER INFORMATION/////////////////////////////////////////
CloseTable();
xoops_cp_footer();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
