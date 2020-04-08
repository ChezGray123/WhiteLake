<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - View Staff Members
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
							$loggedin = $_SESSION['loggedin'];
							$Account_Status = $_SESSION['Account_Status'];
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
				if($Account_Type <=3)
					{
						header("location:AccessDenied.php");
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
				<td >
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
				<td class='selected'>
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
	<div class="PortalContent" style="border-top:3px solid blue; display:inline-block; width=40%;overflow:scroll;">
	<table class="stocktable">
	<form method="post" enctype="multipart/form-data" action="">
		<input type="hidden" name="Staff_ID"  <?php echo"$Staff_ID";?> />	
		<tr>
			<td style="text-align:center; white-space:nowrap; background-color:#f2f2f2">
				ID
			</td>
			<td style="text-align:center;white-space:nowrap; " >
				First Name
			</td>
			<td style="text-align:center;white-space:nowrap; background-color:#f2f2f2">
				Last Name
			</td >
			<td style="text-align:center;white-space:nowrap; " >
				Account Username
			</td>
			<td style="text-align:center;white-space:nowrap; background-color:#f2f2f2">
				Account Access Level
			</td >
			<td style="text-align:center;white-space:nowrap;">
				Job Role
			</td>
			<td style="text-align:center;white-space:nowrap; background-color:#f2f2f2">
				Employment Start Date
			</td>
			<td style="text-align:center;white-space:nowrap;">
				Employment End Date
			</td>
			<td style="text-align:center;white-space:nowrap; background-color:#f2f2f2">
				DOB
			</td>
			<td style="text-align:center;white-space:nowrap;">
				Address Line 1
			</td>
			<td style="text-align:center;white-space:nowrap; background-color:#f2f2f2">
				Address Line 2
			</td>
			<td style="text-align:center;white-space:nowrap;">
				Address Line 3
			</td>
			<td style="text-align:center;white-space:nowrap; background-color:#f2f2f2">
				Postcode
			</td>
			<td style="text-align:center;white-space:nowrap;">
				Email
			</td>
			<td style="text-align:center;white-space:nowrap; background-color:#f2f2f2">
				Phone Number
			</td>
			<td style="text-align:center;white-space:nowrap;">
				Account Status
			</td>
			<td style="text-align:center;white-space:nowrap;background-color:#f2f2f2">
				Edit User Details
			</td>
			<?php
			if($Account_Type!=5)
			{
				
			}
			else
			{
				echo"<td style='text-align:center;white-space:nowrap;'>
				Delete User Account
			</td>";
			}
			?>
		</tr> 
	<?php // first row of table comes above this to stop the headers from being reprinted for each new record found
			$i=0; 
			$StaffData = array();
			
			$Staff_ID = $Staff_ID;
			include('connect.php');
			$sql = "SELECT * FROM staff WHERE Staff_ID <> '$Staff_ID' ORDER BY Staff_ID";
			$result = mysqli_query($conn,$sql);
			$NoStaff = 0;
			while ($row = mysqli_fetch_array($result))
				{
					$UserStaff_ID = $row[0];
					$Staff_IDPad = sprintf("%08d", $UserStaff_ID);
					$UserFirst_Name = $row[1];
					$UserLast_Name = $row[2];
					$UserJob_Role = $row[3];
					$UserEmployment_Start = $row[4];
					$UserEmployment_StartDate = date("d/m/Y", strtotime($UserEmployment_Start));
					$UserEmployment_End = $row[5];
					$UserEmployment_EndDate = date("d/m/Y", strtotime($UserEmployment_End));
					if ($UserEmployment_EndDate <= "01/01/1970")
							  {
								  $UserEmployment_EndDate = "No Contract End Date Set";
								 
							  }
					$UserFirst_Name = ucfirst($UserFirst_Name);
					$UserLast_Name = ucfirst($UserLast_Name);
					$UserDOB = $row[6];
					$UserDOBDate = date("d/m/Y", strtotime($UserDOB));
					$UserAddress1 = $row[7];
					$UserAddress2 = $row[8];
					$UserAddress3 = $row[9];
					$UserPostcode = $row[10];
					$UserEmail = $row[11];
					$UserPhone_No = $row[12];
					$NoStaff = 1;
					 
				
					
			include('connect.php');
			$sqlAccount = "SELECT * FROM account WHERE Staff_ID = '$UserStaff_ID'";
			$resultAccount = mysqli_query($conn,$sqlAccount);
			$NoStaff = 0;
			while ($rowAccount = mysqli_fetch_array($resultAccount))
				{
					$UserUserName = $rowAccount[2];
					$UserAccountAccess = $rowAccount[4];
					$UserAccountStatus = $rowAccount[5];
					$NoStaff = 2;
					$StaffDataStore[] = $UserStaff_ID;
				}
				?>	
	
		<tr>
			<td style="background-color:#f2f2f2">
			
				<?php echo"$Staff_IDPad";?>
				<?php $UserStaff_IDStore[$i] = $UserStaff_ID; 
				?>
			</td>
			<td>
				<?php echo"$UserFirst_Name";?>
			</td>
			<td style="background-color:#f2f2f2">
				<?php echo"$UserLast_Name";?>
			</td>
			<td>
				<?php echo"$UserUserName";?>
			</td>
			<td style="background-color:#f2f2f2">
				<?php echo"Level $UserAccountAccess Access Rights";?>
			</td>
			<td>
				<?php echo"$UserJob_Role";?>
			</td>
			<td style="background-color:#f2f2f2">
				<?php echo"$UserEmployment_StartDate";?>
			</td>
			<td>
				<?php echo"$UserEmployment_EndDate";?>
			</td>
			<td style="background-color:#f2f2f2">
				<?php echo"$UserDOBDate";?>
			</td>
			<td>
				<?php echo"$UserAddress1";?>
			</td>
			<td style="background-color:#f2f2f2">
				<?php echo"$UserAddress2";?>
			</td>
			<td>
				<?php echo"$UserAddress3";?>
			</td>
			<td style="background-color:#f2f2f2">
				<?php echo"$UserPostcode";?>
			</td>
			<td>
				<?php echo"$UserEmail";?>
			</td>
			<td style="background-color:#f2f2f2">
				<?php echo"$UserPhone_No";?>
			</td>
			<td >
				<?php echo"$UserAccountStatus";?>
			</td>
			<td style="background-color:#f2f2f2;white-space:nowrap;">
				<?php echo "<button type='submit' name='Edit' title='Edit User Account' value='EditUser$i'><img src='edit_Icon.png' width='20px' height='20px' alt='Delete Button'></button>"; ?>
			
			</td>
			<?php
			if($Account_Type != 5)
			{
				
			}
			else{
				echo"<td style='white-space:nowrap;'>
				<button type='submit' name='Delete' onclick='myFunction()' title='Delete User Account From System' value='DeleteUser$i'><img src='delete_Icon.png' onclick='myFunction()' alt='Delete Button'></button>
			</td>";
			}
			?>
		</tr>
		
		<?php
		$i++;
		}
		if($NoStaff == 0) //this check should never be true, as you need an account to access the page, so your account will be shown. However this check is inplace incase somehow a user got past the various instant boot out checks
		{
			
	
			echo "<p><i><font size='1px' color='red'>No staff records can be retreived from the system. Please ensure that an admin account has added staff accounts to the system in order to view the stored details. If you think this is being displayed in error, please contact an admin.</a></i></font><p>";
		}
			
		?>
		</table>
		</form>
		<?php
		if(isset($_POST['Edit']))
				{
						$value = $_POST['Edit'];
						$lengthI = strlen($i); //workout how long $i is, this determines which button has been pressed for deleting file
						$position = substr($value, 8, $lengthI); //value of button is always Delete+variable $i by removing the word delete you are left with i which has been used to track which file is which 
						$_SESSION['position'] = $position; //store the position for use in getting correct Staff Member on next page
						$_SESSION['StaffEditStored'] = $UserStaff_IDStore[$position];
						$UserStaff_IDStoreEdit = $UserStaff_IDStore[$position];
						$editCheck = 1;
						$_SESSION['editCheck'] = $editCheck;//if this isnt in the session, user cannot access next page
						if($editCheck == 1)
						{
							echo $UserStaff_IDStoreEdit ;
							header('location:EditStaffDetails.php');
						}
						
						
						
						
					
				}
				if(isset($_POST['Delete']))
				{
					?>
							<script>
							function myFunction() {
								var txt;
								var r = confirm("Please Confirm Delete of Staff Details!");
								if (r == true){
									<?php $value2 = $_POST['Delete'];
						$lengthI2 = strlen($i); //workout how long $i is, this determines which button has been pressed for deleting file
						$position2 = substr($value2, 10, $lengthI2); //value of button is always Delete+variable $i by removing the word delete you are left with i which has been used to track which file is which 
						$_SESSION['position2'] = $position2; //store the position for use in getting correct file on next page
						//echo $position2;
						$_SESSION['StaffDelete'] = $UserStaff_IDStore[$position2]; //store file array and position in session
						$UserStaff_IDDelete = $UserStaff_IDStore[$position2];
						//echo $UserStaff_IDDelete;
						$deleteCheck = 1;
						$_SESSION['deleteCheck'] = $deleteCheck;
						if ($deleteCheck == 1)
							{
								
							$DeleteDetail = "SELECT * FROM account WHERE Staff_ID='$UserStaff_IDStore[$position2]'";
							$DeleteDetailResult = mysqli_query($conn,$DeleteDetail);
							while ($detaildeleterow = mysqli_fetch_array($DeleteDetailResult))
							{
								$StaffDelID = $detaildeleterow[1];
								$deletesql = "Delete FROM account WHERE Staff_ID='$StaffDelID'";
								mysqli_query($conn,$deletesql);
							}
							$sql = "Delete FROM staff WHERE Staff_ID='$UserStaff_IDDelete'";
							mysqli_query($conn,$sql);
							
							if ($conn->query($sql) === True)
							{
								//display complete message and link to homepage
								$_SESSION['StaffDelete'] = "";
								header('location:ViewStaff.php');
							}	
							
							
							
							}?>
						} 
								else {
									
								}
								document.getElementById("demo").innerHTML = txt;
							}
							</script>
							<?php
						
			
				}
				
		?>
	
	</div>
	<br>
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
</body>
</head>