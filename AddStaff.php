<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Add Staff Member to System 
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
				<td class='selected'>
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
			Add New User to Portal System
		</h2>
		<p>
		Please enter the details of the new staff member you wish to add to the White Lake Cheese Staff Portal system. 
		</p>
		<table>
		<form method="post" action="" enctype="multipart/form-data">
			<tr>
				<td>
					First Name:
				</td>
				<td>
					<input pattern=".{2,20}" type="text" name="First_Name" maxlength="20" size="20" required>
				</td>
			</tr>
			<tr>
				<td>
					Last Name:
				</td>
				<td>
					<input pattern=".{2,20}" type="text" name="Last_Name" maxlength="20" size="20" required>
				</td>
			</tr>
			<tr>
				<td>
					Job Role:
				</td>
				<td>
					<select name="Job_Role" required>
					<option selected="selected" disabled="disabled" value="">Please Select A Role Below</option>
					<option value="Sales Director">Sales Director</option>
					<option value="Production Director">Production Director</option>
					<option value="Cheese Maker">Cheese Maker</option>
					<option value="Addineur">Addineur (Cheese Care)</option>
					<option value="Packing Department">Packing Department</option>
					<option value="Quality Assurance Staff">Quality Assurance Staff</option>
					<option value="Office Bookkeeper">Office Bookkeeper</option>
					<option value="Receptionist">Receptionist</option>
					<option value="System Administrator">System Administrator</option>
					<option value="Cleaner/Premises">Cleaner/Premises</option>
					<option value="Premises Manager">Premises Manager</option>
					<option value="Work Placement">Work Placement</option>
					<option value="Market Worker">Market Worker</option>
					<option value="Sales Team Manager">Sales Team Manager</option>
					<option value="Sales Assistant">Sales Assistant</option>
					<option value="Security Officer">Security Officer</option>
					<option value="Social Media Officer">Social Media Officer</option>
				  </select>
				</td>
				<td>
					<div id="showError" style="visibility:hidden">
					<p style="display:inline"> Please select a Job Role from the list.
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Account Access Level:
				</td>
				<td>
					<select name="Account_Type"  required>
					<option selected="selected" disabled="disabled" value="">Please Select An Access Level Below </option>
					<option value="1">Level 1</option>
					<option value="2">Level 2</option>
					<option value="3">Level 3</option>
					<option value="4">Level 4</option>
					<option value="5">Level 5</option>
					
				  </select>
				</td>
				
			</tr>
			<tr>
				<td>
					Employment Starting Date:
				</td>
				<td>
					<input pattern=".{10}" type="date" id="datefieldChecker" title="Contact must start on or after date this account was created" min="" name="Employment_Start" required>
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
				document.getElementById("datefieldChecker").setAttribute("min", today);
					</script>
				</td>
			</tr>
			<tr>
				<td>
					Employment End Date<a href="#adminnotice2">*</a>:
				</td>
				<td>
					<input type="date" id="datefieldChecker1" title="Contact must end on or after date this account was created" min="" name="Employment_End">
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
				<td>
					Date Of Birth:
				</td>
				<td>
					<input id="over18Check" max="" title="Staff member must be over 16" type="Date" name="DOB" required>
					<script>
						var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				var yyyy = yyyy-16;
				 if(dd<10){
						dd='0'+dd
					} 
					if(mm<10){
						mm='0'+mm
					} 

				today = yyyy+'-'+mm+'-'+dd;
				document.getElementById("over18Check").setAttribute("max", today);
					</script>
				</td>
			</tr>
			<tr>
				<td>
					Address Line 1:
				</td>
				<td>
					<input pattern=".{2,50}" type="text" name="Address1" required>
				</td>
			</tr>
			<tr>
				<td>
					Address Line 2:
				</td>
				<td>
					<input pattern=".{1,50}" type="text" name="Address2">
				</td>
			</tr>
			<tr>
				<td>
					Address Line 3:
				</td>
				<td>
					<input pattern=".{1,50}" type="text" name="Address3">
				</td>
			</tr>
			<tr>
				<td>
					Postcode:
				</td>
				<td>
					<input pattern=".{7,8}" title="Please Enter a 7-8 Character Postcode" type="text" name="Postcode" required  maxlength="8" >
				</td>
			</tr>
			<tr>
				<td>
					Phone Number:
				</td>
				<td><input pattern=".{11}" title="Requires 11 numbers" type="tel" name="Phone_No" required maxlength="11">
					
				</td>
			</tr>
			<tr>
				<td>
					Email Address<a href="#adminnotice">*</a>:
				</td>
				<td>
					<input pattern=".{6,100}" type="email" name="Email" title="Please Enter the Staff Members Email, using the correct format" required>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="reset" name="ClearForm" value="Clear Details" class="LoginBtn">
					<input type="submit" name="AddStaff" value="Add Staff Member" class="LoginBtn">
				</td>
			</tr>
			
			</form>
			
			<?php
					if(isset($_POST['AddStaff']))
					{
						function randomPassword($length,$count, $characters) {
 
							// $length - the length of the generated password
							// $count - number of passwords to be generated
							// $characters - types of characters to be used in the password
							 
							// define variables used within the function    
								$symbols = array();
								$password = array();
								$used_symbols = '';
								$pass = '';
							 
							// an array of different character types    
								$symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
								$symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
								$symbols["numbers"] = '1234567890';
								$symbols["special_symbols"] = '!?~@#-_+<>[]{}';
							 
								$characters = split(",",$characters); // get characters types to be used for the passsword
								foreach ($characters as $key=>$value) {
									$used_symbols .= $symbols[$value]; // build a string with all characters
								}
								$symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
								 
								for ($p = 0; $p < $count; $p++) {
									$pass = '';
									for ($i = 0; $i < $length; $i++) {
										$n = rand(0, $symbols_length); // get a random character from the string with all characters
										$pass .= $used_symbols[$n]; // add the character to the password string
									}
									$password[] = $pass;
								}
								 
								return $password; // return the generated password
								
							}
						if ($_POST['Job_Role'] !== 'No Role Selected')
						{
							include('connect.php');
							$AddStaff_First_Name = mysql_real_escape_string($_POST['First_Name']);
							$AddStaff_First_NameUp = ucfirst(strtolower($AddStaff_First_Name)); //Ensure first letters of last and first name are upper case 
							$AddStaff_Last_Name = mysql_real_escape_string($_POST['Last_Name']);
							$AddStaff_Last_NameUp = ucfirst(strtolower($AddStaff_Last_Name)); //done for data consistency in table
							$AddStaff_Job_Role = mysql_real_escape_string($_POST['Job_Role']);
							$AddStaff_Account_Type = mysql_real_escape_string($_POST['Account_Type']);
							$AddStaff_Employment_Start = mysql_real_escape_string($_POST['Employment_Start']);
							$AddStaff_Employment_End = mysql_real_escape_string($_POST['Employment_End']);
							$AddStaff_DOB = mysql_real_escape_string($_POST['DOB']);
							$AddStaff_Address1 = mysql_real_escape_string($_POST['Address1']);
							$AddStaff_Address2 = mysql_real_escape_string($_POST['Address2']);
							$AddStaff_Address3 = mysql_real_escape_string($_POST['Address3']);
							$AddStaff_Postcode = mysql_real_escape_string($_POST['Postcode']);
							$AddStaff_Phone_No = mysql_real_escape_string($_POST['Phone_No']);
							$AddStaff_Email = mysql_real_escape_string($_POST['Email']);
						
							$_SESSION['AddStaff_First_Name'] = $AddStaff_First_NameUp;
							$_SESSION['AddStaff_Last_Name'] = $AddStaff_Last_NameUp;
							$_SESSION['AddStaff_Job_Role'] = $AddStaff_Job_Role;
							$_SESSION['AddStaff_Employment_Start'] = $AddStaff_Employment_Start;
							$_SESSION['AddStaff_Employment_End'] = $AddStaff_Employment_End;
							$_SESSION['AddStaff_DOB'] = $AddStaff_DOB;
							$_SESSION['AddStaff_Address1'] = $AddStaff_Address1;
							$_SESSION['AddStaff_Address2'] = $AddStaff_Address2;
							$_SESSION['AddStaff_Address3'] = $AddStaff_Address3;
							$_SESSION['AddStaff_Postcode'] = $AddStaff_Postcode;
							$_SESSION['AddStaff_Phone_No'] = $AddStaff_Phone_No;
							$_SESSION['AddStaff_Email'] = $AddStaff_Email;
							$_SESSION['AddStaff_Account_Type'] = $AddStaff_Account_Type;
							$StoredDetail = 1;
							$_SESSION['StoredDetail'] = $StoredDetail;
							$my_password = randomPassword(10,1,"lower_case,upper_case,numbers,special_symbols"); 
							$_SESSION['AddStaff_Password'] = $my_password;
							
							$FirstLetterFirst = $AddStaff_First_Name[0]; //take first letter of firstname and last name
							$FirstLetterFirstLower = strtolower($FirstLetterFirst);//this and below line ensures all usernames use consistent lower casing
							$AddStaff_Last_NameLower = strtolower($AddStaff_Last_Name); //as the full last name is used, all characters are set to lower
							//$UsernameNumber = 0; //set number for end of username to 0
							$GeneratedUsername = "{$FirstLetterFirstLower}{$AddStaff_Last_NameLower}";//{$UsernameNumber}";
							
								include('connect.php');
								$sqlCheckUser = "SELECT * FROM account WHERE username LIKE '$GeneratedUsername%'";
								$usercnt = mysqli_num_rows(mysqli_query($conn,$sqlCheckUser));  
								if ($usercnt > 1) 
								{
								$num = ++$usercnt;             // Increment $usercnt by 1
								$GeneratedUsername = $GeneratedUsername . $num;  // Add number to username
								$_SESSION['GeneratedUsername'] = $GeneratedUsername;
								$NameGen = 1;
									if ($NameGen == 1)
									{
										$_SESSION['NameGen'] = $NameGen;
									
										header("location:ConfirmAddStaff.php");
									}
								}
								if ($usercnt == 1) 
								{
									$num = 01; 
									$GeneratedUsername = $GeneratedUsername . $num;  // Add number to username
									$_SESSION['GeneratedUsername'] = $GeneratedUsername;
									$NameGen = 1;
									if ($NameGen == 1)
									{
										$_SESSION['NameGen'] = $NameGen;
										header("location:ConfirmAddStaff.php");
									}
								}
								if ($usercnt == 00) 
								{
									$num = $usercnt; 
									$GeneratedUsername = $GeneratedUsername . $num;  // Add number to username
									$_SESSION['GeneratedUsername'] = $GeneratedUsername;
									$NameGen = 1;
									if ($NameGen == 1)
									{
										$_SESSION['NameGen'] = $NameGen;
										header("location:ConfirmAddStaff.php");
									}
								}
							
								}
						
						
	
					
						}
					
				?>
		</table>
		<a name="adminnotice"><p><i><font size="1px" color="red">
	*The email address entered here will be visable too all staff members on the portal, via the contacts link located under 'Useful Links'. Please ensure the email address entered here is accurate and that the staff member is happy for this email address to be shared with other staff members.
	</a></i></font><p>
	<a name="adminnotice2"><p><i><font size="1px" color="red">
	*Employment End Date does not need to be confirmed at this point, this can be updated by an Administrator account at a later date.
	</a></i></font>
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