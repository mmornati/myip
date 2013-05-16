<?php include('getip.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>MYIP | mornati.net</title>
		<!-- Stylesheet -->
		<link rel="stylesheet" href="css/tabs.css" type="text/css"/>
		<link charset="utf-8" href="css/default.css" rel="stylesheet" type="text/css" />
		<!-- META-->
		<meta name="description" content="Marco Mornati MYIP Information" />
		<meta name="keywords" content="marco, mornati, marco mornati, myip" />
		<meta name="copyright" content="Copyright (C) 2013 Marco Mornati" />
		<meta name="author" content="Marco Mornati" />
		<meta name="email" content="marco@mornati.net" />
		<meta name="Charset" content="UTF-8" />
		<meta name="Robots" content="INDEX,FOLLOW" />
	</head>
	<body>
		<div id="maincontainer">
			<div id="content">
				<div id="closecontainer">
					<a href="http://github.com/mmornati/myip" id="fork-me" title="Fork me on Github" target="_blank"></a>
				</div>
				<div id="areacontainer">
					<img id="areaimage" src="images/network.png" style="position:absolute" height="128" width="128" alt="Area Image" />
				</div>
				<div id="clientinfo">
                    <p>
                        <b>Your External IP Address:</b><br/>
                        <img src="http://www.mornati.net/myip/imageip.php" border="1">
                    </p>
                    <br/><br/>
                    <p>
                    <?php
                    print "Remote addr: <b>$ip</b><br/>";
                    print "More detailed host address: <b>$hostaddress</b><br/>";
                    print "Display browser info: <b>$browser</b> <br/>";
                    print "Where you came from (if you clicked on a link to get here: ";
                    if ($referred == "") {
                        print "<b>Page was directly requested</b><br/>";
                    }
                    else {
                        print "<b>$referred</b><br/>";
                    }
                    ?>
				</div>
			</div>
			<span id="credits">
				<center>
					2013 Marco Mornati
				</center>
			</span>
		</div>
	</body>
</html>

