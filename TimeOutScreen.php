<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<Title>
		White Lake Cheese Portal - Session Time Out!
	</Title>
<?php
session_start();
ob_start();
?>	  	
</head>
<body class="login">
	<table class="LoginTbl">
		<tr class="border_bottom">
			<td>
			<img src="WhiteLakeLogoNoTxt.png">
			</td>
			<td>
				<h1>
					Portal
				</h1>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<p><i><font size="1px" color="red">You have timed out of the system, please log back in to continue using the Portal.</font></i></p>	
			</td>
		</tr>
		<tr>
		
			<td colspan="2">
			<script type="text/javascript">

				function showExplaination() 
				{
					if (document.getElementById('SecShow').onclick) {
						document.getElementById('showSec').style.visibility = 'visible';
						document.getElementById('showSec1').style.visibility = 'visible';
						document.getElementById('hidesecHead').style.visibility = 'visible';
						document.getElementById('showsecHead').style.visibility = 'hidden';
						}
					else document.getElementById('showSec').style.visibility = 'hidden';
				}
					
					
				
				function hideExplaination()
				{
					if (document.getElementById('SecHide').onclick) {
						document.getElementById('showsecHead').style.visibility = 'visible';
						document.getElementById('hidesecHead').style.visibility = 'hidden';
						document.getElementById('showSec').style.visibility = 'hidden';
						document.getElementById('showSec1').style.visibility = 'hidden';
						}
					else {
					document.getElementById('showSec').style.visibility = 'visible';
					document.getElementById('showSec1').style.visibility = 'visible';
					}
					
				}
				
						
						
					
					
				</script>
				<div id="showsecHead">
				<p style="display:inline"> 
				Security (<a href="#" onclick="javascript:showExplaination();" id="SecShow">Show Explaination</a>)
				</p>
				</div>
				<div id="hidesecHead" style="visibility:hidden">
				<p style="display:inline"> 
				Security (<a href="#"  onclick="javascript:hideExplaination();" id="SecHide">Hide Explaination </a>)
				</p>
				</div>
				
				
				<input type='radio' id='public' name='SecCheck' checked="checked"> This is a public or shared computer
				<div id="showSec" style="visibility:hidden">
				
				<p class="secText">
				Select this option if you are connecting from a public computer. Be sure to log off and close all browser windows to end your session.
				<p>
				</div>
				<input type='radio' id='private' name='SecCheck'> This is a private computer
				<div id="showSec1" style="visibility:hidden">
				<p class="secText">
				 	Select this option if you are the only person using this computer. This option provides additional time of inactivity before automatically logging you off. You will also be able to store your account details to this browser.<p>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				 <input type="checkbox" name="PassChange" value="Yes"> <p class="secText" style="display:inline">I want to change my password after logging on</p>
			</td>
		</tr>
		<form method="post" action="">
		<tr>
			<td colspan="2">
				Username:<input type="text" name="Username" size="35" required>
			</td>
		
		</tr>
		<tr>
			<td colspan="2">
				Password:  <input type="password" name="Password" size="35" id="passcheck" required >
			</td>
		
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				 <input type="checkbox" onclick="myFunction()">Show Password 
				 <script>
					function myFunction() {
					var x = document.getElementById("passcheck");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				} 
				</script>
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				 <input type="submit" value="Login" name="Login" class="LoginBtn">
				 
			</td>
		</tr>
		</form>
		<?php
	  if (isset($_POST['Login']))
	 {
		include('connect.php');
		if ($_POST['PassChange'] == 'Yes'){
				$PassChange = $_POST['PassChange'];
				$_SESSION['PassChange'] = $PassChange;
			
			$Username = $_POST['Username'];
			$Password = $_POST['Password'];
			$SecCheck = $_POST['SecCheck'];
			$sql = "SELECT * FROM account WHERE Username='$Username' AND Password='$Password'";
			$result = mysqli_query($conn,$sql);
			$loggedin = 0;
			while ($row = mysqli_fetch_array($result))
				{
					$Account_Type = $row[4];
					$Staff_ID = $row[1];
					$Account_Status = $row[5];
					$Pass_Update = $row[6];
					$Pass_UpdateDate = date("d/m/Y", strtotime($Pass_Update));
					$TodayDate = date('d/m/Y');
					
					//echo"<p>Welcome back $Username</p>";
					$_SESSION['Username'] = $Username;
					$_SESSION['Staff_ID'] = $Staff_ID;
					$_SESSION['Account_Type'] = $Account_Type;
					$_SESSION['Account_Status'] = $Account_Status;
					$_SESSION['Pass_UpdateDate'] = $Pass_UpdateDate;
					$_SESSION['TodayDate'] = $TodayDate;
					$_SESSION['SecCheck'] = $SecCheck;
					$_SESSION['last_login_timestamp'] = time();
					$sqldetails = "SELECT * FROM staff WHERE Staff_ID='$Staff_ID'";
						$resultdetails = mysqli_query($conn,$sqldetails);
						while ($detailrow = mysqli_fetch_array($resultdetails))
						{
							$First_Name_User = $detailrow[1];
							$Last_Name_User = $detailrow[2];
							$AccountEmail = $detailrow[11];
							$_SESSION['First_Name'] = $First_Name_User;
							$_SESSION['Last_Name'] = $Last_Name_User;
							$_SESSION['AccountEmail'] = $AccountEmail;
						$loggedin = 1;
						$_SESSION['loggedin'] = $loggedin;
						//echo "<a href='logoff.php'>Log off</a>";
						header("location:PortalHome.php");
					}	
				}
			if ($loggedin == 0)
			{
				unset($_SESSION['PassChange']);
				header("location:LoginError.php");
				
			}
		}
		else {
			$PassChange = "No";
				$_SESSION['PassChange'] = $PassChange;
			include('connect.php');			
			$Username = $_POST['Username'];
			$Password = $_POST['Password'];
			$SecCheck = $_POST['SecCheck'];
			$sql = "SELECT * FROM account WHERE Username='$Username' AND Password='$Password'";
			$result = mysqli_query($conn,$sql);
			$loggedin = 0;
			while ($row = mysqli_fetch_array($result))
				{
					$Account_Type = $row[4];
					$Staff_ID = $row[1];
					$Account_Status = $row[5];
					$Pass_Update = $row[6];
					$Pass_UpdateDate = date("d/m/Y", strtotime($Pass_Update));
					$TodayDate = date('d/m/Y');
					
					//echo"<p>Welcome back $Username</p>";
					$_SESSION['Username'] = $Username;
					$_SESSION['Staff_ID'] = $Staff_ID;
					$_SESSION['Account_Type'] = $Account_Type;
					$_SESSION['Account_Status'] = $Account_Status;
					$_SESSION['Pass_UpdateDate'] = $Pass_UpdateDate;
					$_SESSION['TodayDate'] = $TodayDate;
					$_SESSION['SecCheck'] = $SecCheck;
					$_SESSION['last_login_timestamp'] = time();
					$sqldetails = "SELECT * FROM staff WHERE Staff_ID='$Staff_ID'";
						$resultdetails = mysqli_query($conn,$sqldetails);
						while ($detailrow = mysqli_fetch_array($resultdetails))
						{
							$First_Name_User = $detailrow[1];
							$Last_Name_User = $detailrow[2];
							$AccountEmail = $detailrow[11];
							$_SESSION['First_Name'] = $First_Name_User;
							$_SESSION['Last_Name'] = $Last_Name_User;
							$_SESSION['AccountEmail'] = $AccountEmail;
						$loggedin = 1;
						$_SESSION['loggedin'] = $loggedin;
						//echo "<a href='logoff.php'>Log off</a>";
						//echo $Pass_UpdateDate
						//echo $SecCheck;
						header("location:PortalHome.php");
					}	
				}
			if ($loggedin == 0)
			{
				unset($_SESSION['PassChange']);
				header("location:LoginError.php");
				
			}
		
		}
	 }
	?>
		<tr>
			<td colspan="2">
				<p class="secText">Connected to White Lake Cheese Portal<p>
				<p class="secText">&copy; 2018 White Lake Cheese Ltd. <a href="LegalDocs-TOU.html" target="_Blank">All rights reserved<p></a>
				<a href="HomePage.html" class="secText">Return to Company Website</a>
			</td>
		</tr>
	</table>	
</body>
</html>