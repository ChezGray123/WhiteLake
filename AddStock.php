<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Add New Stock to System
	</title>
	<script src="http://code.jquery.com/jquery-1.5.js"></script>
	<script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 255) {
          val.value = val.value.substring(0, 255);
        } else {
          $('#charNum').text(255 - len);
        }
      };
    </script>
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
					if($Account_Type <=3)
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
				<td class='selected'>
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
			Add New Stock/Product to Stock Table
		</h2>
		<p>
		Please enter the details of the new item of stock you wish to add to the White Lake Cheese Stock Table. 
		</p>
		<table>
		<form method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="Staff_ID"  <?php echo"$Staff_ID";?> />
			<tr>
				<td>
					Name:
				</td>
				<td>
					<input pattern=".{2,50}" type="text" name="Name" required>
				</td>
			</tr>
			<tr>
				<td>
					Description:
				</td>
				<td>
					<textarea pattern=".{2,255}" rows="5" cols="51" maxlength="255" onkeyup="countChar(this)" name="Description" required></textarea>
					<div  id="charNum"></div> <span class="nowrap">Characters Remaining</span>
				</td>
			
			</tr>
			<tr>
				<td>
					Milk Type:
				</td>
				<td>
					<select name="Milk_Type" required>
					<option value="Goats">Goats Milk</option>
					<option value="Cows">Cows Milk</option>
					<option value="Sheeps">Sheeps Milk</option>
				  </select>
				</td>
			</tr>
			<tr>
				<td>
					Pasturised Status:
				</td>
				<td>
					<select name="Pastuerised_Stat"  required>
					<option value="Yes (Thermised)">Yes (Thermised)</option>
					<option value="Yes (Raw)">Yes (Raw)</option>
					<option value="No (Pasteurised)">No (Pasteurised)</option>				
				  </select>
				</td>
				
			</tr>
			<tr>
				<td>
					Rennet:
				</td>
				<td>
					<select name="Rennet" required>
					<option value="Vegetarian">Vegetarian</option>
					<option value="Animal">Animal</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Style:
				</td>
				<td>
					<input pattern=".{2,50}" type="text" name="Style" required>
				</td>
			</tr>
			<tr>
				<td>
					Weight_Est:
				</td>
				<td>
					<input pattern=".{2,30}" type="text" name="Weight_Est" required>
				</td>
			</tr>
			<tr>
				<td>
					Origin:
				</td>
				<td>
					<input pattern=".{2,255}" type="text" name="Origin" required>
				</td>
			</tr>
			<tr>
				<td>
					Quantity:
				</td>
				<td>
					<input pattern=".{1,255}" type="number" name="Quantity" required>
				</td>
			</tr>
			<tr>
				<td>
					Price:
				</td>
				<td>
					£<input pattern=".{1,255}" type="number" name="Price" size="19" required>
				</td> 
			</tr>
			<tr>
				<td>
					Product Status:
				</td>
				<td>
					<select name="Prod_Stat"  required>
					<option value="Active">Active</option>
					<option value="Low Production">Low Production</option>
					<option value="Discontinued">Discontinued</option>
					<option value="Temp Discontinued">Temp Discontinued</option>
					<option value="Recalled">Recalled</option>
					<option value="Undergoing Alterations">Undergoing Alterations</option>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="reset" name="ClearForm" value="Clear Details" class="LoginBtn">
					<input type="submit" name="AddStock" value="Add Stock" class="LoginBtn">
				</td>
			</tr>
			
			</form>
			
			<?php
					if(isset($_POST['AddStock']))
					
						{
							include('connect.php');
							$Name = mysql_real_escape_string($_POST['Name']);
							$Description = mysql_real_escape_string($_POST['Description']);
							$Milk_Type = mysql_real_escape_string($_POST['Milk_Type']);
							$Pastuerised_Stat = mysql_real_escape_string($_POST['Pastuerised_Stat']);
							$Rennet = mysql_real_escape_string($_POST['Rennet']);
							$Style = mysql_real_escape_string($_POST['Style']);
							$Weight_Est = mysql_real_escape_string($_POST['Weight_Est']);
							$Origin = mysql_real_escape_string($_POST['Origin']);
							$Quantity = mysql_real_escape_string($_POST['Quantity']);
							$Price = mysql_real_escape_string($_POST['Price']);
							$Prod_Stat = mysql_real_escape_string($_POST['Prod_Stat']);							
							$_SESSION['Name'] = $Name;
							$_SESSION['Description'] = $Description;
							$_SESSION['Milk_Type'] = $Milk_Type;
							$_SESSION['Pastuerised_Stat'] = $Pastuerised_Stat;
							$_SESSION['Rennet'] = $Rennet;
							$_SESSION['Style'] = $Style;
							$_SESSION['Weight_Est'] = $Weight_Est;
							$_SESSION['Origin'] = $Origin;
							$_SESSION['Quantity'] = $Quantity;
							$_SESSION['Price'] = $Price;
							$_SESSION['Prod_Stat'] = $Prod_Stat;
								
							include('connect.php');
							$sqlStock = "SELECT * FROM stock WHERE Name = '$Name'";
							$resultStockCheck = mysqli_query($conn,$sqlStock);
							$NoStock = 0;
							while ($rowStock = mysqli_fetch_array($resultStockCheck))
							{
								$StoredName = $rowStock[2];
								if ($StoredName == $Name) // if record with same name exists, display popup box error 
								{
									?>
									<script>
									if (window.confirm('A Cheese already exists with the given name, would you like to review the current Stock Table?')) 
									{
									window.location.href='StockTable.php';
									};
									</script>
									<?php
								}
								
							}
							$StoredStockDetail = 1;	
									if ($StoredStockDetail == 1)
									{
										$_SESSION['StoredStockDetail'] = $StoredStockDetail;
										
										header("location:ConfirmAddStock.php");
									}
							
						}	
												
				?>
		</table>
		
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