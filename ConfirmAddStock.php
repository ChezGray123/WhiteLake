<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Add New Stock to System > Confirm Stock
	</title>
<?php
session_start();
ob_start();
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
							$StoredStockDetail = $_SESSION['StoredStockDetail'];
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
					if ($StoredStockDetail == 1) //check if they have gone through the add staff page first
					{
						
					}
					else{
						header("location:AddStock.php"); //return back 1 step if not, otherwise variables wont exist
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
			Add New Stock/Product to Stock Table > Confirm Details
		</h2>
		<p>
		Please confirm the details of the new Stock you wish to add to the White Lake Cheese Staff Portal system are correct. Any Details which are entered incorrectly will require the staff member too follow company policy and have them changed by a System Administrator. 
		</p>
		<table>
						<?php							 
							 if (isset($_SESSION['Name']))
						{
							$Name = $_SESSION['Name'];
							$Description = $_SESSION['Description'];
							$Milk_Type = $_SESSION['Milk_Type'];
							$Pastuerised_Stat = $_SESSION['Pastuerised_Stat'];
							$Rennet = $_SESSION['Rennet'];
							$Style = $_SESSION['Style'];
							$Weight_Est = $_SESSION['Weight_Est'];
							$Origin = $_SESSION['Origin'];
							$Quantity = $_SESSION['Quantity'];
							$Price = $_SESSION['Price'];
							$Prod_Stat = $_SESSION['Prod_Stat'];
						}
						?>
		<form method="post" action="" enctype="multipart/form-data">
			<tr>
				<td>
					Name:
				</td>
				<td>
					<?php echo"$Name"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Description:
				</td>
				<td>
					<?php echo"$Description"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Milk Type:
				</td>
				<td>
					<?php echo"$Milk_Type"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Pasturised Status:
				</td>
				<td>
					<?php echo"$Pastuerised_Stat"; ?>
				</td>
				
			</tr>
			<tr>
				<td>
					Rennet:
				</td>
				<td>
					<?php echo"$Rennet"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Style:
				</td>
				<td>
					<?php echo"$Style"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Weight_Est:
				</td>
				<td>
					<?php echo"$Weight_Est"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Origin:
				</td>
				<td>
					<?php echo"$Origin"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Quantity:
				</td>
				<td>
					<?php echo"$Quantity"; ?>
				</td>
			</tr>
			<tr>
				<td>
					Price:
				</td>
				<td>
					£ <?php echo"$Price"; ?>
				</td> 
			</tr>
			<tr>
				<td>
					Product Status:
				</td>
				<td>
					<?php echo"$Prod_Stat"; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="ClearForm" value="Clear Details" class="LoginBtn">
					<input type="submit" name="AddStock" value="Add Stock" class="LoginBtn">
				</td>
			</tr>
			</form>
			<?php
				if(isset($_POST['AddStock']))
					{
							include('connect.php');
							
							$Name = $Name;
							$Description = $Description;
							$Milk_Type = $Milk_Type;
							$Pastuerised_Stat = $Pastuerised_Stat;
							$Rennet = $Rennet;
							$Style = $Style;
							$Weight_Est = $Weight_Est;
							$Origin = $Origin;
							$Quantity = $Quantity;
							$Price = $Price;
							$Prod_Stat = $Prod_Stat;		
							
							$sql = "Insert into stock (Staff_ID,Name,Description,Milk_Type,Pastuerised_Stat,Rennet,Style,Weight_Est,Origin,Quantity,Price,Prod_Stat) Values('$Staff_ID','$Name','$Description','$Milk_Type','$Pastuerised_Stat','$Rennet','$Style','$Weight_Est','$Origin','$Quantity','$Price','$Prod_Stat')";
							mysqli_query($conn,$sql);
							$AddingStock = 1;
							if ($AddingStock == 1)
							{
								include('connect.php');
								$sqlMarket = "SELECT * FROM stock WHERE Name = '$Name' AND Description = '$Description'";
								$resultMarket = mysqli_query($conn,$sqlMarket);
								while ($rowMarket = mysqli_fetch_array($resultMarket))
									{
										$Stock_IDTable = $rowMarket[0];
										$MQuantity = 0;
										$MPrice = $Price;
										$sqlMarkettwo = "Insert into market_stock (Stock_ID,Staff_ID,Quantity,Market_Price) Values('$Stock_IDTable','$Staff_ID','$MQuantity','$MPrice')";
										mysqli_query($conn,$sqlMarkettwo);
										$StockAdd = 1;
										if ($StockAdd == 1)
										{
											$StoredStockDetail = 2;
											$_SESSION['StoredStockDetail'] = $StoredStockDetail;
											header("location:AddStock.php");									
										}
									}
							}
					}
					if(isset($_POST['ClearForm']))
					{
									
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
							
								header("location:AddStock.php");
										
									
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