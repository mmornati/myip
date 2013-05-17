<?php
include('functions.php');
$details = array(
    'remote_addr'=> $ip,
    'host-name' => $hostaddress,
    'browser'=> $browser,
    'referred' => $referred 
);
header('Content-Type: application/json');
echo json_encode($details);
?>
