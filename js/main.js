$(document).ready(function() {
	$("ul.tabs").tabs("div.panes > div");
	changeImage('network');
	$('#loading').hide()  
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    });
	$.ajax({
  		type: "GET",
  		url: "whois.php",
  		dataType: "html",
  		success: function(data) {
  			$('#whois').html(data);	
  		}
	});
});

function changeImage(area) {
	if (area=='developers') {
		$('#areaimage').attr('src', 'images/dev_info.png');
	} else if (area=='browser') {
		$('#areaimage').attr('src', 'images/browser.png');	
	} else if (area=='network') {
		$('#areaimage').attr('src', 'images/network.png');	
	}	
}

function client_data(info)
{
	if (info == 'width') {
		width_height_html = '<h4  class="right-bar">Current Screen Resolution</h4>';
		width = (screen.width) ? screen.width:'';
		height = (screen.height) ? screen.height:'';
		// check for windows off standard dpi screen res
		if (typeof(screen.deviceXDPI) == 'number') {
			width *= screen.deviceXDPI/screen.logicalXDPI;
			height *= screen.deviceYDPI/screen.logicalYDPI;
		} 
		width_height_html += '<p class="right-bar">' + width + " x " +
			height + " pixels</p>";
		(width && height) ? document.write(width_height_html):'';
	}
	else if (info == 'js' ) {
		document.write('<p class="right-bar">JavaScript is enabled.</p>');
	}
	else if ( info == 'cookies' ) {
		expires ='';
		Set_Cookie( 'cookie_test', 'it_worked' , expires, '', '', '' );
		string = '<h4  class="right-bar">Cookies</h4><p class="right-bar">';
		if ( Get_Cookie( 'cookie_test' ) ) {
			string += 'Cookies are enabled</p>';
		}
		else {
			string += 'Cookies are disabled</p>';
		}
		document.write( string );
	}
}

