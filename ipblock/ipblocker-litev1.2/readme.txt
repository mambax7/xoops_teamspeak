
INSTALL:

You should have 1 file:

blocker.php	- This is the file to include to your .php file(s) to
		  block by IP.

To install, just modify the blocker.php to add the IP (s) and the the 
messages to display to the blocked user. You will also need to change $bmode.

See comments in the block.php file for flags. 



Examples:

 $block ip is the IP of the person that you wish to block.
 You can add as many IP's as needed but keep the same format.
 The last IP will not need a ',' after it. The others will.

 Note: if you are blocking a range (2.2.x) Make sure you put the
       trailing . (period/dot) at the end or it may cause issues
       with good ip ranges.

 Example:

 $blockip = array("1.1.1.1",
                  "2.2.2.2",
                  "3.3."
                 );

 $blockmsg is the message the user will see if they are blocked.

 Example:

 $blockmsg = array("1.1.1.1 is not allowed.",
                   "2.2.2.2 Blocked for forums abuse."
                   "3.3.3.3 We are temporarily down."
                  );


To active this script, put this line at the top of
your .php page: <? include("blocker.php"); ?>

if 'blocker.php' is not in the same directory as your .php 
page, include the full path. 
(ex: <? include("/home/user/www/includes/blocker.php"); ?>.

--[ End ]---------------------------------------------------

Web hosting: Our perfered host is Digitaledge.com, 
http://www.digitaledge.com.

Please visit http://www.robscripts.com for more scripts, support or 
custom programming.


You may not resell or re-package this script and support files without 
prior written authorization. The script is as-is.

This script is (C) copyright 2002-2004 Robert Murdock (robert@darpac.com).  

