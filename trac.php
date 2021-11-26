<?php
/* **************************** */
/* simple tracker using cookies */
/* **************************** */
header('Content-type: image/png');
header('Content-Disposition: inline; filename="logiImg.png"');
// den enskilde besökarena id
$uid = isset($_COOKIE['tracUid'])       ?  $_COOKIE['tracUid'] : 'trac'. time();

// hur många gånger han besökt sidan
$val = ( isset($_COOKIE['tracVal'])     ?  $_COOKIE['tracVal'] : 0 ) + 1;

// besökarens ip-adress som mycket väl kan vara en proxyserver
$rip = isset( $_SERVER['REMOTE_ADDR'] ) ?  $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

// trackerns ägarid som bifogas till anropet: trac.php?oid=xx i <img src="trac.php?oid=xx">
$oid = isset( $_GET['oid'] )            ?  $_GET['oid'] : '0';

setcookie('tracUid', $uid, time() + (86400*365), "/" );  // 86400 sekunder per dag
setcookie('tracVal', $val, time() + (86400*365), "/" );

// echo " val: ".$val . " uid: ".$uid . " rip: ".$rip;

file_put_contents('./tracking.log', $rip.'  '.$uid.'  '.$val.'  '.$oid."\n", FILE_APPEND );
echo readfile("logoImg.png");
?>
