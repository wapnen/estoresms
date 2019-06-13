<?php
include "vendor/autoload.php";
use EstoreSMS\SMS;

$sms = new SMS('user', 'pass');
$response = $sms->send(['08130695389', '08059686705'], 'library test', 'test', true, true);
echo $response;
 ?>
