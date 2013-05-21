<?php 
include('functions.php'); 
include('browser_detection.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>MYIP | mornati.net</title>
		<!-- Stylesheet -->
		<link rel="stylesheet" href="css/tabs.css" type="text/css"/>
		<link charset="utf-8" href="css/default.css" rel="stylesheet" type="text/css" />
		<!-- Javascript -->
		<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
		<script src="js/jquery.tools.min.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
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
				<ul class="tabs">
					<li>
						<a href="#" onclick="changeImage('network');">Network</a>
					</li>
					<li>
                        <a href="#" onclick="changeImage('whois');">Whois</a>
                    </li>
					<li>
						<a href="#" onclick="changeImage('browser');">Browser</a>
					</li>
					<li>
						<a href="#" onclick="changeImage('developers');">Developers</a>
					</li>
				</ul>
				<div class="panes">
					<div id="networks" class="firstlevel">
						<div id="ipimage">
                        	<b>Your External IP Address:</b><br/>
                        	<img src="http://www.mornati.net/myip/imageip.php" border="1"/>
                        </div>
                        <div id="ipdetails">
                    
                    		<?php
                    		print "Remote address: <b>$ip</b><br/>";
                    		print "Host Address: <b>$hostaddress</b><br/>";
                            //Get errors and locations
                            $locations = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
                            $errors = $ipLite->getError();

                            //Getting the result
                            echo "<p>\n";
                            echo "<strong>Location</strong><br />\n";
                            if (!empty($locations) && is_array($locations)) {
                                foreach ($locations as $field => $val) {
                                    if ($field != 'statusCode' && $field != 'statusMessage' && $field != 'ipAddress') {
                                        echo $field . ' : ' . $val . "<br />\n";
                                    }
                                }
                            }
                            echo "</p>\n";

                    		?>
                    	</div>
					</div>
					<div class="firstlevel" id="whoiscontainer">
					    <div id="loading"><img src="images/ajax-loader.gif"/></div>
					    <h2>Whois</h2>
                        <div id="whois"></div>
					</div>
					<div id="browsercontainer" class="firstlevel">
                        <div class="float-left-01">
                            <h3 class="h-right-bar">Your Computer</h3>
                                <?php
                                $os = '';
                                $os_starter = '<h4 class="right-bar">Operating System:</h4><p class="right-bar">';
                                $os_finish = '</p>';
                                $full = '';
                                $handheld = '';

                                $device_icon = '';
                                $os_icon = '';
                                $browser_icon = '';

                                // change this to match your include path/and file name you give the script
                                $browser_info = browser_detection('full');

                                // $mobile_device, $mobile_browser, $mobile_browser_number, $mobile_os, $mobile_os_number, $mobile_server, $mobile_server_number
                                if ( $browser_info[8] == 'mobile' ) {
                                    $handheld = '<h4 class="right-bar">Handheld Device:</h4><p class="right-bar">';
                                    if ( $browser_info[13][0] ) {
                                        $handheld .= 'Type: ' . ucwords( $browser_info[13][0] );
                                        if ( $browser_info[13][7] ) {
                                            $handheld = $handheld  . ' v: ' . $browser_info[13][7];
                                        }
                                        $handheld = $handheld  . '<br />';
                                    }
                                    if ( $browser_info[13][3] ) {
                                        // detection is actually for cpu os here, so need to make it show what is expected
                                        if ( $browser_info[13][3] == 'cpu os' ) {
                                            $browser_info[13][3] = 'ipad os';
                                        }
                                        $handheld .= 'OS: ' . ucwords( $browser_info[13][3] ) . ' ' .  $browser_info[13][4] . '<br />';
                                        // don't write out the OS part for regular detection if it's null
                                        if ( !$browser_info[5] ) {
                                            $os_starter = '';
                                            $os_finish = '';
                                        }
                                    }
                                    // let people know OS couldn't be figured out
                                    if ( !$browser_info[5] && $os_starter ) {
                                        $os_starter .= 'OS: N/A';
                                    }
                                    if ( $browser_info[13][1] ) {
                                        $handheld .= 'Browser: ' . ucwords( $browser_info[13][1] ) . ' ' .  $browser_info[13][2] . '<br />';
                                    }
                                    if ( $browser_info[13][5] ) {
                                        $handheld .= 'Server: ' . ucwords( $browser_info[13][5] . ' ' .  $browser_info[13][6] ) . '<br />';
                                    }

                                    if (strcasecmp($browser_info[13][3], 'android') == 0) {
                                        $device_icon = "android.png";
                                    } elseif (strcasecmp($browser_info[13][3], 'iphone') == 0) {
                                        $device_icon = "iphone.png";
                                    } elseif (strcasecmp($browser_info[13][3], 'ipad') == 0) {
                                        $device_icon = "ipad.png";
                                    } else {
                                        $device_icon = "smartphone.png";
                                    }

                                    $handheld .= "<img id='handhelddev' class='icon' src='images/$device_icon'/>";
                                    $handheld .= '</p>';
                                }

                                switch ($browser_info[5]) {
                                    case 'win':
                                        $os .= 'Windows ';
                                        $os_icon = 'windows.png';
                                        break;
                                    case 'nt':
                                        $os .= 'Windows<br />NT ';
                                        $os_icon = 'windows.png';
                                        break;
                                    case 'lin':
                                        $os .= 'Linux<br /> ';
                                        $os_icon = 'linux.png';
                                        break;
                                    case 'mac':
                                        $os .= 'Mac ';
                                        $os_icon = 'mac.png';
                                        break;
                                    case 'iphone':
                                        $os .= 'Mac ';
                                        $os_icon = 'mac.png';
                                        break;
                                    case 'unix':
                                        $os .= 'Unix<br />Version: ';
                                        $os_icon = 'linux.png';
                                        break;
                                    default:
                                        $os .= $browser_info[5];
                                }

                                $os .= "<img id='osicon' class='icon' src='images/$os_icon'/>";

                                if ( $browser_info[5] == 'nt' ) {
                                    if ( $browser_info[5] == 'nt' ) {
                                        switch ( $browser_info[6] ) {
                                            case '5.0':
                                                $os .= '5.0 (Windows 2000)';
                                                break;
                                            case '5.1':
                                                $os .= '5.1 (Windows XP)';
                                                break;
                                            case '5.2':
                                                $os .= '5.2 (Windows XP x64 Edition or Windows Server 2003)';
                                                break;
                                            case '6.0':
                                                $os .= '6.0 (Windows Vista)';
                                                break;
                                            case '6.1':
                                                $os .= '6.1 (Windows 7)';
                                                break;
                                            case '6.2':
                                                $os .= '6.2 (Windows 8)';
                                                break;
                                            case 'ce':
                                                $os .= 'CE';
                                                break;
                                            # note: browser detection 5.4.5 and later return always
                                            # the nt number in <number>.<number> format, so can use it
                                            # safely.
                                            default:
                                                if ( $browser_info[6] != '' ) {
                                                    $os .= $browser_info[6];
                                                }
                                                else {
                                                    $os .= '(version unknown)';
                                                }
                                                break;
                                        }
                                    }
                                }
                                elseif ( $browser_info[5] == 'iphone' ) {
                                    $os .=  'OS X (iPhone)';
                                }
                                // note: browser detection now returns os x version number if available, 10 or 10.4.3 style
                                elseif ( ( $browser_info[5] == 'mac' ) && ( strstr( $browser_info[6], '10' ) ) ) {
                                    $os .=  'OS X v: ' . $browser_info[6];
                                }
                                elseif ( $browser_info[5] == 'lin' ) {
                                    $os .= ( $browser_info[6] != '' ) ? 'Distro: ' . ucwords($browser_info[6] ) : 'Smart Move!!!';
                                }
                                // default case for cases where version number exists
                                elseif ( $browser_info[5] && $browser_info[6] ) {
                                    $os .=  " " . ucwords( $browser_info[6] );
                                }
                                elseif ( $browser_info[5] && $browser_info[6] == '' ) {
                                    $os .=  ' (version unknown)';
                                }
                                elseif ( $browser_info[5] ) {
                                    $os .=  ucwords( $browser_info[5] );
                                }
                                $os = $os_starter . $os . $os_finish;
                                $full .= $handheld . $os . '<h4 class="right-bar">Current Browser / UA:</h4><p class="right-bar">';

                                switch ( $browser_info[0] ) {
                                    case 'moz':
                                        $a_temp = $browser_info[10];// use the moz array
                                        $full .= ($a_temp[0] != 'mozilla') ? 'Mozilla/ ' . ucwords($a_temp[0]) . ' ' : ucwords($a_temp[0]) . ' ';
                                        $full .= $a_temp[1] . '<br />';
                                        $full .= 'ProductSub: ';
                                        $full .= ( $a_temp[4] != '' ) ? $a_temp[4] : 'Not Available';
                                        $browser_icon = "firefox.png";
                                        break;
                                    case 'ns':
                                        $full .= 'Browser: Netscape<br />';
                                        $full .= 'Full Version Info: ' . $browser_info[1];
                                        $browser_icon = "netscape.png";
                                        break;
                                    case 'webkit':
                                        $a_temp = $browser_info[11];// use the webkit array
                                        $full .= 'User Agent: ';
                                        $full .= ucwords($a_temp[0]) . ' ' . $a_temp[1];
                                        if (stripos($a_temp[0], 'safari') !== false) {
                                        	$browser_icon = "safari.png";
                                        } else {
                                        	$browser_icon = "chrome.png";
                                        }
                                        break;
                                    case 'ie':
                                        $full .= 'User Agent: ';
                                        $full .= strtoupper($browser_info[7]);
                                        // $browser_info[14] will only be set if $browser_info[1] is also set
                                        if ( $browser_info[14] ) {
                                            if ( $browser_info[14] != $browser_info[1] ) {
                                                $full .= '<br />(compatibility mode)';
                                                $full .= '<br />Actual Version: ' . number_format( $browser_info[14], '1', '.', '' );
                                                $full .= '<br />Compatibility Version: ' . $browser_info[1];
                                            }
                                            else {
                                                $full .= '<br />(standard mode)';
                                                $full .= '<br />Full Version Info: ' . $browser_info[1];
                                            }
                                        }
                                        else {
                                            $full .= '<br />Full Version Info: ';
                                            $full .= ( $browser_info[1] ) ? $browser_info[1] : 'Not Available';
                                        }
                                        $browser_icon = "ie.png";
                                        break;
                                    default:
                                        $full .= 'User Agent: ';
                                        $full .= ucwords($browser_info[7]);
                                        $full .= '<br />Full Version Info: ';
                                        $full .= ( $browser_info[1] ) ? $browser_info[1] : 'Not Available';
                                        break;
                                }

                                $full .= "<img id='browsericon' class='icon' src='images/$browser_icon'/>";

                                if ( $browser_info[1] != $browser_info[9] ) {
                                    $full .= '<br />Main Version Number: ' . $browser_info[9];
                                }
                                if ( $browser_info[17][0] ) {
                                    $full .= '<br />Layout Engine: ' . ucfirst( ( $browser_info[17][0] ) );
                                    if ( $browser_info[17][1] ) {
                                        $full .= '<br />Engine Version: ' . ( $browser_info[17][1] );
                                    }
                                }

                                echo $full . '</p>';
                                ?>
                                <script type="text/javascript">
                                    client_data('width');
                                </script>
                                <h4 class="right-bar">JavaScript</h4>
                                <script type="text/javascript">
                                    client_data('js');
                                </script>
                                <noscript>
                                <p class="right-bar">JavaScript is disabled</p>
                                </noscript>
                                <script type="text/javascript">
                                    client_data('cookies');
                                </script>
                        </div>
					</div>
					<div class="firstlevel" id="developers">
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
				<center>2013 Marco Mornati</center>
			</span>
		</div>
	</body>
</html>