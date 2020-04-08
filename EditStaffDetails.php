<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - View Staff Members > Edit Staff Details
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
					 if ($loggedin = 0)
					{
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
	<div class="PortalContent" style="border-top:3px solid blue; display:inline-block; width=40%;">
	<h1>
	Edit Staff Member Details
	</h1>
	<table class="stocktable">
	<?php
	$position = $_SESSION['position'];
	$UserStaff_IDStore[$position] = $_SESSION['StaffEditStored'];
	//echo implode($UserStaff_IDStore); will print out staff id of selected staff
	
	?>
	<form method="post" enctype="multipart/form-data" action="">
		<?php 
						include('connect.php');
						$sql = "SELECT * FROM staff WHERE Staff_ID = '$UserStaff_IDStore[$position]'";
						$result = mysqli_query($conn,$sql);
						
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
						
						include('connect.php');
			$sqlAccount = "SELECT * FROM account WHERE Staff_ID = '$UserStaff_IDStore[$position]'";
			$resultAccount = mysqli_query($conn,$sqlAccount);
			$NoStaff = 0;
			while ($rowAccount = mysqli_fetch_array($resultAccount))
				{
					$UserUserName = $rowAccount[2];
					
					$UserAccountAccess = $rowAccount[4];
					$UserAccountStatus = $rowAccount[5];
					
					
				}
							}
		?>
		<tr>
			<td>
				<h3>Field Name</h3>
			</td>
			<td>
				<h3>Current Information</h3>
			</td>
			<td>
				<h3>Update To</h3>
			</td>
		</tr>
		<tr>
			<td >
				ID
			</td>
			<td >
				<?php echo $Staff_IDPad?>
			</td>
			<td>
			This field cannot be altered.
			</td>
		</tr>
		<tr>
			<td >
				First Name
			</td>
			<td >
				<?php echo $UserFirst_Name?>
			</td>
			<td>
				<input type="text" name="UpdatedFirst_Name">
			</td>
			</tr>
		<tr>
			<td >
				Last Name
			</td >
			<td >
				<?php echo $UserLast_Name?>
			</td>
			<td>
				<input type="text" name="UpdatedLast_Name">
			</td>
			</tr>
		<tr>
			<td >
				Account Username <a href='#adminnotice2'>*</a>
			</td>
			<td >
				<?php echo $UserUserName?>
			</td>
			<td>
			This field cannot be altered.
			</td>
			</tr>
		<tr>
		<tr>
			<td >
				Account Password
			</td>
			<td >
				Users Password Cannot be Viewed
			</td>
			<td>
			<?php
			if($Account_Type !=5)
			{
				echo"You do not have the required permissions to alter this users password.";
			}
			else
			{
				echo"<input type='text' pattern='.{6,15}' title='Please Enter a New Password (6-15 characters Min 1 Upper & 1 Lowercase Character)' name='UpdatedPassword'>";
			}
				
				?>
			</td>
			</tr>
		<tr>
			<td >
				Account Access Level
			</td >
			<td >
				<?php echo $UserAccountAccess?>
			</td>
			<td>
			<?php
			if($Account_Type !=5)//will disable the option to make this user a level 5, which avoids potential error or deletion of data if poor staff member is made admin.
			{
				if($UserAccountAccess == 1)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option selected='selected' value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option disabled='disabled' value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 2)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option selected='selected' value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option disabled='disabled' value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 3)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option selected='selected' value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option disabled='disabled' value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 4)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option selected='selected' value='4'>Level 4</option>
						<option disabled='disabled' value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 5)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option disabled='disabled' selected='selected' value='5'>Level 5</option>
				</select>";
				}
			}
			else //if user making change is an admin (Level 5 Access)
			{
				if($UserAccountAccess == 1)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option selected='selected' value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option  value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 2)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option selected='selected' value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 3)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option selected='selected' value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 4)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option selected='selected' value='4'>Level 4</option>
						<option value='5'>Level 5</option>
				</select>";
				}
				if($UserAccountAccess == 5)
				{
					echo"<select name='Account_Type'>
				<option disabled='disabled' value=''>Please Select An Access Level Below </option>
						<option  value='1'>Level 1</option>
						<option value='2'>Level 2</option>
						<option value='3'>Level 3</option>
						<option value='4'>Level 4</option>
						<option selected='selected' value='5'>Level 5</option>
				</select>";
				}
			}
			?>
			</td>
			</tr>
		<tr>
			<td >
				Job Role
			</td>
			<td >
				<?php echo $UserJob_Role?>
			</td>
			<td>
			<?php if($UserJob_Role == "Sales Director")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option selected='selected' value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Production Director")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option selected='selected' value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Cheese Maker")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option selected='selected' value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Addineur")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option selected='selected' value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Packing Department")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option selected='selected' value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Office Bookkeeper")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option selected='selected' value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Receptionist")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option  selected='selected' value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "System Administrator")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option selected='selected' value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Cleaner/Premises")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option selected='selected' value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Work Placement")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option selected='selected' value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Market Worker")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option selected='selected' value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option selected='selected' value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Sales Team Manager")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option selected='selected' value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Sales Assistant")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option selected='selected' value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Security Officer")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option  selected='selected' value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Social Media Officer")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option selected='selected' value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Premises Manager")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option selected='selected'  value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			<?php if($UserJob_Role == "Quality Assurance Staff")
			{
			echo "<select name='Job_Role' required>
					<option  disabled='disabled' value=''>Please Select A Role Below</option>
					<option  value='Sales Director'>Sales Director</option>
					<option value='Production Director'>Production Director</option>
					<option value='Cheese Maker'>Cheese Maker</option>
					<option value='Addineur'>Addineur (Cheese Care)</option>
					<option value='Packing Department'>Packing Department</option>
					<option selected='selected' value='Quality Assurance Staff'>Quality Assurance Staff</option>
					<option value='Office Bookkeeper'>Office Bookkeeper</option>
					<option value='Receptionist'>Receptionist</option>
					<option value='System Administrator'>System Administrator</option>
					<option value='Cleaner/Premises'>Cleaner/Premises</option>
					<option value='Premises Manager'>Premises Manager</option>
					<option value='Work Placement'>Work Placement</option>
					<option value='Market Worker'>Market Worker</option>
					<option value='Sales Team Manager'>Sales Team Manager</option>
					<option value='Sales Assistant'>Sales Assistant</option>
					<option value='Security Officer'>Security Officer</option>
					<option value='Social Media Officer'>Social Media Officer</option>
				  </select>";
				 
			}
			?>
			
			</td>
			</tr>
		<tr>
			<td >
				Employment Start Date
			</td>
			<td >
				<?php echo $UserEmployment_StartDate?>
			</td>
			<td>
			This field cannot be altered.
			</td>
			</tr>
		<tr>
			<td >
				Employment End Date
			</td>
			<td >
				<?php echo $UserEmployment_EndDate?>
			</td>
			<td>
			<input type="date" id="datefieldChecker1" title="Contact must end on or after date this account was created" min="" name="UpdatedEmployment_End">
					<script>
						var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				 if(dd<10){
						dd='0'+dd
					} 
					if(mm<10){
						mm='0'+mm
					} 

				today = yyyy+'-'+mm+'-'+dd;
				document.getElementById("datefieldChecker1").setAttribute("min", today);
					</script>
					</td>
			</tr>
		<tr>
			<td >
				DOB
			</td>
			
			<td >
				<?php echo $UserDOBDate?>
			</td>
			<td>
			This field cannot be altered.
			</td>
			</tr>
		<tr>
			<td >
				Address Line 1
			</td>
			<td >
				<?php echo $UserAddress1?>
			</td>
			<td>
				<input type="text" name="UpdatedUserAddress1">
			</td>
			</tr>
		<tr>
			<td >
				Address Line 2
			</td>
			<td >
				<?php echo $UserAddress2?>
			</td>
			<td>
				<input type="text" name="UpdatedUserAddress2">
			</td>
			</tr>
		<tr>
			<td >
				Address Line 3
			</td>
			<td >
				<?php echo $UserAddress3?>
			</td>
			<td>
				<input type="text" name="UpdatedUserAddress3">
			</td>
			</tr>
		<tr>
			<td >
				Postcode
			</td>
			<td >
				<?php echo $UserPostcode?>
			</td>
			<td>
					<input pattern=".{7,8}" title="Please Enter a 7-8 Character Postcode" type="text" name="UpdatedPostcode" maxlength="8" >
				</td>
			</tr>
		<tr>
			<td >
				Email
			</td>
			<td >
				<?php echo $UserEmail?>
			</td>
			<td>
					<input type="email" name="UpdatedEmail" title="Please Enter the Staff Members Email, using the correct format">
				</td>
			</tr>
		<tr>
			<td >
				Phone Number
			</td>
			<td >
				<?php echo $UserPhone_No?>
			</td>
			<td><input pattern=".{11}" title="Requires 11 numbers" type="text" name="UpdatedPhone_No" maxlength="11">
					
				</td>
			</tr>
		<tr>
			<td >
				Account Status <?php if ($UserAccountStatus == "FirstLogin")
				{
					echo "<a href='#adminnotice'>*</a>";
				}					
				?>
			</td>
			
			
			<td >
				<?php echo $UserAccountStatus?>
			</td>
			<td>
			<?php if ($UserAccountStatus == "FirstLogin")
				{
					echo "This field cannot be altered.";
				}
								
				?>
				<?php if ($UserAccountStatus == "Active")
				{
					echo "<select name='UpdatedUserAccountStatus' required>
					<option  disabled='disabled' value=''>Please Select A Status Below</option>
					<option  disabled='disabled' value='FirstLogin'>First Login</option>
					<option selected='selected' value='Active'>Active</option>
					<option value='Deactivated'>Deactivated</option>
				  </select>";
				}
				?>
				<?php if ($UserAccountStatus == "Deactivated")
				{
					echo "<select name='UpdatedUserAccountStatus' required>
					<option  disabled='disabled' value=''>Please Select A Status Below</option>
					<option  disabled='disabled' value='FirstLogin'>First Login</option>
					<option  value='Active'>Active</option>
					<option selected='selected' value='Deactivated'>Deactivated</option>
				  </select>";
				}
				?>
			</td>
		</tr> 
		<tr>
		<td colspan="2">
		<a href = "ViewStaff.php">Return to Staff Table </a>
		</td>
		
		<td>
		<input type="reset" name="Clear Update To Fields" Value="Clear Update To Fields"><input type="submit"  name="Update" Value="Update" onclick="myFunction()">
		</td>
		</tr>
	</table>
	</form>
	
	<?php
	if(isset($_POST['Update']))
				{
					include('connect.php');
					$UpdatedFirst_Name = mysql_real_escape_string($_POST['UpdatedFirst_Name']);
					if ($UpdatedFirst_Name == "") {
						$UpdatedFirst_Name = $UserFirst_Name;
					}
					$UpdatedLast_Name = mysql_real_escape_string($_POST['UpdatedLast_Name']);
					if ($UpdatedLast_Name == "") {
						$UpdatedLast_Name = $UserLast_Name;
					}
					if($Account_Type !=5) //check if user is admin
					{
						$UpdatedPassword = $UserPassword;
					}
					else{
						$UpdatedPassword = mysql_real_escape_string($_POST['UpdatedPassword']);
					if ($UpdatedPassword == "") {
						$UpdatedPassword = $UserPassword;
					}
					}
					
					$encrypt_UpdatedPassword = md5($UpdatedPassword);
					
					$UpdateAccount_Type = mysql_real_escape_string($_POST['Account_Type']);
					if ($UpdateAccount_Type == "") {
						$UpdateAccount_Type = $UserAccountAccess;
					}
					$UpdateJob_Role = mysql_real_escape_string($_POST['Job_Role']);
					if ($UpdateJob_Role == "") {
						$UpdateJob_Role = $UserJob_Role;
					}
					$UpdatedEmployment_End = mysql_real_escape_string($_POST['UpdatedEmployment_End']);
					if ($UpdatedEmployment_End == "") {
						$UpdatedEmployment_End = $UserEmployment_EndDate;
					}
					$UpdatedUserAddress1 = mysql_real_escape_string($_POST['UpdatedUserAddress1']);
					if ($UpdatedUserAddress1 == "") {
						$UpdatedUserAddress1 = $UserAddress1;
					}
					$UpdatedUserAddress2 = mysql_real_escape_string($_POST['UpdatedUserAddress2']);
					if ($UpdatedUserAddress2 == "") {
						$UpdatedUserAddress2 = $UserAddress2;
					}
					$UpdatedUserAddress3 = mysql_real_escape_string($_POST['UpdatedUserAddress3']);
					if ($UpdatedUserAddress3 == "") {
						$UpdatedUserAddress3 = $UserAddress3;
					}
					$UpdatedPostcode = mysql_real_escape_string($_POST['UpdatedPostcode']);
					if ($UpdatedPostcode == "") {
						$UpdatedPostcode = $UserPostcode;
					}
					$UpdatedEmail = mysql_real_escape_string($_POST['UpdatedEmail']);
					if ($UpdatedEmail == "") {
						$UpdatedEmail = $UserEmail;
					}
					$UpdatedPhone_No = mysql_real_escape_string($_POST['UpdatedPhone_No']);
					if ($UpdatedPhone_No == "") {
						$UpdatedPhone_No = $UserPhone_No;
					}
					if ($UserAccountStatus == "FirstLogin") {
						
					}
					else
					{
						$UpdatedUserAccountStatus = mysql_real_escape_string($_POST['UpdatedUserAccountStatus']);
					}
					
					
					$sql = "UPDATE staff SET First_Name = '$UpdatedFirst_Name',Last_Name = '$UpdatedLast_Name', Job_Role = '$UpdateJob_Role', Employment_End = 'UpdatedEmployment_End', Address1 = '$UpdatedUserAddress1',Address2 = '$UpdatedUserAddress2',Address3 = '$UpdatedUserAddress3',Postcode = '$UpdatedPostcode',Email = '$UpdatedEmail',Phone_No = '$UpdatedPhone_No' WHERE Staff_ID = '$UserStaff_IDStore[$position]'";
				mysqli_query($conn,$sql);
						if ($conn->query($sql) === True)
					{
							$sqlupdateAccount = "UPDATE account SET Password = '$encrypt_UpdatedPassword',Account_Type = '$UpdateAccount_Type', Account_Status = '$UpdatedUserAccountStatus' WHERE Staff_ID = '$UserStaff_IDStore[$position]'";
							mysqli_query($conn,$sqlupdateAccount);
							if ($conn->query($sqlupdateAccount) === True)
							{
							$Updated = 1;
							}
					}
					if ($Updated == 1)
					{
						?>
						<script>
						function myFunction() {
							var txt;
							if (confirm("Please Confirm Update of Staff Details!")) {
								
							} else {
								
							}
							document.getElementById("demo").innerHTML = txt;
						}
						</script>
						
						<?php
						header("location:EditStaffDetails.php");
					}
					
				}	
			
	
	?>
	<?php if ($UserAccountStatus == "FirstLogin") 
	{
		echo "<a name='adminnotice'><p><i><font size='1px' color='red'>
	*Account Status's which are 'FirstLogin' cannot be changed, as the user has not yet completed account setup.</a></i></font><p>";
	}
		?>
		<a name='adminnotice2'><p><i><font size='1px' color='red'>
	*Account Usernames are generated based off of initially entered First and Last Names. Changing this users First and or Last Names will not update the generated Username. For staff wishing to have their Username updated, they will need to have a new account created with these details.</a></i></font><p>
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