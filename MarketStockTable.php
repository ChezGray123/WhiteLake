<html>
<head>
	<Link rel="icon" type="image/png"  href="wlc.png"> 
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>
		White Lake Cheese Portal - Market Stock Table
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
	<table class="stocktable" >
	<form method="post" enctype="multipart/form-data" action="">
		<input type="hidden" name="Staff_ID"  <?php echo"$Staff_ID";?> />
		
		<tr>
			<td style="text-align:center; white-space:nowrap;">
				ID &nbsp;&nbsp;&nbsp;
			</td>
			<td style="text-align:center;">
				Name
			</td>
			<td style="text-align:center; white-space:nowrap;">
				Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td style="text-align:center;">
				Milk
			</td>
			<td style="text-align:center;">
				Pasteuried
			</td>
			<td style="text-align:center;">
				Rennet
			</td>
			<td style="text-align:center;">
				Style
			</td>
			<td style="text-align:center;">
				Weight
			</td>
			<td style="text-align:center;">
				Origin
			</td>
			<td style="text-align:center; white-space:nowrap;">
				Market Stock Quantity
			</td>
			<td style="text-align:center; white-space:nowrap;">
				Market Price
			</td>
			<td style="text-align:center;">
				Status
			</td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else
			{
			echo"<td style='text-align:center;white-space:nowrap;'>
				Edit Market Stock Record
			</td>";
			}
			?>
		</tr>
	<?php
			$i=0; 
			$ProductData = array();
			include('connect.php');
			$sql = "SELECT * FROM Stock ORDER BY Stock_ID";
			$result = mysqli_query($conn,$sql);
			$NoStock = 0;
			while ($row = mysqli_fetch_array($result))
				{
					$Stock_ID = $row[0];
					$Staff_ID = $row[1];
					$Name = $row[2];
					$Description = $row[3];
					$Milk_Type = $row[4];
					$Pasteuried_Stat = $row[5];
					$Rennet = $row[6];
					$Style = $row[7];
					$Weight_Est = $row[8];
					$Origin = $row[9];		
					$Prod_Stat = $row[12];
					$NoStock = 1;
						include('connect.php');
						$sqlMarket = "SELECT * FROM market_stock WHERE Stock_ID ='$Stock_ID'";
						$resultMarket = mysqli_query($conn,$sqlMarket);
						$rowMarket = mysqli_fetch_array($resultMarket);
					
						$MStock_ID = $rowMarket[0];
						$MQuantity = $rowMarket[3];
						$MPrice = $rowMarket[4];
						$StockDataStore[] = $Stock_ID;
					?>	
	<input type="hidden" name="MStock_ID"  <?php echo"$MStock_ID";?> />	
		<tr  >
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Stock_ID";?>
				<?php $MStock_IDStore[$i] = $Stock_ID; ?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Name";?>
			</td>
			<td style="text-align:left; border-top:2px solid blue" >
				<?php echo"$Description";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Milk_Type";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Pasteuried_Stat";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Rennet";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Style";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Weight_Est";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Origin";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$MQuantity";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				£<?php echo"$MPrice";?>
			</td>
			<td style="text-align:center; border-top:2px solid blue">
				<?php echo"$Prod_Stat";?>
			</td>
			<?php
			if($Account_Type<3)
			{
				
			}
			else
			{
				echo"
			<td style='text-align:center; border-top:2px solid blue'>";
				 echo "<button type='submit' name='Edit' title='Edit Stock' value='EditStock$i'><img src='edit_Icon.png' width='20px' height='20px' alt='Delete Button'></button>
			
			</td>";
				
			}
			
			?>
		</tr>
		<?php
		$i++;	
		}
		if($NoStock == 0)
		{
			
	
			echo "<p><i><font size='1px' color='red'>No stock has currently been recorded on the system. Please ensure that an admin account has added stock to the system in order to view the stored details. If you think this is being displayed in error, please contact an admin.</a></i></font><p>";
		}
		?>
		</form>
		<?php
		if(isset($_POST['Edit']))
				{
						$value = $_POST['Edit'];
						$lengthI = strlen($i); //workout how long $i is, this determines which button has been pressed for deleting file
						$position = substr($value, 9, $lengthI); //value of button is always Delete+variable $i by removing the word delete you are left with i which has been used to track which file is which 
						$_SESSION['position'] = $position; //store the position for use in getting correct Staff Member on next page
						$_SESSION['MStockEditStored'] = $MStock_IDStore[$position];
						$UserStock_IDStoreEdit = $MStock_IDStore[$position];
						$editCheck = 1;
						$_SESSION['editStockCheck'] = $editCheck;//if this isnt in the session, user cannot access next page
						if($editCheck == 1)
						{
							echo $UserStock_IDStoreEdit ;
							header('location:EditMarketStockDetails.php');
						}
				}
				
			?>
	</table>
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