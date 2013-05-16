<?php
include('getip.php');
if($ip) {
	$domain = trim($ip);
	if(ValidateIP($domain)) {
		$result = LookupIP($domain);
	} elseif(ValidateDomain($domain)) {
		$result = LookupDomain($domain);
	} else die("Invalid Input!");
	echo "<pre>\n" . $result . "\n</pre>\n";
}
?>