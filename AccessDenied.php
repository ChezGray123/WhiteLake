<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<Title>
		White Lake Cheese Portal - Access Denied
	</Title>
<?php
session_start();
ob_start();
?>	  	
</head>
<body class="login">
<?php

?>
	<table class="LoginTbl">
		<tr class="border_bottom">
			<td>
			<img src="WhiteLakeLogoNoTxt.png">
			</td>
		</tr>
		<tr>
			<td>
			<p><i><font size="3px" color="red"><b>Access Denied</b>: You cannot complete the function, or view this page. If you feel this has been displayed in error, please contact a System Administrator.</font></i></p>	
			</td>
		</tr>
		<tr>
			<td>
			<br>
			</td>
		</tr>
		<tr>
			<td>
			<a href="PortalHome.php">Return to Portal Home Screen</a>
			</td>
		</tr>
		
		<tr>
			<td colspan="2">
				<p class="secText">Connected to White Lake Cheese Portal<p>
				<p class="secText">&copy; 2018 White Lake Cheese Ltd. <a href="LegalDocs-TOU.html" target="_Blank">All rights reserved<p></a>
				<a href="HomePage.html" class="secText">Return to Company Website |</a><a href="ContactUsPortal.html" class="secText" onclick="window.open('ContactUsPortal.html', 
                         'newwindow', 
                         'width=450px,height=500px'); 
              return false;"> Contact Us</a>
			</td>
		</tr>
	</table>
	
</body>
</html>