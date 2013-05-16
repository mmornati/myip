<?php 
include('getip.php'); 
header("Content-Type: text/plain"); 
?>
<?= str_replace(array(' ', "\n", "\t", "\r"), '', $ip) ?>
