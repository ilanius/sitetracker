<?php
/* **************************** */
/* simple tracker using cookies */
/* **************************** */
header('Content-type: image/png');
header('Content-Disposition: inline; filename="tracking.png"');
$uid = isset($_COOKIE['trac_uid']) ? $_COOKIE['trac_uid'] : 'trac'. time();
$val = ( isset($_COOKIE['trac_val']) ? $_COOKIE['trac_val'] : 0 ) + 1;
$rip = isset( $_SERVER['REMOTE_ADDR'] ) ?  $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

setcookie('trac_uid', $uid, time() + (86400*365), "/" );
setcookie('trac_val', $val, time() + (86400*365), "/" );

// echo " val: ".$val . " uid: ".$uid . " rip: ".$rip;

file_put_contents('./traclog', $rip.'    '.$uid.'    '.$val."\n", FILE_APPEND );
echo readfile("tracking.png");
?>
