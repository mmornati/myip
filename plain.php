<?php 
include('functions.php'); 
header("Content-Type: text/plain"); 
?>
<?= str_replace(array(' ', "\n", "\t", "\r"), '', $ip) ?>
