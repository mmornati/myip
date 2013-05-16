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
                    <p>
                    <?php
                    print "Remote address: <b>$ip</b><br/>";
                    print "Host Address: <b>$hostaddress</b><br/>";
                    print "Browser info: <b>$browser</b> <br/>";
                    print "Referral page: ";
                    if ($referred == "") {
                        print "<b>Page was directly requested</b><br/>";
                    }
                    else {
                        print "<b>$referred</b><br/>";
                    }
                    ?>
                    </p>
                    <p>
                    <h2>Developers Information</h2>
                    <h2>Plain Text</h2>
                    If you want to get your ip address within a script try the url: <a href="http://myip.mornati.net/plain" target="_blank">http://myip.mornati.net/plain</a><br/>
                    Usage example for bash: <br/><br/>

                    <div class="wp_syntax">
                        <table>
                          <tbody>
                            <tr>
                              <td class="code">
                                <pre class="bash" style="color:#D8D8D8;"><span style="color: #FFF; font-weight:bold;">curl http://myip.mornati.net/plain; echo</span></pre>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <br/>
                    <h2>JSON</h2>
                    The site provide also a detailed json output. The address is: <a href="http://myip.mornati.net/details.json" target="blank">http://myip.mornati.net/details.json</a>
                    </p>
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

