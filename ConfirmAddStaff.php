<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Confirm Staff Details
	</title>
<?php
session_start();
ob_start();

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
					<p >Todays Date: <span id="datetime"></span></p>
					<script>
					var dt = new Date();
					document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2))+"/"+ (dt.getFullYear());
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
							$NameGen = $_SESSION['NameGen'];
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
							$SecCheck = $_SESSION['SecCheck'];
							$loggedin = $_SESSION['loggedin'];
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
					if ($NameGen != 1) //check if they have gone through the add staff page first
					{
						header("location:AddStaff.php"); //return back 1 step if not, otherwise variables wont exist
					}
					if($Account_Type !=5)
					{
						header("location:AccessDenied.php");
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
			Add New User to Portal System > Confirm Details
		</h2>
		<p>
		Please confirm the details of the new staff member you wish to add to the White Lake Cheese Staff Portal system are correct. Any Details which are entered incorrectly will require the staff member too follow company policy and have them changed by a System Administrator. 
		</p>
		<table>
						<?php							 
							 if (isset($_SESSION['AddStaff_First_Name']))
						{
							 $AddStaff_First_Name = $_SESSION['AddStaff_First_Name'];
							 $AddStaff_Last_Name = $_SESSION['AddStaff_Last_Name'];
							 $AddStaff_Job_Role = $_SESSION['AddStaff_Job_Role'];
							 $AddStaff_Account_Type = $_SESSION['AddStaff_Account_Type'];
							 $AddStaff_Employment_Start = $_SESSION['AddStaff_Employment_Start'];
							 $AddStaff_Employment_End = $_SESSION['AddStaff_Employment_End'];
							$AddStaff_DOB = $_SESSION['AddStaff_DOB'] ;
							 $AddStaff_Address1 = $_SESSION['AddStaff_Address1'];
							  $AddStaff_Address2 = $_SESSION['AddStaff_Address2'];
							  $AddStaff_Address3 = $_SESSION['AddStaff_Address3'];
							  $AddStaff_Postcode = $_SESSION['AddStaff_Postcode'];
							  $AddStaff_Phone_No = $_SESSION['AddStaff_Phone_No'];
							  $AddStaff_Email = $_SESSION['AddStaff_Email'];
							  $GeneratedUsername = $_SESSION['GeneratedUsername'];
							  $AddStaff_Password = $_SESSION['AddStaff_Password'];
							  $AddStaff_DOBDate = date("d/m/Y", strtotime($AddStaff_DOB));
							  $AddStaff_Employment_StartDate = date("d/m/Y", strtotime($AddStaff_Employment_Start));
							  $AddStaff_Employment_EndDate = date("d/m/Y", strtotime($AddStaff_Employment_End));
							  if ($AddStaff_Employment_EndDate <= "01/01/1970")
							  {
								  $AddStaff_Employment_EndDate = "No Contract End Date Set";
								  $ContEnd = 1;
							  }
							  else{
								   $ContEnd = 0;
							  }
							  
												  
						}
						?>
		<form method="post" action="" enctype="multipart/form-data">
			<tr>
				<td>
					Username<a href="#adminnotice">*:
				</td>
				<td>
					<?php echo"$GeneratedUsername"; ?>
				</td>
			</tr>
			<tr>
			<tr>
				<td>
					Temp Password<a href="#adminnotice2">*:
				</td>
				<td>
					<?php echo $AddStaff_Password[0]; ?>
				</td>
			<tr>
				<td>
					First Name:
				</td>
				<td>
					<?php echo"$AddStaff_First_Name"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Last Name:
				</td>
				<td>
					<?php echo"$AddStaff_Last_Name"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Job Role:
				</td>
				<td>
					<?php echo"$AddStaff_Job_Role"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Account Access Level:
				</td>
				<td>
					<?php echo"$AddStaff_Account_Type"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Employment Starting Date:
				</td>
				<td>
					<?php echo"$AddStaff_Employment_StartDate"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Employment End Date:
				</td>
				<td>
					<?php 
					if ($ContEnd == 1){
						echo "<i><font color='red'>";
						echo "$AddStaff_Employment_EndDate<a href='#adminnotice4'>*</a></i></font>"; 
					}
					else
					{
						echo"$AddStaff_Employment_EndDate"; 
					}
					?>
				</td>
			</tr>
			<tr>
				<td>
					Date Of Birth:
				</td>
				<td>
					<?php echo"$AddStaff_DOBDate"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Address Line 1:
				</td>
				<td>
				<?php echo"$AddStaff_Address1"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Address Line 2:
				</td>
				<td>
				<?php echo"$AddStaff_Address2"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Address Line 3:
				</td>
				<td>
					<?php echo"$AddStaff_Address3"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Postcode:
				</td>
				<td>
				<?php echo"$AddStaff_Postcode"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Phone Number:
				</td>
				<td>
					<?php echo"$AddStaff_Phone_No"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Email Address<a href="#adminnotice3">*:
				</td>
				<td>
					<?php echo"$AddStaff_Email"; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="ClearForm" value="Cancel" class="LoginBtn">
					<input type="submit" name="AddStaff" value="Confirm and Add Staff Member" class="LoginBtn">
				</td>
			</tr>
			</form>
			<?php
				if(isset($_POST['AddStaff']))
					{
							include('connect.php');
							
							$AddStaff_First_Name = $AddStaff_First_Name;
							$AddStaff_Last_Name = $AddStaff_Last_Name;
							$AddStaff_Job_Role = $AddStaff_Job_Role;
							$AddStaff_Employment_Start = $AddStaff_Employment_Start;
							$AddStaff_Employment_End = $AddStaff_Employment_End;
							$AddStaff_DOB = $AddStaff_DOB;
							$AddStaff_Address1 = $AddStaff_Address1;
							$AddStaff_Address2 = $AddStaff_Address2;
							$AddStaff_Address3 = $AddStaff_Address3;
							$AddStaff_Postcode = $AddStaff_Postcode ;
							$AddStaff_Phone_No = $AddStaff_Phone_No;
							$AddStaff_Email = $AddStaff_Email;
							$GeneratedUsername = $GeneratedUsername;
							$AddStaff_Passwordupload = $AddStaff_Password[0];
							
							$encrypt_Password= md5($AddStaff_Passwordupload);
							$AddStaff_Account_Type = $AddStaff_Account_Type;
							
							$sql = "Insert into staff (First_Name,Last_Name,Job_Role,Employment_Start,Employment_End,DOB,Address1,Address2,Address3,Postcode,Email,Phone_No) Values('$AddStaff_First_Name','$AddStaff_Last_Name','$AddStaff_Job_Role','$AddStaff_Employment_Start','$AddStaff_Employment_End','$AddStaff_DOB','$AddStaff_Address1','$AddStaff_Address2','$AddStaff_Address3','$AddStaff_Postcode','$AddStaff_Email','$AddStaff_Phone_No')";
							mysqli_query($conn,$sql);
							$UserAdd = 1;
							if ($UserAdd == 1)
							{
								include('connect.php');
								$sqlCheck = "SELECT * FROM staff WHERE Email = '$AddStaff_Email' AND First_Name = '$AddStaff_First_Name' AND Last_Name = '$AddStaff_Last_Name'";
								$result = mysqli_query($conn,$sqlCheck);
								while ($row = mysqli_fetch_array($result))
								{
								$NewUserID = $row[0];
								$NewAccount_Status = 'FirstLogin';
								
								$TodayDate=date('d-m-Y');
								$Pass_UpdateDatetwoUser = date("d-m-Y", strtotime($TodayDate ."+35 days"));
								$Pass_UpdateDateUser = date("Y-m-d", strtotime ($Pass_UpdateDatetwoUser));
								
								
								$sqlDetail = "Insert into account (Staff_ID,Username,Password,Account_Type,Account_Status,Pass_Update) Values('$NewUserID','$GeneratedUsername','$encrypt_Password','$AddStaff_Account_Type','$NewAccount_Status','$Pass_UpdateDateUser')";
								mysqli_query($conn,$sqlDetail);
								$UserAdd = 2;
								if ($UserAdd == 2){
									// Email details to user
									$to = $AddStaff_Email;
									$subject = "White Lake Cheese Staff Portal - Account Details";
									$txt = "Please see your login details below. You will be asked to change this temp password upon your first login, from which point you will be required to change your password every 6 Weeks.\r\nUsername: $GeneratedUsername\r\nPassword: $Password\r\nRegards,\r\n$First_Name_User $Last_Name_User";
									$headers = "From: $AccountEmail";
									mail($to,$subject,$txt,$headers); //wont work as no mail server, check below takes user to page where they can manually send email
									$UserAdd = 3;
									if ($UserAdd == 3)
									{
									$UserAdd = 4;
									$_SESSION['UserAdd'] = $UserAdd;
									$_SESSION['UserNew_Email'] = $AddStaff_Email;
									$_SESSION['UserNew_First_Name'] = $AddStaff_First_Name;
									$_SESSION['UserNew_Last_Name'] = $AddStaff_Last_Name; 
									$_SESSION['UserNew_GenUser'] = $GeneratedUsername;
									$_SESSION['UserNew_Password'] = $AddStaff_Password[0];
									header("location:ConfirmAddStaffSendEmail.php");
										
									}
								}
							}
							}
						
					}
					if(isset($_POST['ClearForm']))
					{
								$NameGen = 0; // if they cancel the add staff process, set value to 0 which stops them from accessing this page without restarting the process
								$_SESSION['NameGen'] = $NameGen;
									
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
								header("location:AddStaff.php");
										
									
								}
			
			?>
			
		</table>
		<a name="adminnotice"><p><i><font size="1px" color="red">
	*An ID number will also be part of this accounts username, this information will be sent to the email address entered and will be required as part of the username to login to the system.
	</a></i></font><p>
	<a name="adminnotice2"><p><i><font size="1px" color="red">
	*This is a randomly generated password, which will be sent too the email address linked too this account. This password will be required to change upon first login.
	</a></i></font><p>
	<a name="adminnotice3"><p><i><font size="1px" color="red">
	*The email address entered here will be visable too all staff members on the portal, via the contacts link located under 'Useful Links'. Please ensure the email address entered here is accurate and that the staff member is happy for this email address to be shared with other staff members.
	</a></i></font><p>
	<a name="adminnotice4"><p><i><font size="1px" color="red">
	*Contract End Dates can be set post account creation by an Administrator. This will be completed when an End Date for your working contract has been confirmed by yourself or upper management.
	</a></i></font><p>
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