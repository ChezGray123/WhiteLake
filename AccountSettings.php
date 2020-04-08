<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Account Settings
	</title>
<?php
session_start();
ob_start();
if (isset($_SESSION['AddStaff_First_Name']))
{
	unset($_SESSION['$UserGeneratedUsername']);
									unset($_SESSION['$UserAddStaff_Password']);
									unset($_SESSION['$UserAddStaff_First_Name']);
									unset($_SESSION['$UserAddStaff_Last_Name']);
									unset($_SESSION['$UserAddStaff_Email']);
									unset ($_SESSION['AddStaff_First_Name']);
									unset ($_SESSION['AddStaff_Last_Name']);
							unset ($_SESSION['AddStaff_Job_Role']);
							 unset ($_SESSION['AddStaff_Account_Type']);
							 unset ($_SESSION['AddStaff_Employment_Start']);
							unset ($_SESSION['AddStaff_Employment_End']);
							unset ($_SESSION['AddStaff_DOB']);
							unset ($_SESSION['AddStaff_Address1']);
							unset ($_SESSION['AddStaff_Address2']);
							unset ($_SESSION['AddStaff_Address3']);
							unset ($_SESSION['AddStaff_Postcode']);
							unset ($_SESSION['AddStaff_Phone_No']);
							unset ($_SESSION['AddStaff_Email']);
							unset ($_SESSION['GeneratedUsername']);
							unset ($_SESSION['AddStaff_Password']);
							
									unset($_SESSION['$Name']);
									unset($_SESSION['$Description']);
									unset($_SESSION['$Milk_Type']);
									unset($_SESSION['$Pastuerised_Stat']);
									unset($_SESSION['$Rennet']);
									unset ($_SESSION['Style']);
									unset ($_SESSION['Weight_Est']);
							unset ($_SESSION['Origin']);
							 unset ($_SESSION['Quantity']);
							 unset ($_SESSION['Price']);
							unset ($_SESSION['Prod_Stat']);
}
?>	
</head>
<body class="Len">
	<div class='PortalHeader'>
		<table class="portal" width="100%" style="text-align:right">
			<tr>
				<td rowspan="4" width="40%">
					<a href="PortalHome.php">
					<img src="WhiteLakeLogoNoTxt.png" align="left" width="100%" alt="White Lake Cheese Logo">
					</a>
				</td>
				<td rowspan="4" width="35%">
					<h1 style="padding-top:30px;">
						Portal
					</h1>
				</td>
				<td>
					<p >Todays Date: <span id="$datetime"></span></p>
					<script>
					var dt = new Date();
					document.getElementById("$datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2))+"/"+ (dt.getFullYear());
					</script>
				</td>
			</tr>
			<tr>
				<td>
					<?php
					  if (isset($_SESSION['Username']))
						{
							$Username = $_SESSION['Username'];
							$Account_Type = $_SESSION['Account_Type'];
							include('connect.php');
							$sqlAccount = "SELECT * FROM account WHERE Username='$Username'";
								$resultAccount = mysqli_query($conn,$sqlAccount);
								
								while ($rowAccountType = mysqli_fetch_array($resultAccount))
									{
										$Account_TypeCheck = $rowAccountType[4];
										$_SESSION['Account_Type'] = $Account_TypeCheck;
										$Account_Type = $_SESSION['Account_Type'];
									}
							$Staff_ID = $_SESSION['Staff_ID'];
							$PassChange = $_SESSION['PassChange'];
							$First_Name_User = $_SESSION['First_Name'];
							$Last_Name_User = $_SESSION['Last_Name'];
							$AccountEmail = $_SESSION['AccountEmail'];
							 if (isset($_SESSION['Username']))
						{
							$Pass_UpdateDate = $_SESSION['Pass_UpdateDate'];
							//$Pass_UpdateDate = date("d/m/Y", strtotime($Pass_UpdateDate)); //was stopping update password date from being read correctly
							$TodayDate = $_SESSION['TodayDate'];
							$Username = $_SESSION['Username'];
							$Account_Type = $_SESSION['Account_Type'];
							$Staff_ID = $_SESSION['Staff_ID'];
							$PassChange = $_SESSION['PassChange'];
							$First_Name_User = $_SESSION['First_Name'];
							$Last_Name_User = $_SESSION['Last_Name'];
							$AccountEmail = $_SESSION['AccountEmail'];
							$Account_Status = $_SESSION['Account_Status'];
							$loggedin = $_SESSION['loggedin'];
							$SecCheck = $_SESSION['SecCheck'];
							if ($SecCheck == 1)
							{
								if((time() - $_SESSION['last_login_timestamp']) > 1800) // 1800 =  30 * 60
								{
									header("Location:LogoffTimeOut.php");
								}
								else{
									$_SESSION['last_login_timestamp'] = time();
								}
							}
							else
							{
								if((time() - $_SESSION['last_login_timestamp']) > 900) // 900 =  15 * 60
								{
									header("Location:LogoffTimeOut.php");
								}
								else{
									$_SESSION['last_login_timestamp'] = time();
								}
							}
							echo"Welcome back $First_Name_User $Last_Name_User";
							
						}
					 else
					 {
						echo"Username not detected";
						header("location:LoginError.php");
					 }
					if ($loggedin != 1)
					{
						session_start();
session_destroy();
						header("location:LoginError.php");
					}
					else
					{
						
					}
					if ($PassChange == 'Yes')
					{
						header("location:ChangePass.php");
					}
						}
					?>
			</td>
	</div>
			</tr>
			<tr>
				<td style="text-align:middle;">
					<a href="Logoff.php"> Log off Portal </a> <a href="Logoff.php"> <img src="LogoffIcon.png" alt="Log off Icon" HSPACE="5" VSPACE="0"> </a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="AccountSettings.php"> Account Settings</a> <a href="#"> <img src="SettingButton.png" width="10%" alt="Settings Icon"> </a>
				</td>
			</tr>
		</table>	
	</div>
	<br>
	<div class="PortalNav">
		<table>
			<tr>
				<td style="text-align:center; border-top:3px solid blue">
					<b>Company Resources</b>
				</td>
			</tr>
			<tr>
				<td>
					<a href="StockTable.php">Stock Table</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="MarketStockTable.php">Market Stock</a>
				</td>
			</tr>
			
			<tr>
				<td>
					<a href="Homepage.html" target="_blank">Company Homepage</a>
				</td>
			</tr>
			<?php
			if ($Account_Type < 5)
			{
				
			}
			else
			{
				echo "<tr>
				<td>
					<a href='AddStaff.php' target=''>Add Staff</a>
				</td>
			</tr>";
			}		?><?php
			if ($Account_Type < 4)
						{
							
						}
			else{
				echo"
			<tr>
				<td>
					<a href='ViewStaff.php' target=''>View Staff Members</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href='AddStock.php' target=''>Add Stock</a>
				</td>
			</tr>";	
			}						
			?>		
			<tr>
			<tr>
				<td style="text-align:center; border-top:3px solid blue">
					<b>Useful Links</b>
				</td>
			</tr>
			<tr>
				<td>
					<a href="DocumentStore.php">Document Store</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="WageCalculator.php">Wage Calculator</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="CompanyCalender.php">Company Calender</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="CompanyContacts.php">Contacts</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="StaffPortalUserGuides.php">Staff Portal User Guides</a>
				</td>
			</tr>
		</table>
	</div>
	<div class="PortalContent" style="border-top:3px solid blue; display:inline-block; width=40%">
		<h2>
			Employment Details
		</h2>
		<p>
		The below details cannot be changed, if an error is seen in our data stored about you, or a change of data is required, please <a href="ContactUsPortal.html" onclick="window.open('ContactUsPortal.html', 
                         'newwindow', 
                         'width=450px,height=250px'); 
              return false;">contact an admin</a>.
		</p>
		<?php
			include('connect.php');
			$sql = "SELECT * FROM Staff WHERE Staff_ID = '$Staff_ID'";
			$result = mysqli_query($conn,$sql);
			$NoRecord = 0;
			while ($row = mysqli_fetch_array($result))
				{
					$Staff_ID = $row[0];
					$First_Name = $row[1];
					$Last_Name = $row[2];
					$Job_Role = $row[3];
					$Employment_Start = $row[4];
					$Employment_End = $row[5];
					$DOB = $row[6];
					$Address1 = $row[7];
					$Address2 = $row[8];
					$Address3 = $row[9];
					$Postcode = $row[10];
					$Email = $row[11];
					$Phone_No = $row[12];
					$NoRecord = 1;
					$Employment_StartDate = date("d/m/Y", strtotime($Employment_Start)); //apply english date format
					$DOBDate = date("d/m/Y", strtotime($DOB));
					
					if ($Employment_End =='0000-00-00')
					{ //check if value is 0 and set variable as a text message
					$Employment_EndDate = 'No End Date Currently Set';
					}
					if ($Employment_End !='0000-00-00')
					{ //check if value is not 0 and set date format to english
					$Employment_EndDate = date("d/m/Y", strtotime($Employment_End));
					}
					
					
					$sqldetails = "SELECT * FROM account WHERE Username='$Username'";
					$resultdetails = mysqli_query($conn,$sqldetails);
						while ($detailrow = mysqli_fetch_array($resultdetails))
					{
							$Username_Account = $detailrow[2];
							$UserAccount_Type = $detailrow[4];
							$Pass_Update = $detailrow[6];
							$NoRecord = 2;
							$Pass_UpdateDate = date("d/m/Y", strtotime($Pass_Update));
							// check if you can read from this table outside of this loop. Create a new table which just checks for details in here and see if it prints
							$Staff_IDPad = sprintf("%08d", $Staff_ID);
				?>	
		<table width= "100%" style="background-color:#f8f8f8;">
		
			<tr>
				<td width="60%">
					Full Name: </td><td width="40%"><?php echo"$First_Name $Last_Name";?>
				</td>
			</tr>
			<tr>
				<td>
					Staff ID Number: </td><td><?php echo"$Staff_IDPad";?>
				</td>
			</tr>
			<tr>
				<td>
					Date of Birth: </td><td><?php echo"$DOBDate";?>
				</td>
			</tr>					
			<tr>
				<td>
					Job Role: </td><td><?php echo"$Job_Role";?>
				</td>
			</tr>	
			<tr>
				<td>
					Employment Contract Start Date: </td><td><?php echo"$Employment_StartDate";?>
				</td>
			</tr>	
			<tr>
				<td>
					Expected Contact End Date: </td><td><?php echo"$Employment_EndDate";?>
				</td>
			</tr>
								
		</table>	
	
			<br>
		<h2>
			Account Settings
		</h2>
		<p>
		Please select if you wish to update your accounts password. This password will be required to be changed on the given date below, you will be prompted to do this on the below date. Updating this password will alter the required password update date on the system, which will be reflected below.
		</p>
		<table width="100%" style="background-color:#f8f8f8;">
			<tr>
				<td width="60%">
					User Name<a href="#adminnotice">*</a>: </td><td width="40%"><?php echo"$Username_Account";?>
				</td>
			</tr>
			<tr>
				<td >
					Access Level:</td><td >Level <?php echo"$UserAccount_Type ";?>Access
				</td>
			</tr>
			
			<tr>
				<td>
					Date of Required Password Update: </td><td><?php echo "$Pass_UpdateDate";?>
				</td>
			</tr>
			<tr>
				<td>
					<a href = "ChangePass.php"> Change password </a>
				</td>
			</tr>
			
			</table>
			
			<br>
			<h2>
			Contact Details
			</h2>
			<p>
			Please ensure that the below contact information is kept up-to-date and reviewed regularly. Failure to ensure these details are not kept current could result in delays in payment processing for staff wages.
			</p>
			<form method="post" enctype="multipart/form-data" action="">
			<table width="100%" style="background-color:#f8f8f8;">
			<tr>
				<td width="60%">
					Email Address: 
					</td>
					<td width="40%"><input pattern=".{7,50}" type="email" name="EmailAddress" size="25" value="<?php echo $Email;?>">
				</td>
			</tr>
			<tr>
				<td>
					Phone Number: </td>
					<td> <input pattern=".{11}" type="tel" name="PhoneNumber" maxlength="11" size="25" value="<?php echo $Phone_No;?>">
				</td>
			</tr>
			<tr>
				<td>
					Address Line 1: </td>
					<td><input type="text" pattern=".{2,50}" name="AddressLine1" size="25" value="<?php echo $Address1;?>">
				</td>
			</tr>
			<tr>
				<td>
					Address Line 2: </td>
					<td><input type="text" pattern=".{1,50}" name="AddressLine2" size="25" value="<?php echo $Address2;?>">
				</td>
			</tr>
			<tr>
				<td>
					Address Line 3: </td>
					<td><input type="text" pattern=".{1,50}" name="AddressLine3" size="25" value="<?php echo $Address3;?>">
				</td>
			</tr>
			<tr>
				<td>
					Postcode: </td>
					<td><input pattern=".{7,8}" type="text" name="PostcodeChange" size="25" maxlength="8" value="<?php echo $Postcode;?>">
				</td>
			</tr>
			<tr>
				<td>
					</td>
					<td><input type="submit" name="UpdateDetails" value="Update Details" class="LoginBtn">
				</td>
			</tr>
			</form>
			<?php
			}
		}
			if(isset($_POST['UpdateDetails']))
				{
					include('connect.php');
					$EmailAddress = mysql_real_escape_string($_POST['EmailAddress']);
					$PhoneNumber = mysql_real_escape_string($_POST['PhoneNumber']);
					$AddressLine1 = mysql_real_escape_string($_POST['AddressLine1']);
					$AddressLine2 = mysql_real_escape_string($_POST['AddressLine2']);
					$AddressLine3 = mysql_real_escape_string($_POST['AddressLine3']);
					$PostcodeChange = mysql_real_escape_string($_POST['PostcodeChange']);
					
					$sql = "UPDATE staff SET Address1 = '$AddressLine1',Address2 = '$AddressLine2',Address3 = '$AddressLine3',Postcode = '$PostcodeChange',Email = '$EmailAddress',Phone_No = '$PhoneNumber' WHERE Staff_ID = '$Staff_ID'";
					mysqli_query($conn,$sql);
						if ($conn->query($sql) === True)
						{
							$AccountEmail = $EmailAddress;
							$_SESSION['AccountEmail'] = $AccountEmail;
							$Updated = 1;
						}
					if ($Updated == 1)
					{
						header('location:Accountsettings.php');
					}
					
					
				}
			?>
			</table>
			
			
			
			<?php

				if ($NoRecord == 1)
				{
					echo "<p><i><font size='1px' color='red'>Some account information could not be retreived. If you think this is being displayed in error, please contact an admin.</a></i></font><p>";
	
				}
				if ($NoRecord == 0)
				{
					echo "<p><i><font size='1px' color='red'>Please contact an admin, All account information could not be obtained.</a></i></font><p>";
	
				}
				
			?>
		
		<a name="adminnotice">
		
		<i><font size='1px' color='red'>*Usernames cannot be changed and are assigned to a user upon your account creation.</i></font>
		</a>
	</div>
	<br>
	<footer>
		<div class="PortalFooter" width="100%">
		<table class="PortalFooter" >
			<tr>
				<td style="text-align:center; border-top:3px solid blue">
					<a href="ContactUsPortal.html" onclick="window.open('ContactUsPortal.html', 
                         'newwindow', 
                         'width=450px,height=500px'); 
              return false;"> Contact Us</a> | <a href="ITUserAgreement.html" onclick="window.open('ITUserAgreement.html', 
                         'newwindow', 
                         'width=450px,height=500px'); 
              return false;"> IT User Agreement</a>
				</td>
			</tr>
			<tr>
				<td>
					<p class="Footer">
						All content copyright &copy; 2018 White Lake Cheese Ltd.
					</p>
				</td>
				</tr>
				<tr>
					<td>
						<p class="Footer">
							All Rights Reserved
						</p>
					</td>
				</tr>
			
		</table>
	</div>
	</footer>
</body>
</head>