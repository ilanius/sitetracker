<?php
/* **************************** */
/* simple tracker using cookies */
/* **************************** */
header('Content-type: image/png');
header('Content-Disposition: inline; filename="tracking.png"');
$uid = isset($_COOKIE['tracUid'])       ?  $_COOKIE['tracUid'] : 'trac'. time();
$val = ( isset($_COOKIE['tracVal'])     ?  $_COOKIE['tracVal'] : 0 ) + 1;
$rip = isset( $_SERVER['REMOTE_ADDR'] ) ?  $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
$oid = isset( $_GET['oid'] )            ?  $_GET['oid'] : '0';

setcookie('tracUid', $uid, time() + (86400*365), "/" );
setcookie('tracVal', $val, time() + (86400*365), "/" );

// echo " val: ".$val . " uid: ".$uid . " rip: ".$rip;

file_put_contents('./tracking.log', $rip.'  '.$uid.'  '.$val.'  '.$oid."\n", FILE_APPEND );
echo readfile("logoImg.png");
?>
