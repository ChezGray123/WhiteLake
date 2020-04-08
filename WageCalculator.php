<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Wage Calculator 
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
	<div class='PortalHeader'><a name="adminnotice" class="DocStoreLinks"> </a>
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
				<td style="text-align:center; border-top:3px solid blue">
					<b>Useful Links</b>
				</td>
			</tr>
			<tr>
				<td > 
					<a href="DocumentStore.php">Document Store</a>
				</td>
			</tr>
			<tr>
				<td class="selected">
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
		<p>
		Please use the below Wage Calculator to help you determine how much you should be earning based on the hours you enter that you have worked. 
		</p>
		<p>
		Please note that this does not take into account any national insurance or tax which you may pay on your wages. If you have any concerns about your actual payment at the end of the current month, please get in touch with the Finances or HR department.
		</p>
		<p>
		All figures displayed are based off of your own inputs, and our staff portal does not record your hourly rate of pay or salary, as it can be expected that this may change regularly for Multi-Role Staff Members, or Part-Time Staff Members.
		</p>
		<?php
		$TotalPayment = 0;
		?>
		<form method="post" action="">
		<table>
			<tr>
				<td>
					Hourly Payment/Hourly Rate:
				</td>
				<td>
					<input type="text-field" name="HourPay">
					</input>
				</td>
			</tr>
			<tr>
				<td>
					Hours worked in week:
				</td>
				<td>
					<input type="text-field" name="Hourwork">
					</input>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Calculate for 1 Week Pay" name="oneWeekPay"></input>
				</td>
				<td>
					<input type="submit" value="Calculate for 1 Month Pay" name="oneMonthPay"></input>
				</td>
				</tr>
				<tr>
				<td>
					<input type="submit" value="Calculate for 3 Months Pay" name="threeMonthPay"></input>
				</td>
				<td>
					<input type="submit" value="Calculate for 6 Months Pay" name="sixMonthPay"></input>
				</td>
				</tr>
				<tr>
				<td>
					<input type="submit" value="Calculate for 1 Year Pay" name="oneYearPay"></input>
				</td>
			</tr>
			<tr>
			</form>
			<?php
			if(isset($_POST['oneWeekPay']))
					{
						$Pay = mysql_real_escape_string($_POST['HourPay']);
						$Hours = mysql_real_escape_string($_POST['Hourwork']);
						$TotalPayment = ($Pay * $Hours) * 1;
					}
			if(isset($_POST['oneMonthPay']))
					{
						$Pay = mysql_real_escape_string($_POST['HourPay']);
						$Hours = mysql_real_escape_string($_POST['Hourwork']);
						$TotalPayment = ($Pay * $Hours) * 4;
					}
					if(isset($_POST['threeMonthPay']))
					{
						$Pay = mysql_real_escape_string($_POST['HourPay']);
						$Hours = mysql_real_escape_string($_POST['Hourwork']);
						$TotalPayment = ($Pay * $Hours) * 12;
					}
					if(isset($_POST['sixMonthPay']))
					{
						$Pay = mysql_real_escape_string($_POST['HourPay']);
						$Hours = mysql_real_escape_string($_POST['Hourwork']);
						$TotalPayment = ($Pay * $Hours) * 24;
					}
					if(isset($_POST['oneYearPay']))
					{
						$Pay = mysql_real_escape_string($_POST['HourPay']);
						$Hours = mysql_real_escape_string($_POST['Hourwork']);
						$TotalPayment = ($Pay * $Hours) * 48;
					}
			?>
				<td>
					Total Payment:
				</td>
				<td>
					£<?php echo $TotalPayment; ?>
				</td>
			</tr>
		</table>
		<p><i><font size="1px" color="red">
		1 Year is calculated at 48 weeks, due to the allowed 6 weeks holiday for all full-time staff members.
		</i></font ></p>
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