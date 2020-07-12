<?
// Copyright (c) 2003-2004 Robert Murdock (robert@darpac.com)
// ALL RIGHTS RESERVED

// Mode.  If you set this to 1 then you will BLOCK IPS in the blockip array.
// If set to 0, then you will be ALLOW ONLY IP's in the blockip array.

$bmode = 1;

// Note: if you are blocking a range (2.2.x) Make sure you put the
//       trailing . (period/dot) at the end or it may cause issues
//       with good ip ranges.
//

// $block ip is the IP of the person that you wish to block.
// You can add as many IP's as needed but keep the same format.
// The last IP will not need a ',' after it. The others will.
// 
// Example:
//
// $blockip = array("1.1.1.1",
//                  "2.2.2.2",
//                  "3.3."
//                 );

$blockip = array("1.1.1.1",
                 "2.2.2.2",
		 "3.3."
                 );



// $blockmsg is the message the user will see if they are blocked.
// 
// Example:
//
// $blockmsg = array("1.1.1.1 is not allowed.",
//                   "2.2.2.2 Blocked for forums abuse.",
//                   "3.3.3.3 We are temporarily down.",
//                  );


$blockmsg = array("1.1.1.1 is not allowed.",
                  "2.2.2.2 Blocked for forums abuse.",
                  "3.3.3.3 We are temporarily down."
                 );

// Nothing to change below this line ------------------

$x = count($blockip);


for ($y = 0; $y < $x; $y++) {
  
  $brange = substr($REMOTE_ADDR, 0, strlen($blockip[$y]));

  if ($bmode == 1) {
    if ($REMOTE_ADDR == $blockip[$y] || ($brange == $blockip[$y])) {
      exit($blockmsg[$y]);    
    } else {
      $allow="Yes";
    }
  }
  
  if ($bmode == 0) {
    if ($REMOTE_ADDR == $blockip[$y] || ($brange == $blockip[$y])) {
      // return(1);
      $allow="Yes";   
    }
  }

}

if ($allow != "Yes") exit($blockmsg[1]);

?>
