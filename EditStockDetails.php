<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - View Staff Members > Edit Stock Details
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
					if($Account_Type ==1)
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
				<td class="selected">
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
				<td>
					<a href="AddStock.php" target="">Add Stock</a>
				</td>
			</tr>			
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
	$Stock_IDStore[$position] = $_SESSION['StockEditStored'];
	
	//echo implode($Stock_IDStore); will print out stock id of selected staff
	
	?>
	<form method="post" enctype="multipart/form-data" action="">
		<?php 
						include('connect.php');
						$sql = "SELECT * FROM stock WHERE Stock_ID = '$Stock_IDStore[$position]'";
						$result = mysqli_query($conn,$sql);
						
						while ($row = mysqli_fetch_array($result))
							{
						
							
						$StoredStock_ID = $row[0];
						$StoredStaff_ID = $row[1];
						$Staff_IDPad = sprintf("%08d", $StoredStaff_ID);
						$StoredName = $row[2];
						$StoredDescription = $row[3];
						$StoredMilk_Type = $row[4];
						$StoredPastuerised_Stat = $row[5];
						$StoredRennet = $row[6];
						$StoredStyle = $row[7];
						$StoredWeight_Est = $row[8];
						$StoredOrigin = $row[9];
						$StoredQuantity = $row[10];
						$StoredPrice = $row[11];
						$StoredProd_Stat = $row[12];
						
						include('connect.php');
						$sqlStaff = "SELECT * FROM staff WHERE Staff_ID = '$StoredStaff_ID'";
						$resultStaff = mysqli_query($conn,$sqlStaff);
						
						while ($rowStaff = mysqli_fetch_array($resultStaff))
							{
								$StoredStaff_First_Name = $rowStaff[1];
								$StoredStaff_Last_Name = $rowStaff[2];
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
				Stock ID
			</td>
			<td >
				<?php echo $StoredStock_ID?>
			</td>
			
		</tr>
		<tr>
			<td >
				Last Updated by Staff ID
			</td>
			<td >
				<?php echo $Staff_IDPad?>
			</td>
			
		</tr>
		<tr>
			<td >
				Last Updated by Staff Name:
			</td>
			<td >
				<?php echo "$StoredStaff_First_Name $StoredStaff_Last_Name";?>
			</td>
			
		</tr>
		<tr>
			<td >
				Product Name
			</td>
			<td >
				<?php echo $StoredName?>
			</td>
			
			</tr>
		<tr>
			<td >
				Description
			</td >
			<td >
				<?php echo $StoredDescription?>
			</td>
			<td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
			echo"<textarea rows='5' cols='51' maxlength='255' onkeyup='countChar(this)' name='UpdatedStoredDescription'></textarea>
					<div  id='charNum'></div> <span class='nowrap'>Characters Remaining</span>";
			}
			?>
			</td>
			</tr>
		<tr>
			<td >
				Milk_Type
			</td>
			<td >
				<?php echo $StoredMilk_Type?>
			</td>
			<td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
				if($StoredMilk_Type == "Goats")
			{
				echo"<select name='UpdatedStoredMilk_Type' >
					<option selected='selected' value='Goats'>Goats Milk</option>
					<option value='Cows'>Cows Milk</option>
					<option value='Sheeps'>Sheeps Milk</option>
				  </select>";
			}
				  
				 if($StoredMilk_Type == "Cows")
				  {
				echo"<select name='UpdatedStoredMilk_Type' >
					<option  value='Goats'>Goats Milk</option>
					<option  selected='selected' value='Cows'>Cows Milk</option>
					<option value='Sheeps'>Sheeps Milk</option>
				  </select>";
				  }
				   if($StoredMilk_Type == "Sheeps")
				  {
				echo"<select name='UpdatedStoredMilk_Type' >
					<option  value='Goats'>Goats Milk</option>
					<option value='Cows'>Cows Milk</option>
					<option selected='selected' value='Sheeps'>Sheeps Milk</option>
				  </select>";
				  }
				  
			}
			?>
			
			</td>
			</tr>
		<tr>
		<tr>
			<td >
				Pasturised Status
			</td>
			<td >
				<?php echo $StoredPastuerised_Stat?>
			</td>
			<td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
			
				if($StoredPastuerised_Stat == "Yes (Thermised)")
				{
					echo"<select name='UpdatedStoredPastuerised_Stat'  >
						<option selected='selected' value='Yes (Thermised)'>Yes (Thermised)</option>
						<option value='Yes (Raw)'>Yes (Raw)</option>
						<option value='No (Pasteurised)'>No (Pasteurised)</option>				
					  </select>";
				}	
					
				if($StoredPastuerised_Stat == "Yes (Raw)")
				{
					echo"<select name='UpdatedStoredPastuerised_Stat'  >
						<option  value='Yes (Thermised)'>Yes (Thermised)</option>
						<option selected='selected' value='Yes (Raw)'>Yes (Raw)</option>
						<option value='No (Pasteurised)'>No (Pasteurised)</option>				
					  </select>";
				}	
					
				if($StoredPastuerised_Stat == "No (Pasteurised)")
				{
					echo"<select name='UpdatedStoredPastuerised_Stat'  >
						<option  value='Yes (Thermised)'>Yes (Thermised)</option>
						<option value='Yes (Raw)'>Yes (Raw)</option>
						<option selected='selected' value='No (Pasteurised)'>No (Pasteurised)</option>				
					  </select>";
				}	
				
			}
			?>
				
			
			
			</td>
			</tr>
		<tr>
			<td >
				Rennet
			</td >
			<td >
				<?php echo $StoredRennet?>
			</td>
			<td>
			
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
				if($StoredRennet == "Vegetarian")
				{
					echo"<select name='UpdatedStoredRennet'  >
						<option selected='selected' value='Vegetarian'>Vegetarian</option>
						<option value='Animal'>Animal</option>
								
					  </select>";
				}	
					
				if($StoredRennet == 'Animal')
				{
					echo"<select name='UpdatedStoredRennet'  >
						<option value='Vegetarian'>Vegetarian</option>
						<option selected='selected' value='Animal'>Animal</option>
					  
					  </select>";
				}	
			}
					?>
					
					
			</td>
		<tr>
			<td >
				Style
			</td>
			
			<td >
				<?php echo $StoredStyle?>
			</td>
			<td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
				echo"<input type='text' name='UpdatedStoredStyle'>";
			}
			?>
				
			</td>
			</tr>
		<tr>
			<td >
				Weight_Est
			</td>
			<td >
				<?php echo $StoredWeight_Est?>
			</td>
			<td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
				echo"<input type='text' name='UpdatedStoredWeight_Est'>";
			}
			?>
				
			</td>
			</tr>
		<tr>
			<td >
				Origin
			</td>
			<td >
			
				<?php echo $StoredOrigin?>
			</td>
			<td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
				echo"<input type='text' name='UpdatedStoredOrigin'>";
			}
			?>
				
			</td>
			</tr>
		<tr>
			<td >
				Quantity
			</td>
			<td >
				<?php echo $StoredQuantity?>
			</td>
			<td>
			<?php 
			if($Account_Type<2)
			{
				
			}
			else
			{
				echo"<input type='number' name='UpdatedStoredQuantity'>";
			}
				
				?>
			</td>
			</tr>
		<tr>
			<td >
				Price
			</td>
			<td >
				<?php echo $StoredPrice?>
			</td>
			<td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else{
			echo"£<input type='number' name='UpdatedStoredPrice' size='19'>";
			}
			?>
					</td>
			</tr>
		<tr>
			<td >
				Prod_Stat
			</td>
			<td >
				<?php echo $StoredProd_Stat?>
			</td>
			<td>
			<?php 
			if($Account_Type<3)
			{
				
			}
			else{
			if ($StoredProd_Stat == 'Active')
			{
			echo"<select name='UpdatedStoredProd_Stat'>
					<option selected='selected' value='Active'>Active</option>
					<option value='Low Production'>Low Production</option>
					<option value='Discontinued'>Discontinued</option>
					<option value='Temp Discontinued'>Temp Discontinued</option>
					<option value='Recalled'>Recalled</option>
					<option value='Undergoing Alterations'>Undergoing Alterations</option>";
			}
					 if ($StoredProd_Stat == 'Low Production')
			{
			echo"<select name='UpdatedStoredProd_Stat'>
					<option  value='Active'>Active</option>
					<option selected='selected' value='Low Production'>Low Production</option>
					<option value='Discontinued'>Discontinued</option>
					<option value='Temp Discontinued'>Temp Discontinued</option>
					<option value='Recalled'>Recalled</option>
					<option value='Undergoing Alterations'>Undergoing Alterations</option>";
			}
					 if ($StoredProd_Stat == 'Discontinued')
			{
			echo"<select name='UpdatedStoredProd_Stat'>
					<option  value='Active'>Active</option>
					<option value='Low Production'>Low Production</option>
					<option selected='selected' value='Discontinued'>Discontinued</option>
					<option value='Temp Discontinued'>Temp Discontinued</option>
					<option value='Recalled'>Recalled</option>
					<option value='Undergoing Alterations'>Undergoing Alterations</option>";
			}
					 if ($StoredProd_Stat == 'Temp Discontinued')
			{
			echo"<select name='UpdatedStoredProd_Stat'>
					<option  value='Active'>Active</option>
					<option value='Low Production'>Low Production</option>
					<option value='Discontinued'>Discontinued</option>
					<option selected='selected' value='Temp Discontinued'>Temp Discontinued</option>
					<option value='Recalled'>Recalled</option>
					<option value='Undergoing Alterations'>Undergoing Alterations</option>";
			}
					 if ($StoredProd_Stat == 'Recalled')
			{
			echo"<select name='UpdatedStoredProd_Stat'>
					<option  value='Active'>Active</option>
					<option value='Low Production'>Low Production</option>
					<option value='Discontinued'>Discontinued</option>
					<option value='Temp Discontinued'>Temp Discontinued</option>
					<option selected='selected' value='Recalled'>Recalled</option>
					<option value='Undergoing Alterations'>Undergoing Alterations</option>";
			}
					 if ($StoredProd_Stat == 'Undergoing Alterations')
			{
			echo"<select name='UpdatedStoredProd_Stat'>
					<option  value='Active'>Active</option>
					<option value='Low Production'>Low Production</option>
					<option value='Discontinued'>Discontinued</option>
					<option value='Temp Discontinued'>Temp Discontinued</option>
					<option value='Recalled'>Recalled</option>
					<option selected='selected' value='Undergoing Alterations'>Undergoing Alterations</option>";
			}
			}
					?>
					
					</td>
			</tr>
		<tr>
		<td colspan="2">
		<a href = "StockTable.php">Return to Stock Table </a>
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
					
					$UpdatedStoredDescription = mysql_real_escape_string($_POST['UpdatedStoredDescription']);
					if ($UpdatedStoredDescription == "") {
						$UpdatedStoredDescription = $StoredDescription;
					}
					$UpdatedStoredMilk_Type = mysql_real_escape_string($_POST['UpdatedStoredMilk_Type']);
					if ($UpdatedStoredMilk_Type == "") {
						$UpdatedStoredMilk_Type = $StoredMilk_Type;
					}
					$UpdatedStoredPastuerised_Stat = mysql_real_escape_string($_POST['UpdatedStoredPastuerised_Stat']);
					if ($UpdatedStoredPastuerised_Stat == "") {
						$UpdatedStoredPastuerised_Stat = $StoredPastuerised_Stat;
					}
					$UpdatedStoredRennet = mysql_real_escape_string($_POST['UpdatedStoredRennet']);
					if ($UpdateStoredRennet == "") {
						$UpdateStoredRennet = $StoredRennet;
					}
					$UpdatedStoredStyle = mysql_real_escape_string($_POST['UpdatedStoredStyle']);
					if ($UpdatedStoredStyle == "") {
						$UpdatedStoredStyle = $StoredStyle;
					}
					$UpdatedStoredWeight_Est = mysql_real_escape_string($_POST['UpdatedStoredWeight_Est']);
					if ($UpdatedStoredWeight_Est == "") {
						$UpdatedStoredWeight_Est = $StoredWeight_Est;
					}
					$UpdatedStoredOrigin = mysql_real_escape_string($_POST['UpdatedStoredOrigin']);
					if ($UpdatedStoredOrigin == "") {
						$UpdatedStoredOrigin = $StoredOrigin;
					}
					$UpdatedStoredQuantity = mysql_real_escape_string($_POST['UpdatedStoredQuantity']);
					if ($UpdatedStoredQuantity == "") {
						$UpdatedStoredQuantity = $StoredQuantity;
					}
					$UpdatedStoredPrice = mysql_real_escape_string($_POST['UpdatedStoredPrice']);
					if ($UpdatedStoredPrice == "") {
						$UpdatedStoredPrice = $StoredPrice;
					}
					$UpdatedStoredProd_Stat = mysql_real_escape_string($_POST['UpdatedStoredProd_Stat']);
					if ($UpdatedStoredProd_Stat == "") {
						$UpdatedStoredProd_Stat = $StoredProd_Stat;
					}
					//save current users details as the last updated staff member
					$UpdatedStoredStaff_ID = $Staff_ID;
					
					$Updated = 1;
					if ($Updated == 1)
					{
						?>
						<script>
						function myFunction() {
							var txt;
							if (confirm("Please Confirm Update of Stock Details!")) {
								
							} else {
								
							}
							document.getElementById("demo").innerHTML = txt;
						}
						</script>
						
						<?php
						
					}
					
					$sql = "UPDATE stock SET Staff_ID = '$UpdatedStoredStaff_ID',Description = '$UpdatedStoredDescription', Milk_Type = '$UpdatedStoredMilk_Type', Pastuerised_Stat = '$UpdatedStoredPastuerised_Stat', Rennet = '$UpdatedStoredRennet',Style = '$UpdatedStoredStyle',Weight_Est = '$UpdatedStoredWeight_Est',Origin = '$UpdatedStoredOrigin',Quantity = '$UpdatedStoredQuantity',Price = '$UpdatedStoredPrice', Prod_Stat = '$UpdatedStoredProd_Stat' WHERE Stock_ID = '$Stock_IDStore[$position]'";
				mysqli_query($conn,$sql);
						if ($conn->query($sql) === True)
					{
							
							header("location:EditStockDetails.php");
							
					}
					
					
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