<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<Title>
		White Lake Cheese Portal - Change Password > Error
	</Title>
<?php
session_start();
ob_start();
?>	  	
</head>
<body class="login">
<?php
$PassChange = $_SESSION['PassChange'];
$CurrentPassword = ' ';
$NewPassword = ' ';
$ConfirmPassword = ' ';
$Pass_UpdateDate = $_SESSION['Pass_UpdateDate'];
$TodayDate = $_SESSION['TodayDate'];
?>
<?php
					  if (isset($_SESSION['Username']))
						{
							$Username = $_SESSION['Username'];
							
							
						}
					 else
					 {
						echo"Username not detected";
						header("location:LoginError.php");
					 }
					 if ($loggedin = 0)
					{
						header("location:LoginError.php");
					}
					
					?>
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
			<p><i><font size="1px" color="red">Error - Please check that New Password and Confirm Password matches<br> Please Ensure that you have enter a different password than your current password<br> Please Check that you have entered the correct Current Password<font></i>
			</td>
		</tr>
		<tr>
			<td>
			Please update your password below.<br>
			</td>
		</tr>
		<tr>
			<td>
			<br>
			</td>
		</tr>
		<form method="post" action="">
		<tr>
			<td >
				Current Password:  
			</td>
			<td>
				<input type="password" name="CurrentPassword" size="35" required >
			</td>
			</tr>
			<tr>
			<td >
				New Password:  
				</td>
				<td>
				<input type="password" pattern=".{6,15}" title="Please Enter a New Password (6-15 characters Min 1 Upper & 1 Lowercase Character)" name="NewPassword" size="35" required >
				</td>
			</tr>
			<tr>
			<td>
				Confirm Password:  
				</td>
				<td>
				<input type="password" pattern=".{6,15}" title="Please Enter a New Password (6-15 characters Min 1 Upper & 1 Lowercase Character)" name="ConfirmPassword" size="35" required >
			</td>
		
		</tr>
		<tr>
			<td>
				 <input type="submit" value="Change Password" name="ChangePassword" class="LoginBtn">
				 
			</td>
		
		</form>
		<?php
	if (isset($_POST['ChangePassword']))
	 {
		include('connect.php');
			$Username = $_SESSION['Username'];
			$CurrentPassword = mysql_real_escape_string($_POST['CurrentPassword']);
			$encrypt_CurrentPassword = md5($CurrentPassword);
			$NewPassword = mysql_real_escape_string($_POST['NewPassword']);
			$ConfirmPassword = mysql_real_escape_string($_POST['NewPassword']);
			$encrypt_ConfirmPassword = md5($ConfirmPassword);
			
			if(strlen($ConfirmPassword) >= 6 ){
				if(!ctype_upper($ConfirmPassword) && !ctype_lower($ConfirmPassword)){
					echo "passed";
					$sql = "SELECT * FROM account WHERE Username='$Username'";
					$loggedin = $_SESSION['loggedin'];
					$result = mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_array($result))
						{
							$Password = $row[3];
						}	
						if ($Password == $encrypt_CurrentPassword){
							
							if ($Password !== $encrypt_ConfirmPassword){
								if ($NewPassword == $ConfirmPassword){
								$TodayDate=date('d-m-Y');
								
								$Pass_UpdateDatetwo = date("d-m-Y", strtotime($TodayDate ."+35 days"));
								
								$Pass_UpdateDate = date("Y-m-d", strtotime ($Pass_UpdateDatetwo));
								
								include('connect.php');
								$Account_Status = 'Active';
								$_SESSION['Account_Status'] = $Account_Status;
								$sql = "Update account SET Password='$encrypt_ConfirmPassword', Account_Status='$Account_Status', Pass_Update='$Pass_UpdateDate' WHERE Username='$Username'";
								mysqli_query($conn,$sql);
								if ($conn->query($sql) === True)
								{
									$Pass_UpdateDate = date("d-m-Y", strtotime ($Pass_UpdateDate));
									$Pass_UpdateDate = date("d/m/Y", strtotime($Pass_UpdateDatetwo));
									$_SESSION['Pass_UpdateDate'] = $Pass_UpdateDate;
									$PassChange = 'No';
									$_SESSION['PassChange'] = $PassChange;
									header('location:PortalHome.php');
								}
							}
							}
							else
							{
							header('location:ChangePasswordError.php');
							}							
						}
						else{
							header('location:ChangePasswordError.php');
						}
				}
				else{
					header('location:ChangePasswordError.php');
				}
			}
			else{
				//header('location:ChangePasswordError.php'); //shouldnt be possible as you are required to have 6 characters min to progress, but this is purely to catch errors incase somthing goes wrong
			}
			

	 }
	
	?>
	<form method="post" action="">
			<td>
				 <input type="submit" value="Cancel Change" name="CancelPasswordChange" class="LoginBtn">
				 
			</td>
			</form>
			<?php
			 if (isset($_POST['CancelPasswordChange']))
	 {
		$PassChange = $_POST['Cancel Change'];
		$_SESSION['PassChange'] = $PassChange;
		 header('location:PortalHome.php');
	 }	 
			?>
		</tr>
	</table>	
</body>
</html>