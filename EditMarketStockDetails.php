<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - View Staff Members > Edit Market Stock Details
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
				if($Account_Type <=2)
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
				<td class="selected">
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
	Edit Market Stock Details
	</h1>
	<table class="stocktable">
	<?php
	$position = $_SESSION['position'];
	$MStock_IDStore[$position] = $_SESSION['MStockEditStored'];
	
	//echo implode($Stock_IDStore); will print out stock id of selected staff
	
	?>
	<form method="post" enctype="multipart/form-data" action="">
		<?php 
						include('connect.php');
						$sql = "SELECT * FROM stock WHERE Stock_ID = '$MStock_IDStore[$position]'";
						$result = mysqli_query($conn,$sql);
						
						while ($row = mysqli_fetch_array($result))
							{
						
							
							$StoredStock_ID = $row[0];
							$StoredName = $row[2];
							$StoredDescription = $row[3];
							$StoredMilk_Type = $row[4];
							$StoredPastuerised_Stat = $row[5];
							$StoredRennet = $row[6];
							$StoredStyle = $row[7];
							$StoredWeight_Est = $row[8];
							$StoredOrigin = $row[9];
							$StoredQuanity = $row[10];
							$StoredPrice = $row[11];
							$StoredProd_Stat = $row[12];
							
							include('connect.php');
							$sqlStock = "SELECT * FROM market_stock WHERE Stock_ID = '$StoredStock_ID'";
							$resultStock = mysqli_query($conn,$sqlStock);
							
							while ($rowStock = mysqli_fetch_array($resultStock))
								{
									$StoredStaff_ID = $rowStock[2];
									$Staff_IDPad = sprintf("%08d", $StoredStaff_ID);
									$StoredMarketQuantity = $rowStock[3];
									$StoredMarketPrice = $rowStock[4];
								}
							
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
				<h3>Currently in Stock Table</h3>
			</td>
			<td>
				<h3>Update To</h3>
			</td>
			<td>
				<h3>Return Stock</h3>
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

			</tr>
		<tr>
			<td >
				Milk_Type
			</td>
			<td >
				<?php echo $StoredMilk_Type?>
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

			</tr>
		<tr>
			<td >
				Rennet
			</td >
			<td >
				<?php echo $StoredRennet?>
			</td>

		<tr>
			<td >
				Style
			</td>
			
			<td >
				<?php echo $StoredStyle?>
			</td>

			</tr>
		<tr>
			<td >
				Weight_Est
			</td>
			<td >
				<?php echo $StoredWeight_Est?>
			</td>
	
			</tr>
		<tr>
			<td >
				Origin
			</td>
			<td >
				<?php echo $StoredOrigin?>
			</td>

			</tr>
		<tr>
			<td >
				Reserved Market Stock Quantity
			</td>
			<td >
				<?php echo $StoredMarketQuantity?>
			</td>
			<td >
				<?php echo "$StoredQuanity Available for Transfer"?>
			</td>
			<td>
				<input type="number" name="UpdatedStoredMarketQuantity" size="10" title="Please Enter the Quantity of Stock you wish to transfer into the Market Stock Table">
			</td>
			<td>
				<input type="number" name="ReturnStoredMarketQuantity" size="10" title="Please Enter the Quantity of Stock you wish to transfer from the Market Stock Table into the main Stock Table">
			</td>
			</tr>
		<tr>
		
			<td >
				Market Price
			</td>
			<td >
				£<?php echo $StoredMarketPrice?>
			</td>
			<td>
			£<?php echo $StoredPrice?>
			</td>
			<td>
			£<input type="int" name="UpdatedStoredMarketPrice" size="8" title="Please Enter the new price of this item you wish to be updated into the Market Stock Table">
			</td>
			</tr>
		<tr>
			<td >
				Production Status
			</td>
			<td >
				<?php echo $StoredProd_Stat?>
			</td>
			
			</tr>
		<tr>
		<td colspan="2">
		<a href = "MarketStockTable.php">Return to Market Stock Table </a>
		</td>
		<td>
		</td>
		<td>
		<input type="reset" name="Clear Update To Fields" Value="Clear Update To Fields"><input type="submit"  name="Update" Value="Update"  onclick="myFunctionvalidation();">
		</td>
		<td>
		<input type="reset" name="Clear Return Stock Fields" Value="Clear Return Stock Fields"><input type="submit"  name="Return" Value="Return Stock"  onclick="myFunctionvalidation();">
		</td>
		</tr>
	</table>
	</form>
	
	<?php
							
	if(isset($_POST['Update']))
				{
	include('connect.php');
	$NewCurrentQuantity =0;
	
					$UpdatedStoredMarketQuantity = mysql_real_escape_string($_POST['UpdatedStoredMarketQuantity']);
					
					if($UpdatedStoredMarketQuantity > $StoredQuanity)
					{
						$UpdatedStoredMarketQuantity = $UpdatedStoredMarketQuantity;
						$StoredQuanity = $StoredQuanity;
						echo $UpdatedStoredMarketQuantity; 
						echo $StoredQuanity;
						if($UpdatedStoredMarketQuantity > $StoredQuanity)
						{
						?>
						<script>
						function myFunctionvalidation() {
							alert("You have tried to reserve more stock than currently avaliable, please enter a lower Quantity.");
						}
						</script>
						
						<?php
						}
					}
					else{
						if ($UpdatedStoredMarketQuantity == "") {
							
						
						 
					}
					$NewCurrentQuantity = $StoredQuanity - $UpdatedStoredMarketQuantity;//calculate new total for stock table
					$NewMarketStoredQuantity = $StoredMarketQuantity + $UpdatedStoredMarketQuantity;
					$UpdatedStoredMarketPrice = mysql_real_escape_string($_POST['UpdatedStoredMarketPrice']);
					if ($UpdatedStoredMarketPrice == "") {
					$UpdatedStoredMarketPrice = $StoredMarketPrice;
									}
									
									//save current users details as the last updated staff member
									$UpdatedStoredStaff_ID = $Staff_ID;
									
									$Updated = 1;
									if ($Updated == 1)
									{
										//echo "$UpdatedStoredStaff_ID $UpdatedStoredMarketQuantity $UpdatedStoredMarketPrice $StoredStock_ID";
								
												$sqlUpdate = "UPDATE market_stock SET Staff_ID = '$UpdatedStoredStaff_ID', Quantity = '$NewMarketStoredQuantity',Market_Price = '$UpdatedStoredMarketPrice' WHERE Stock_ID = '$StoredStock_ID'";
								mysqli_query($conn,$sqlUpdate);
										if ($conn->query($sqlUpdate) === True)
									{	
										$sqlUpdateQuant = "UPDATE stock SET Quantity = '$NewCurrentQuantity' WHERE Stock_ID = '$StoredStock_ID'";
										mysqli_query($conn,$sqlUpdateQuant);
												if ($conn->query($sqlUpdateQuant) === True)
											{
												$NewCurrentQuantity =0;
												$NewMarketStoredQuantity=0;
												$UpdatedStoredMarketQuantity = 0;
												header('location:EditMarketStockDetails.php');
											
									}	
									}
												
									?>
										<?php
										
									}
					}
									
				}
	if(isset($_POST['Return']))
		{
			$NewReturnQuantity = 0;
			$ReturnStoredMarketQuantity = mysql_real_escape_string($_POST['ReturnStoredMarketQuantity']);
			if($ReturnStoredMarketQuantity > $StoredMarketQuantity)
					{
						?>
						<script>
						function myFunctionvalidation() {
							alert("You have tried to return more stock than currently avaliable, please enter a lower Quantity.");
						}
						</script>
						<?php
					}
					else{
						if ($ReturnStoredMarketQuantity == "") {
						//do nothing
							}
						$NewReturnQuantity = $StoredQuanity + $ReturnStoredMarketQuantity;//calculate new total for stock table
						$NewMarketStoredQuantity = $StoredMarketQuantity - $ReturnStoredMarketQuantity;

									//save current users details as the last updated staff member
									$UpdatedStoredStaff_ID = $Staff_ID;
									$Updated = 1;
									if ($Updated == 1)
									{
										//echo "$UpdatedStoredStaff_ID $UpdatedStoredMarketQuantity $UpdatedStoredMarketPrice $StoredStock_ID";
										$sqlUpdate = "UPDATE market_stock SET Staff_ID = '$UpdatedStoredStaff_ID', Quantity = '$NewMarketStoredQuantity' WHERE Stock_ID = '$StoredStock_ID'";
										mysqli_query($conn,$sqlUpdate);
										if ($conn->query($sqlUpdate) === True)
										{	
										$sqlUpdateQuant = "UPDATE stock SET Quantity = '$NewReturnQuantity' WHERE Stock_ID = '$StoredStock_ID'";
										mysqli_query($conn,$sqlUpdateQuant);
												if ($conn->query($sqlUpdateQuant) === True)
											{
												$NewReturnQuantity = 0;
												$NewMarketStoredQuantity=0;
												header('location:EditMarketStockDetails.php');
											}	
										}
												
									?>
										<?php
										
									}
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